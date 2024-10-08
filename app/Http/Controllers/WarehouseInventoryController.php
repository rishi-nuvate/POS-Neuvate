<?php

namespace App\Http\Controllers;

use App\Models\ProductVariant;
use App\Models\WarehouseInventory;
use App\Http\Requests\StoreWarehouseInventoryRequest;
use App\Http\Requests\UpdateWarehouseInventoryRequest;
use App\Models\WarehouseStockIn;
use Illuminate\Support\Facades\Auth;

class WarehouseInventoryController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWarehouseInventoryRequest $request)
    {
//        dd($request->barcode_number);

        $sku = ProductVariant::where('sku', $request->barcode_number)->first();

        $stockIn = new WarehouseStockIn([
            'date' => date('Y-m-d'),
            'user_id' => Auth::id(),
            'sku_id' => $sku->id,
            'barcode_number' => $request->barcode_number,

        ]);

        $stockIn->save();

        $inventory = WarehouseInventory::where('sku_id', $sku->id)->first();
        if ($inventory->exists()) {
            $inventory->update([
                'good_inventory' => $inventory->good_inventory + 1,
                'total_inventory' => $inventory->total_inventory + 1,
            ]);
        } else {
            $newInventory = new WarehouseInventory([
                'sku_id' => $sku->id,
                'product_id' => $sku->product_id,
                'good_inventory' => 1,
                'total_inventory' => 1
            ]);

            $newInventory->save();
        }


        return redirect()->back()->with('success', 'Product variant added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(WarehouseInventory $warehouseInventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WarehouseInventory $warehouseInventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWarehouseInventoryRequest $request, WarehouseInventory $warehouseInventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WarehouseInventory $warehouseInventory)
    {
        //
    }
}
