<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Models\purchaseData;

class purchaseController extends Controller
{
  
    public function index()
    {
        $result = DB::connection(session('database'))->table('medical_purchase')->get();
        return view('config.purchase',['result'=>$result]);
    }

    public function store(Request $request)
    {
        DB::connection(session('database'))->table('medical_purchase')->insert(
            [
            'pur_name' => $request->get('pname'),
            ]
        );
    }

}
