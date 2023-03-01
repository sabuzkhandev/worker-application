<?php

namespace App\Http\Controllers\MasterSetup;

use App\Http\Controllers\Controller;
use App\Models\BillPrice;
use App\Models\Daily_production;
use App\Models\Worker;
use Illuminate\Http\Request;
use DB;

class MasterSetupController extends Controller
{
    public function create(Request $request)
    {

        return view('pages/createWorker');
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

        Worker::create($worker);

        return back()->with('success', 'Inserted successfully.');
    }

    public function workerList()
    {
        $workerLists = DB::table('workers')->get();
        return view('pages/workerList', compact('workerLists'));
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

        BillPrice::create($bill_price);

        return back()->with('success', 'Inserted successfully.');
    }

    public function bill_price_list(Request $request)
    {
        $title = 'Bill Price List';

        $billPriceList = DB::table('bill_prices')->get();
        return view('pages/billPriceList', compact('billPriceList', 'title'));
    }

    public function createProduction(Request $request)
    {
        $workerDailyProduction = DB::table('workers')
            ->select('workers.worker_name', 'bill_prices.bill_price', 'workers.id as w_id', 'bill_prices.id as b_id')
            ->join('bill_prices', 'bill_prices.worker_type', 'workers.worker_type')
            ->where('workers.worker_type', '1')
            ->where('workers.status', '0')
            ->get();

        // dd($workerDailyProduction);
        return view('pages/dailyProduction', compact('workerDailyProduction'));
    }

    public function InsertProduction(Request $request)
    {

        foreach ($request->worker_id as $key => $value) {
            $data = [
                'worker_id'     => $value,
                'bill_price'    => $request->bill_price[$key],
                'qty'           => $request->qty[$key],
                'total'         => $request->total[$key]
            ];
            Daily_production::create($data);
        }

        return back()->with('success', 'Inserted successfully.');
    }

    public function productionList()
    {
        return view('pages/dailyProductionList');
    }
}
