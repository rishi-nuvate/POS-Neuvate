<?php

namespace App\Http\Controllers\centralWarehouse;

use App\Http\Controllers\Controller;
use App\Http\Controllers\StockAllocationProductController;
use App\Models\Employee;
use App\Models\StockAllocation;
use App\Models\StockAllocationProduct;
use Illuminate\Http\Request;

class PickMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {

        $allocatedStocks = StockAllocation::with('store')->where('picker_id', $id)->get();

        return view('content.centralWarehouse.pick.create', compact('allocatedStocks'));
    }

    public function pendingList()
    {
        $stockAllocation = StockAllocation::with('store', 'stockProduct', 'picker')->get();
        $employees = Employee::all();
        return view('content.centralWarehouse.pick.pendingList', compact('stockAllocation', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function pickerCreat($id)
    {
        $products = StockAllocationProduct::where('stock_allocation_id',$id)->get()->groupBy('product_id');
//        dd($products);
        return view('content.centralWarehouse.pick.picker');
    }

    public function setPicker(Request $request)
    {
        $stockId = $request->input('stockId');
        $picker_id = $request->input('pickerId');
//        dd($picker_id);

        $picker = StockAllocation::where('id', $stockId)->update([
            'picker_id' => $picker_id,
        ]);

        if ($picker) {
            echo 'success';
        }
    }

}
