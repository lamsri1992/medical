<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Models\medicalData;

class medicalController extends Controller
{
  
    public function index()
    {
        $result = DB::connection(session('database'))->table('medical_data')->get();
        $visible = DB::connection(session('database'))->table('medical_data')->where('med_status', 'Y')->count();
        $disable = DB::connection(session('database'))->table('medical_data')->where('med_status', 'N')->count();
        return view('config.medical',['result'=>$result,'visible'=>$visible,'disable'=>$disable]);
    }

    public function store(Request $request)
    {
        DB::connection(session('database'))->table('medical_data')->insert(
            [
            'med_code' => $request->get('mcode'),
            'med_name' => $request->get('mname'),
            'med_type' => $request->get('mtype'),
            'med_content' => $request->get('mdetail'),
            'med_unit' => $request->get('munit'),
            ]
        );
    }

    public function changeStatus(Request $request)
    {
        $id = $request->get('id');
        $stat = $request->get('status');
        DB::connection(session('database'))->table('medical_data')->where('med_id', $id)->update(
            [ 'med_status' => $stat ]
        );
    }

}
