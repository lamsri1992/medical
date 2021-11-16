<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Models\companyData;

class companyController extends Controller
{
  
    public function index()
    {
        $result = \App\Models\companyData::all();
        return view('config.company',['result'=>$result]);
    }

    public function store(Request $request)
    {
        $result = new companyData;
        $result->comp_name = $request->get('cname');
        $result->comp_address = $request->get('caddress');
        $result->comp_tel = $request->get('ctel');
        $result->comp_zipcode = $request->get('czipcode');
        $result->save();
    }

}
