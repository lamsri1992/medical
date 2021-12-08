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
        $med =  $data = DB::table('medical_store')
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
                ,COUNT(medical_order_list.list_id) AS count_order_list,medical_order.order_cost AS sum_total,medical_bill.bill_budget_id AS b_type
                FROM medical_department
                LEFT JOIN medical_order ON medical_order.order_dept_id = medical_department.dept_id
                LEFT JOIN medical_order_list ON medical_order_list.list_order_id = medical_order.order_id
                LEFT JOIN medical_store ON medical_store.store_id = medical_order_list.list_store_id
                LEFT JOIN medical_bill ON medical_bill.bill_id  = medical_store.bill_id
                LEFT JOIN medical_budget ON medical_budget.bud_id = medical_bill.bill_budget_id
                WHERE medical_order.order_date BETWEEN '$date_start' AND '$date_end'
                GROUP BY medical_department.dept_id,medical_department.dept_code,medical_department.dept_name,order_cost
                ORDER BY medical_department.dept_id ASC"));
        
        return view('report.summary',['cost'=>$cost,'num'=>$num,'list'=>$list]);
    }
}
