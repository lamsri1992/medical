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
        
        // return dd($order,$list);
    }
}
