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
        $result = \App\Models\medicalData::all();
        return view('config.medical',['result'=>$result]);
    }

    public function store(Request $request)
    {
        $result = new medicalData;
        $result->med_name = $request->get('mname');
        $result->save();
    }

}
