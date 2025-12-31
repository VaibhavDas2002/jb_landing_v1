<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.dashboard');
    }

    public function schemeWiseApplications(Request $request)
    {
        $days = $request->get('days'); // 30 / 90 / all

        $dateCondition = "";
        if (!empty($days) && $days !== 'all') {
            $dateCondition = " AND a.created_at >= (CURRENT_DATE - INTERVAL '{$days} days')";
        }

        $rows = DB::select("
        SELECT 
            a.scheme_id,
            b.scheme_name,
            COUNT(1) AS total
        FROM pension.beneficiaries a
        JOIN home.m_scheme b ON a.scheme_id = b.id
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
        $rows = DB::select("
        SELECT 
            b.district_code,
            b.district_name,
            COUNT(1) AS total
        FROM pension.beneficiaries a
        JOIN m_district b 
            ON a.created_by_dist_code = b.district_code
        WHERE a.next_level_role_id = 0
        GROUP BY b.district_code, b.district_name
        ORDER BY total DESC
        LIMIT 10
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


}
