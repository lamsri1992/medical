<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use DB;

class medical extends Controller
{
    public function index()
    {
        $data = DB::table('medical_store')
                ->join('medical_data', 'medical_data.med_code', '=', 'medical_store.store_med_code')
                ->get();
        return response()->json($data, 200);
    }

    public function show($id)
    {
        $data = DB::table('medical_store')
                ->join('medical_data', 'medical_data.med_code', '=', 'medical_store.store_med_code')
                ->where('store_id',$id)
                ->first();
        return response()->json($data, 200);  
    }
}