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
        $result = DB::connection(session('database'))->table('medical_company')->get();
        return view('config.company',['result'=>$result]);
    }

    public function store(Request $request)
    {
        DB::connection(session('database'))->table('medical_company')->insert(
            [
            'comp_name' => $request->get('cname'),
            'comp_address' => $request->get('caddress'),
            'comp_tel' => $request->get('ctel'),
            'comp_zipcode' => $request->get('czipcode'),
            ]
        );
    }

}
