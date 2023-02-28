<?php

namespace App\Http\Controllers\MasterSetup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class MasterSetupController extends Controller
{
    public function create(Request $request)
    {
        $worker_list = DB::table('workers')->get();
        return view('pages/createWorker', compact('worker_list'));
    }

    public function insert(Request $request)
    {

        $request->validate([
            'worker_name' => 'required',
            'worker_type' => 'required',
        ], [
            'worker_name.required' => 'Worker name field is required.',
            'worker_type.required' => 'Worker type field is required.',
        ]);

        $worker = [
            'worker_name' => $request->worker_name,
            'worker_type' => $request->worker_type,
        ];

        DB::table('workers')->insert($worker);

        return back()->with('success', 'Inserted successfully.');
    }


    public function bill_price_create()
    {
        return view('pages/billPrice');
    }

    public function bill_price_insert(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'worker_type' => 'required',
            'bill_price' => 'required'
        ], [
            'worker_type.required' => 'Worker type field is required.',
            'bill_price.required' => 'Bill Price field is required.'
        ]);

        $bill_price = [
            'worker_type' => $request->worker_type,
            'bill_price' => $request->bill_price,
        ];

        DB::table('bill_prices')->insert($bill_price);

        return back()->with('success', 'Inserted successfully.');
    }
}
