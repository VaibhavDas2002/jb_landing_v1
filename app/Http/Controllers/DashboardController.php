<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\BenEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $financialYear = Helper::getCurrentFinancialYearIndia();

        // ✅ Counts
        $totalApproved = DB::connection('pgsql_app_read_live')->table('pension.beneficiaries')->where('next_level_role_id', 0)->count();

        $totalApplied = DB::connection('pgsql_app_read_live')->table('pension.beneficiaries')->where('next_level_role_id', '>=', 0)->count();


        $curMonthInt = (int) date('n');

        // ✅ Get dynamic column name
        $monthPayColumn = Helper::getMonthColumn($curMonthInt);
        $monthPayColumn = $monthPayColumn['lot_payment_amount'];
        // e.g. apr_payment_amount

        // ✅ Current Month Total Payment
        $totalPayCurMonth = DB::connection('pgsql_pay_read_live')
            ->table('payment.ben_transaction_details')
            ->selectRaw("COALESCE(SUM($monthPayColumn), 0) AS total")
            ->where('fin_year', $financialYear)
            ->value('total');

        // ✅ Current Financial Year Consolidated Payment
        // ✅ Financial Year Consolidated (month-wise)
        $totalPayCurYearRow = DB::connection('pgsql_pay_read_live')
            ->table('payment.ben_transaction_details')
            ->selectRaw("
        COALESCE(SUM(apr_payment_amount),0) AS apr,
        COALESCE(SUM(may_payment_amount),0) AS may,
        COALESCE(SUM(jun_payment_amount),0) AS jun,
        COALESCE(SUM(jul_payment_amount),0) AS jul,
        COALESCE(SUM(aug_payment_amount),0) AS aug,
        COALESCE(SUM(sep_payment_amount),0) AS sep,
        COALESCE(SUM(oct_payment_amount),0) AS oct,
        COALESCE(SUM(nov_payment_amount),0) AS nov,
        COALESCE(SUM(dec_payment_amount),0) AS dec,
        COALESCE(SUM(jan_payment_amount),0) AS jan,
        COALESCE(SUM(feb_payment_amount),0) AS feb,
        COALESCE(SUM(mar_payment_amount),0) AS mar
    ")
            ->where('fin_year', $financialYear)
            ->first();

        // ✅ Calculate total FY amount (IMPORTANT)
        $totalPayCurYear =
            $totalPayCurYearRow->apr
            + $totalPayCurYearRow->may
            + $totalPayCurYearRow->jun
            + $totalPayCurYearRow->jul
            + $totalPayCurYearRow->aug
            + $totalPayCurYearRow->sep
            + $totalPayCurYearRow->oct
            + $totalPayCurYearRow->nov
            + $totalPayCurYearRow->dec
            + $totalPayCurYearRow->jan
            + $totalPayCurYearRow->feb
            + $totalPayCurYearRow->mar;


        return view('dashboard.dashboard', [
            'cur_fin_year' => $financialYear,
            'totalApproved' => $totalApproved,
            'totalApplied' => $totalApplied,
            'totalPayCurMonth' => $totalPayCurMonth,
            'totalPayCurYear' => $totalPayCurYear
        ]);
    }
    public function schemeWiseApplications(Request $request)
    {
        $days = $request->get('days'); // 30 / 90 / all

        $dateCondition = "";
        if (!empty($days) && $days !== 'all') {
            $dateCondition = " AND a.created_at >= (CURRENT_DATE - INTERVAL '{$days} days')";
        }

        $rows = DB::connection('pgsql_app_read_live')->select("
        SELECT 
            a.scheme_id,
            b.scheme_name,
            COUNT(1) AS total
        FROM pension.beneficiaries a
        JOIN public.m_scheme b ON a.scheme_id = b.id
        WHERE a.next_level_role_id >= 0
        {$dateCondition}
        GROUP BY a.scheme_id, b.scheme_name
        ORDER BY b.scheme_name
    ");

        $categories = [];
        $data = [];

        foreach ($rows as $row) {
            $categories[] = $row->scheme_name;
            $data[] = (int) $row->total;
        }

        return response()->json([
            'categories' => $categories,
            'data' => $data
        ]);
    }

    public function districtWiseBeneficiaries()
    {
        $rows = DB::connection('pgsql_app_read_live')->select("
        SELECT 
            b.district_code,
            b.district_name,
            COUNT(1) AS total
        FROM pension.beneficiaries a
        JOIN public.m_district b 
            ON a.created_by_dist_code = b.district_code
        WHERE a.next_level_role_id = 0
        GROUP BY b.district_code, b.district_name
        ORDER BY total DESC
    ");

        $categories = [];
        $data = [];

        foreach ($rows as $row) {
            $categories[] = $row->district_name;
            $data[] = (int) $row->total;
        }

        return response()->json([
            'categories' => $categories,
            'data' => $data
        ]);
    }

    public function getAgeDistribution()
    {
        $data = DB::connection('pgsql_app_read_live')->selectOne("
        SELECT
            SUM(CASE WHEN age < 18 THEN 1 ELSE 0 END) AS age_0_18,
            SUM(CASE WHEN age BETWEEN 18 AND 29 THEN 1 ELSE 0 END) AS age_18_30,
            SUM(CASE WHEN age BETWEEN 30 AND 44 THEN 1 ELSE 0 END) AS age_30_45,
            SUM(CASE WHEN age BETWEEN 45 AND 59 THEN 1 ELSE 0 END) AS age_45_60,
            SUM(CASE WHEN age >= 60 THEN 1 ELSE 0 END) AS age_60_plus
        FROM (
            SELECT DATE_PART('year', AGE(CURRENT_DATE, dob)) AS age
            FROM pension.beneficiaries
            WHERE next_level_role_id >= 0
              AND dob IS NOT NULL
        ) t
    ");

        return response()->json($data);
    }

    public function consolidatedFyPayments(Request $request)
    {
        $finYear = $request->get('fin_year'); // e.g. 2025-2026

        $data = DB::connection('pgsql_pay_read_live')->table('payment.ben_transaction_details')
            ->selectRaw("
                COALESCE(SUM(apr_payment_amount),0) AS apr,
                COALESCE(SUM(may_payment_amount),0) AS may,
                COALESCE(SUM(jun_payment_amount),0) AS jun,
                COALESCE(SUM(jul_payment_amount),0) AS jul,
                COALESCE(SUM(aug_payment_amount),0) AS aug,
                COALESCE(SUM(sep_payment_amount),0) AS sep,
                COALESCE(SUM(oct_payment_amount),0) AS oct,
                COALESCE(SUM(nov_payment_amount),0) AS nov,
                COALESCE(SUM(dec_payment_amount),0) AS dec,
                COALESCE(SUM(jan_payment_amount),0) AS jan,
                COALESCE(SUM(feb_payment_amount),0) AS feb,
                COALESCE(SUM(mar_payment_amount),0) AS mar
            ")
            ->where('fin_year', $finYear)
            ->first();

        return response()->json([
            'status' => 'success',
            'series' => [
                (int) $data->apr,
                (int) $data->may,
                (int) $data->jun,
                (int) $data->jul,
                (int) $data->aug,
                (int) $data->sep,
                (int) $data->oct,
                (int) $data->nov,
                (int) $data->dec,
                (int) $data->jan,
                (int) $data->feb,
                (int) $data->mar,
            ]
        ]);
    }






}
