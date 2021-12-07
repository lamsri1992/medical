<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Models\departmentData;

class reportController extends Controller
{
    public function index()
    {
        $dept = \App\Models\departmentData::all();
        return view('report.index',['dept'=>$dept]);
    }
}
