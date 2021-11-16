<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Models\departmentData;

class departmentController extends Controller
{
  
    public function index()
    {
        $result = \App\Models\departmentData::all();
        return view('config.department',['result'=>$result]);
    }

    public function store(Request $request)
    {
        $result = new departmentData;
        $result->dept_code = $request->get('dcode');
        $result->dept_name = $request->get('dname');
        $result->save();
    }

}
