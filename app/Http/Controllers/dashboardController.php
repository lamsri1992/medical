<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class dashboardController extends Controller
{
    public function index()
    {
        $med = DB::table('medical_store')
                ->select(DB::raw('SUM(store_total) as total'))
                ->first();
        $list = DB::table('medical_store')->count();
        return view('welcome',['med'=>$med,'list'=>$list]);
    }
}
