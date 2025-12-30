<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\JsonResponse;

class MapController extends Controller
{
    public function index()
    {
        return view('pension.map');
    }




    public function wbDistrictCount(Request $request)
    {
        return DB::table('pension.beneficiaries')
            ->select('created_by_dist_code as district_code', DB::raw('count(*) total'))
            ->groupBy('district_code')
            ->pluck('total', 'district_code');
    }


}