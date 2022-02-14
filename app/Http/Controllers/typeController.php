<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Models\medicalType;

class typeController extends Controller
{
  
    public function index()
    {
        $result = DB::connection(session('database'))->table('medical_type')->get();
        return view('config.type',['result'=>$result]);
    }

    public function store(Request $request)
    {
        $result = new medicalType;
        $result->type_name = $request->get('tname');
        $result->type_report = $request->get('treport');
        $result->save();
    }

}
