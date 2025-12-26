<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
{
    public function getVectors(Request $request)
    {
        $level = $request->input('level', 'district'); // district, block, gp
        $parentId = $request->input('parent_id');

        // Note: You must have PostGIS installed and a table with geometry columns
        // Table structure example: districts (id, name, geom), blocks (id, district_id, name, geom)
        
        $query = null;

        if ($level === 'district') {
            // ST_AsSVG converts the geometry to an SVG path string
            $query = DB::table('districts')
                ->select('id', 'name', DB::raw('ST_AsSVG(geom) as path_d'));
        } 
        elseif ($level === 'block') {
            $query = DB::table('blocks')
                ->where('district_id', $parentId)
                ->select('id', 'name', DB::raw('ST_AsSVG(geom) as path_d'));
        }
        elseif ($level === 'gp') {
            $query = DB::table('gram_panchayats')
                ->where('block_id', $parentId)
                ->select('id', 'name', DB::raw('ST_AsSVG(geom) as path_d'));
        }

        // Return Mock data if DB is empty for testing
        if (!$query) {
             return response()->json([
                ['id' => 1, 'name' => 'Demo Region A', 'path_d' => 'm 406.05835,101.45947 q 0,1.06641 -0.26432,2.00521 -0.26433,0.9388 -0.80209,1.69531 -0.52864,0.7474 -1.33073,1.29427 -0.79296,0.54688 -1.85937,0.84766 -0.61068,0.17318 -1.32162,0.24609 -0.71093,0.0638 -1.54036,0.0638 h -2.76172 V 95.416504 h 2.78906 q 0.82943,0 1.54037,0.07292 0.71094,0.0638 1.32161,0.236979 1.06641,0.300781 1.85938,0.838542 0.80208,0.53776 1.32161,1.276041 0.52865,0.729167 0.78386,1.64974 0.26432,0.911457 0.26432,1.968747 z m -1.56771,0 q 0,-1.759112 -0.76562,-2.852862 -0.76563,-1.09375 -2.19662,-1.549479 -0.54687,-0.173177 -1.22135,-0.236979 -0.67448,-0.0638 -1.52214,-0.0638 h -1.12109 v 9.515622 h 1.12109 q 0.84766,0 1.52214,-0.0638 0.67448,-0.0638 1.22135,-0.23698 1.43099,-0.45573 2.19662,-1.59505 0.76562,-1.13932 0.76562,-2.91667 z'],
                ['id' => 2, 'name' => 'Demo Region B', 'path_d' => 'M350 0 L275 200 L425 200 Z'],
             ]);
        }

        return response()->json($query->get());
    }

    public function getStats(Request $request)
    {
        // Calculate aggregations based on level
        $level = $request->input('level');
        $id = $request->input('id');

        // Perform count queries on your beneficiaries table
        // Example: Beneficiary::where('district_id', $id)->count();

        return response()->json([
            'total' => rand(10000, 50000),
            'approved' => rand(5000, 10000),
            'verified' => rand(5000, 10000),
            'entered' => rand(1000, 5000),
        ]);
    }
}