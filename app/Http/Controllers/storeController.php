<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Models\medicalStore;

class storeController extends Controller
{
  
    public function index()
    {
        $list = DB::connection(session('database'))->table('medical_bill')
                ->join('medical_budget', 'medical_budget.bud_id', '=', 'medical_bill.bill_budget_id')
                ->join('medical_company', 'medical_company.comp_id', '=', 'medical_bill.bill_company_id')
                ->join('medical_purchase', 'medical_purchase.pur_id', '=', 'medical_bill.bill_purchase_id')
                ->get();
        return view('store.index',['list'=>$list]);
    }

    public function show($id)
    {
        $bill = DB::connection(session('database'))->table('medical_bill')
                ->join('medical_budget', 'medical_budget.bud_id', '=', 'medical_bill.bill_budget_id')
                ->join('medical_company', 'medical_company.comp_id', '=', 'medical_bill.bill_company_id')
                ->join('medical_purchase', 'medical_purchase.pur_id', '=', 'medical_bill.bill_purchase_id')
                ->where('bill_id', $id)
                ->first();
        $list = DB::connection(session('database'))->table('medical_store')
                ->select('*', DB::raw('sum(store_amount + list_amount) as amount'))
                ->join('medical_data', 'medical_data.med_code', '=', 'medical_store.store_med_code')
                ->leftjoin('medical_order_list', 'medical_order_list.list_store_id', '=', 'medical_store.store_id')
                ->where('bill_id', $id)
                ->groupBy('medical_store.store_id')
                ->get();
        $data = DB::connection(session('database'))->table('medical_data')->get();
        $budget = DB::connection(session('database'))->table('medical_budget')->get();
        $company = DB::connection(session('database'))->table('medical_company')->get();
        $purchase = DB::connection(session('database'))->table('medical_purchase')->get();
        // dd($list);
        return view('store.show',['bill'=>$bill,'list'=>$list,'data'=>$data,'budget'=>$budget,'company'=>$company,'purchase'=>$purchase]);
    }

    public function receive()
    {
        $data = DB::connection(session('database'))->table('medical_data')->where('med_status','Y')->get();
        $budget = DB::connection(session('database'))->table('medical_budget')->get();
        $company = DB::connection(session('database'))->table('medical_company')->get();
        $purchase = DB::connection(session('database'))->table('medical_purchase')->get();
        $unit = DB::connection(session('database'))->table('medical_unit')->get();
        return view('store.receive',['data'=>$data,'budget'=>$budget,'company'=>$company,'purchase'=>$purchase,'unit'=>$unit]);
    }

    public function add(Request $request)
    {
        $id = DB::connection(session('database'))->table('medical_bill')->insertGetId(
                [
                'bill_date_in' => $request->get('datein'),
                'bill_no' => $request->get('billno'),
                'bill_send_no' => $request->get('billno'),
                'bill_order_no' => $request->get('orderno'),
                'bill_order_date' => $request->get('dateorder'),
                'bill_date_approve' => $request->get('dateapprove'),
                'bill_budget_id' => $request->get('budget'),
                'bill_purchase_id' => $request->get('purchase'),
                'bill_company_id' => $request->get('company'),
                ]
        );

        $cost = 0;
        foreach ($request->addField as $key => $value) {
            // echo($value['amount']);
            $cost += $value['total'];
            DB::connection(session('database'))->table('medical_store')->insert(
                [
                'store_med_code' => $value['name'],
                'store_amount' => $value['amount'],
                'store_price' => $value['price'],
                'store_total' => $value['total'],
                'store_expire' => $value['expire'],
                'store_lot_no' => $value['lot'],
                'bill_id' => $id,
                ]
            );
        }

        DB::connection(session('database'))->table('medical_bill')->where('bill_id', $id)->update(['bill_cost' => $cost]);

    }

    public function withdraw()
    {
        $data = DB::connection(session('database'))->table('medical_store')
                ->join('medical_data', 'medical_data.med_code', '=', 'medical_store.store_med_code')
                ->get();
        $dept = DB::connection(session('database'))->table('medical_department')->get();
        return view('store.withdraw',['data'=>$data,'dept'=>$dept]);
    }

    public function getMedical(Request $request)
    {
        $search = $request->search;        
        $med =  $data = DB::connection(session('database'))->table('medical_store')
                ->join('medical_data', 'medical_data.med_code', '=', 'medical_store.store_med_code')
                ->where('medical_store.store_amount', '>', 0)
                ->where('medical_data.med_name', 'like', '%' .$search . '%')
                ->where('medical_data.med_status', '=', 'Y')
                ->orderBy('medical_store.store_expire', 'asc')
                ->get();
        $response = array();
        foreach($med as $meds){
           $response[] = array("value"=>$meds->store_id,"label"=>$meds->med_name." ".$meds->med_content." / ".$meds->med_unit,
           "lot"=>$meds->store_lot_no,"amount"=>$meds->store_amount,"exp"=>$meds->store_expire);
        }
  
        return response()->json($response);
     }

