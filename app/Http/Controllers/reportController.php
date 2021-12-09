<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class reportController extends Controller
{
    public function index()
    {
        return view('report.index');
    }

    public function report_order($id)
    {
        $order = DB::table('medical_order')
                ->join('medical_department', 'medical_department.dept_id', '=', 'medical_order.order_dept_id')
                ->join('order_status', 'order_status.status_id', '=', 'medical_order.order_status')
                ->where('order_id', $id)
                ->first();

        $list = DB::table('medical_order_list')
                ->join('medical_order', 'medical_order.order_id', '=', 'medical_order_list.list_order_id')
                ->join('medical_store', 'medical_store.store_id', '=', 'medical_order_list.list_store_id')
                ->join('medical_data', 'medical_data.med_code', '=', 'medical_store.store_med_code')
                ->where('list_order_id', $id)
                ->get();
        return view('report.print',['order'=>$order,'list'=>$list]);
    }

    public function stockcard(Request $request)
    {
        $med = DB::table('medical_store')
                ->join('medical_data', 'medical_data.med_code', '=', 'medical_store.store_med_code')
                ->get();
        return view('report.stockcard',['med'=>$med]);
    }

    public function summary(Request $request)
    {
        $date_start =  $request->get('date_start');
        $date_end =  $request->get('date_end');
        $num = DB::table('medical_order')
                ->whereBetween('order_date', [$request->get('date_start'), $request->get('date_end')])
                ->count();

        $cost =  $data = DB::table('medical_order')
                ->select(DB::raw('SUM(order_cost) as total'))
                ->whereBetween('order_date', [$request->get('date_start'), $request->get('date_end')])
                ->first();

        $list = DB::select(DB::raw("SELECT medical_department.dept_id,medical_department.dept_code,medical_department.dept_name
                ,COUNT(medical_order_list.list_id) AS count_order_list,
                (SELECT SUM(medical_order.order_cost) FROM medical_order
                WHERE medical_order.order_dept_id = medical_department.dept_id) AS totals
                FROM medical_department
                LEFT JOIN medical_order ON medical_order.order_dept_id = medical_department.dept_id
                LEFT JOIN medical_order_list ON medical_order_list.list_order_id = medical_order.order_id
                LEFT JOIN medical_store ON medical_store.store_id = medical_order_list.list_store_id
                LEFT JOIN medical_bill ON medical_bill.bill_id  = medical_store.bill_id
                LEFT JOIN medical_budget ON medical_budget.bud_id = medical_bill.bill_budget_id
                WHERE medical_order.order_date BETWEEN '$date_start' AND '$date_end'
                GROUP BY medical_department.dept_id
                ORDER BY medical_department.dept_id ASC"));
        // return dd($list);
        return view('report.summary',['cost'=>$cost,'num'=>$num,'list'=>$list]);
    }

    public function history(Request $request)
    {
        $date_start =  $request->get('date_start');
        $date_end =  $request->get('date_end');
        $ds = Date("Y-m-d", strtotime("$date_start -1 Month"));
        $dn = Date("Y-m-d", strtotime("$date_start -1 Month +29 Days"));

        $med =  DB::select(DB::raw("SELECT DISTINCT medical_data.med_id,medical_data.med_code,medical_data.med_name,
                medical_data.med_unit,medical_store.store_id,medical_store.store_price,medical_store.store_amount,
                (SELECT SUM(medical_store.store_amount) FROM medical_store
                WHERE medical_store.store_med_code = medical_data.med_code 
                AND medical_store.create_at BETWEEN '$ds' AND '$dn') AS carry,
                (SELECT SUM(medical_store.store_amount) FROM medical_store
                WHERE medical_store.store_med_code = medical_data.med_code 
                AND medical_store.create_at BETWEEN '$date_start' AND '$date_end') AS receives,
                (SELECT SUM(medical_order_list.list_amount) FROM medical_order_list
                WHERE medical_order_list.list_store_id = medical_store.store_id 
                AND medical_order_list.list_date BETWEEN '$date_start' AND '$date_end') AS paid,
                (SELECT SUM(medical_store.store_amount) FROM medical_store
                WHERE medical_store.store_med_code = medical_data.med_code) AS totals
                FROM medical_data
                LEFT JOIN medical_store ON medical_store.store_med_code = medical_data.med_code
                LEFT JOIN medical_order_list ON medical_order_list.list_store_id = medical_store.store_id
                LEFT JOIN medical_order ON medical_order.order_id = medical_order_list.list_order_id
                GROUP BY medical_data.med_id
                ORDER BY medical_data.med_id DESC"));

        return view('report.history',['med'=>$med]);
    }

    public function month(Request $request)
    {
        $curm = DB::table('medical_bill')
                ->select(DB::raw('SUM(bill_cost) as total'))
                ->whereMonth('bill_date_in', $request->get('emonth'))
                ->first();

        $uc = DB::table('medical_bill')
                ->select(DB::raw('SUM(bill_cost) as total'))
                ->whereMonth('bill_date_in', $request->get('emonth'))
                ->where('bill_budget_id', 1)
                ->first();

        $dc = DB::table('medical_bill')
                ->select(DB::raw('SUM(bill_cost) as total'))
                ->whereMonth('bill_date_in', $request->get('emonth'))
                ->where('bill_budget_id', 2)
                ->first();

        $total = DB::table('medical_bill')
                ->select(DB::raw('SUM(bill_cost) as total'))
                ->whereMonth('bill_date_in', $request->get('emonth'))
                ->where('bill_budget_id', 2)
                ->first();
        
        $med = DB::table('medical_store')
                ->select(DB::raw('SUM(store_price * store_amount) as total'))
                ->join('medical_bill', 'medical_bill.bill_id', '=', 'medical_store.bill_id')
                ->first();

        $med2 = DB::table('medical_store')
                ->select(DB::raw('SUM(store_price * store_amount) as total'))
                ->join('medical_bill', 'medical_bill.bill_id', '=', 'medical_store.bill_id')
                ->where('bill_budget_id', 1)
                ->first();

        $med3 = DB::table('medical_store')
                ->select(DB::raw('SUM(store_price * store_amount) as total'))
                ->join('medical_bill', 'medical_bill.bill_id', '=', 'medical_store.bill_id')
                ->where('bill_budget_id', 2)
                ->first();

        $med4 = DB::table('medical_store')
                ->select(DB::raw('SUM(store_price * store_amount) as total'))
                ->join('medical_bill', 'medical_bill.bill_id', '=', 'medical_store.bill_id')
                ->where('bill_budget_id', 3)
                ->first();

        $ordm = DB::table('medical_order')
                ->select(DB::raw('SUM(store_price * list_amount) as total'))
                ->join('medical_order_list', 'medical_order_list.list_order_id', '=', 'medical_order.order_id')
                ->join('medical_store', 'medical_store.store_id', '=', 'medical_order_list.list_store_id')
                ->whereMonth('order_date', $request->get('emonth'))
                ->first();

        $ordm2 = DB::table('medical_order')
                ->select(DB::raw('SUM(store_price * list_amount) as total'))
                ->join('medical_order_list', 'medical_order_list.list_order_id', '=', 'medical_order.order_id')
                ->join('medical_store', 'medical_store.store_id', '=', 'medical_order_list.list_store_id')
                ->join('medical_bill', 'medical_bill.bill_id', '=', 'medical_store.bill_id')
                ->whereMonth('order_date', $request->get('emonth'))
                ->where('bill_budget_id', 1)
                ->first();
        
        $ordm3 = DB::table('medical_order')
                ->select(DB::raw('SUM(store_price * list_amount) as total'))
                ->join('medical_order_list', 'medical_order_list.list_order_id', '=', 'medical_order.order_id')
                ->join('medical_store', 'medical_store.store_id', '=', 'medical_order_list.list_store_id')
                ->join('medical_bill', 'medical_bill.bill_id', '=', 'medical_store.bill_id')
                ->whereMonth('order_date', $request->get('emonth'))
                ->where('bill_budget_id', 2)
                ->first();
        
        $ordm4 = DB::table('medical_order')
                ->select(DB::raw('SUM(store_price * list_amount) as total'))
                ->join('medical_order_list', 'medical_order_list.list_order_id', '=', 'medical_order.order_id')
                ->join('medical_store', 'medical_store.store_id', '=', 'medical_order_list.list_store_id')
                ->join('medical_bill', 'medical_bill.bill_id', '=', 'medical_store.bill_id')
                ->whereMonth('order_date', $request->get('emonth'))
                ->where('bill_budget_id', 3)
                ->first();
        // return dd($ordm,$ordm2,$ordm3);
        return view('report.month',['curm'=>$curm,'uc'=>$uc,'dc'=>$dc,'med'=>$med,'med2'=>$med2,'med3'=>$med3,'med4'=>$med4,'ordm'=>$ordm,'ordm2'=>$ordm2,'ordm3'=>$ordm3,'ordm4'=>$ordm4]);
    }
}
