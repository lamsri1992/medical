<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class dashboardController extends Controller
{
    public function index()
    {
        $cdate = date('m');
        $med = DB::table('medical_store')
                ->select(DB::raw('SUM(store_total) as total'))
                ->first();
        $list = DB::table('medical_store')->count();
        $draw = DB::table('medical_order_list')->count();

        $invs = DB::table('medical_bill')
                ->orderByDesc('bill_date_in')
                ->limit(4)
                ->get();
        
        $orda = DB::table('medical_order')
                ->select(DB::raw('SUM(order_cost) as total'))
                ->whereMonth('order_date', $cdate-1)
                ->first();
                
        $ordm = DB::table('medical_order')
                ->select(DB::raw('SUM(order_cost) as total'))
                ->whereMonth('order_date', $cdate)
                ->first();
        
        $cura = DB::table('medical_bill')
                ->select(DB::raw('SUM(bill_cost) as total'))
                ->whereMonth('bill_date_in', $cdate-1)
                ->first();

        $curm = DB::table('medical_bill')
                ->select(DB::raw('SUM(bill_cost) as total'))
                ->whereMonth('bill_date_in', $cdate)
                ->first();

        $order = DB::table('medical_order')
                ->orderByDesc('order_date')
                ->limit(4)
                ->get();

        $tran = $cura->total - $orda->total;
        return view('welcome',['med'=>$med,'list'=>$list,'draw'=>$draw,'invs'=>$invs,'order'=>$order,'ordm'=>$ordm,'curm'=>$curm,'tran'=>$tran]);
    }
}
