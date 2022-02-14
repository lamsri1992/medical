<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class stockController extends Controller
{
    public function index()
    {
        $result = DB::connection(session('database'))->select(DB::raw("SELECT *, SUM(medical_store.store_amount) AS amount
                    FROM medical_store
                    LEFT JOIN medical_data ON medical_data.med_code = medical_store.store_med_code
                    WHERE medical_data.med_status = 'Y'
                    GROUP BY medical_store.store_med_code"));
        // return dd($result);
        return view('stock.index',['result'=>$result]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
