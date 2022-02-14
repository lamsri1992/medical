<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Models\budgetData;

class budgetController extends Controller
{
  
    public function index()
    {
        $result = DB::connection(session('database'))->table('medical_budget')->get();
        return view('config.budget',['result'=>$result]);
    }

    public function store(Request $request)
    {
        DB::connection(session('database'))->table('medical_budget')->insert(
            [
            'bud_name' => $request->get('bname'),
            'bud_total' => $request->get('btotal'),
            ]
        );
    }

}
