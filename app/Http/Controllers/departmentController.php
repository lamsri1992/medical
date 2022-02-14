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
        $result = DB::connection(session('database'))->table('medical_department')->get();
        return view('config.department',['result'=>$result]);
    }

    public function store(Request $request)
    {
        DB::connection(session('database'))->table('medical_department')->insert(
            [
            'dept_code' => $request->get('dcode'),
            'dept_name' => $request->get('dname'),
            ]
        );
    }

}
