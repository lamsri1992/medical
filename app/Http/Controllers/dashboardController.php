<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;

class dashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cdate = date('m');
        $med = DB::connection(session('database'))->table('medical_store')
                ->select(DB::raw('SUM(store_total) as total'))
                ->first();
        $list = DB::connection(session('database'))->table('medical_store')->count();
        $draw = DB::connection(session('database'))->table('medical_order_list')->count();

        $invs = DB::connection(session('database'))->table('medical_bill')
                ->orderByDesc('bill_date_in')
                ->limit(4)
                ->get();
        
        $orda = DB::connection(session('database'))->table('medical_order')
                ->select(DB::raw('SUM(order_cost) as total'))
                ->whereMonth('order_date', $cdate-1)
                ->first();
                
        $ordm = DB::connection(session('database'))->table('medical_order')
                ->select(DB::raw('SUM(order_cost) as total'))
                ->whereMonth('order_date', $cdate)
                ->first();
        
        $cura = DB::connection(session('database'))->table('medical_bill')
                ->select(DB::raw('SUM(bill_cost) as total'))
                ->whereMonth('bill_date_in', $cdate-1)
                ->first();

        $curm = DB::connection(session('database'))->table('medical_bill')
                ->select(DB::raw('SUM(bill_cost) as total'))
                ->whereMonth('bill_date_in', $cdate)
                ->first();

        $order = DB::connection(session('database'))->table('medical_order')
                ->orderByDesc('order_date')
                ->limit(4)
                ->get();

        $tran = $cura->total - $orda->total;
        return view('welcome',['med'=>$med,'list'=>$list,'draw'=>$draw,'invs'=>$invs,'order'=>$order,'ordm'=>$ordm,'curm'=>$curm,'tran'=>$tran]);
    }

    
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