     public function take(Request $request)
     {
        $id = DB::connection(session('database'))->table('medical_order')->insertGetId(
            [
            'order_no' => $request->get('order_no'),
            'order_date' => $request->get('order_date'),
            'order_dept_id' => $request->get('order_dept_id'),
            ]
        );

        foreach ($request->addField as $key => $value) {
            DB::connection(session('database'))->table('medical_order_list')->insert(
                [
                'list_order_id' => $id,
                'list_order_no' => $request->get('order_no'),
                'list_store_id' => $value['g_id'],
                'list_amount' => $value['withdraw']
                ]
            );
        }
    }

    public function edit(Request $request)
    {
       foreach ($request->addField as $key => $value) {
        // echo $value['id'];
        // echo $value['list_amount'];
            DB::connection(session('database'))->table('medical_order_list')->where('list_id', $value['id'])->update(
               [
               'list_amount' => $value['list_amount']
               ]
           );
       }
   }

    public function order()
    {
        $order = DB::connection(session('database'))->table('medical_order')
                ->join('medical_department', 'medical_department.dept_id', '=', 'medical_order.order_dept_id')
                ->join('order_status', 'order_status.status_id', '=', 'medical_order.order_status')
                ->get();
        return view('store.order',['order'=>$order]);
    }

    public function order_show($id)
    {
        $order = DB::connection(session('database'))->table('medical_order')
                ->join('medical_department', 'medical_department.dept_id', '=', 'medical_order.order_dept_id')
                ->join('order_status', 'order_status.status_id', '=', 'medical_order.order_status')
                ->where('order_id', $id)
                ->first();
        $list = DB::connection(session('database'))->table('medical_order_list')
                ->join('medical_order', 'medical_order.order_id', '=', 'medical_order_list.list_order_id')
                ->join('medical_store', 'medical_store.store_id', '=', 'medical_order_list.list_store_id')
                ->join('medical_data', 'medical_data.med_code', '=', 'medical_store.store_med_code')
                ->where('list_order_id', $id)
                ->get();
        return view('store.order_show',['order'=>$order,'list'=>$list]);
    }

    public function confirm($id)
    {
        $order = DB::connection(session('database'))->table('medical_order')->where('order_id', $id)->first();
        $store = DB::connection(session('database'))->table('medical_store')->get();
        $result = DB::connection(session('database'))
                ->select("SELECT medical_order_list.list_id,medical_store.store_id,medical_store.store_med_code,
                            medical_store.store_amount,medical_order_list.list_amount,
                            medical_store.store_amount - medical_order_list.list_amount AS new_amount,medical_store.store_price,
                            (medical_store.store_amount - medical_order_list.list_amount) * medical_store.store_price AS new_total,
                            medical_store.store_total
                            FROM medical_order_list
                            LEFT JOIN medical_store ON medical_store.store_id = medical_order_list.list_store_id
                            WHERE medical_order_list.list_order_id = $id");
        // return response()->json($result);
        $list = DB::connection(session('database'))->table('medical_order_list')
                ->join('medical_order', 'medical_order.order_id', '=', 'medical_order_list.list_order_id')
                ->join('medical_store', 'medical_store.store_id', '=', 'medical_order_list.list_store_id')
                ->join('medical_data', 'medical_data.med_code', '=', 'medical_store.store_med_code')
                ->where('list_order_id', $id)
                ->get();

        $total = 0;
        foreach ($list as $lists){
            $total += $lists->store_price * $lists->list_amount;
        }

            DB::connection(session('database'))->table('medical_order')->where('order_id', $id)->update(
                [
                    'order_id' => $id,
                    'order_status' => 2,
                    'order_confirm' => date('Y-m-d'),
                    'order_cost' => $total,
                ]
            );

        foreach($result as $res){
            DB::connection(session('database'))->table('medical_store')->where('store_id', $res->store_id)->update(
                [
                    'store_amount' => $res->new_amount,
                    'store_total' => $res->new_total
                ]
            );
        }
        return back()->with('success','ยืนยันรายการเบิกจ่ายสำเร็จ เลขที่ใบเบิก : '.$order->order_no);
    }

    public function cancel($id)
    {
        $order = DB::connection(session('database'))->table('medical_order')->where('order_id', $id)->first();
        DB::connection(session('database'))->table('medical_order')->where('order_id', $id)->update(
            [
                'order_status' => 3,
                'order_confirm' => date('Y-m-d'),
            ]
        );
        return back()->with('cancel','ยกเลิกรายการเบิกจ่ายสำเร็จ เลขที่ใบเบิก : '.$order->order_no);
    }

}
