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
        $result = \App\Models\budgetData::all();
        return view('config.budget',['result'=>$result]);
    }

    public function store(Request $request)
    {
        $result = new budgetData;
        $result->bud_name = $request->get('bname');
        $result->bud_total = $request->get('btotal');
        $result->save();
    }

}
