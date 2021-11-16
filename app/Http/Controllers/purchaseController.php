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
        $result = \App\Models\purchaseData::all();
        return view('config.purchase',['result'=>$result]);
    }

    public function store(Request $request)
    {
        $result = new purchaseData;
        $result->pur_name = $request->get('pname');
        $result->save();
    }

}
