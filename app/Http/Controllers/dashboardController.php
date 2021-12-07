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
        $draw = DB::table('medical_order_list')->count();

        $invs = DB::table('medical_bill')
                ->orderByDesc('bill_date_in')
                ->limit(4)
                ->get();

        $order = DB::table('medical_order')
                ->orderByDesc('order_date')
                ->limit(4)
                ->get();
        return view('welcome',['med'=>$med,'list'=>$list,'draw'=>$draw,'invs'=>$invs,'order'=>$order]);
    }
}
