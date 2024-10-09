<?php

namespace App\Http\Controllers;

use App\Models\ProductVariant;
use App\Models\WarehouseInventory;
use App\Http\Requests\StoreWarehouseInventoryRequest;
use App\Http\Requests\UpdateWarehouseInventoryRequest;
use App\Models\WarehouseStockIn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WarehouseInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('content.centralWarehouse.inventoryManagement.inventoryList');
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

        DB::beginTransaction();

        $stockIn = new WarehouseStockIn([
            'date' => date('Y-m-d'),
            'user_id' => Auth::id(),
            'sku_id' => $sku->id,
            'barcode_number' => $request->barcode_number,
            'scan_quantity' => 1,

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

        DB::commit();

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

    public function bulkInwardStore(StoreWarehouseInventoryRequest $request)
    {
//        dd($request->all());

        foreach ($request->sku_id as $key => $id) {

            $sku = ProductVariant::where('sku', $id)->first();

            DB::beginTransaction();

            $stockIn = new WarehouseStockIn([
                'date' => date('Y-m-d'),
                'user_id' => Auth::id(),
                'sku_id' => $sku->id,
                'barcode_number' => $sku->sku,
                'scan_quantity' => $request->inward_quantity[$key]
            ]);

            $stockIn->save();

//            dd(request()->all());

            $inventory = WarehouseInventory::where('sku_id', $sku->id)->first();

            if ($inventory != null) {
                $inventory->update([
                    'good_inventory' => $inventory->good_inventory + $request->inward_quantity[$key],
                    'total_inventory' => $inventory->total_inventory + $request->inward_quantity[$key],
                ]);
            } else {
                $newInventory = new WarehouseInventory([
                    'sku_id' => $sku->id,
                    'product_id' => $sku->product_id,
                    'good_inventory' => $request->inward_quantity[$key],
                    'total_inventory' => $request->inward_quantity[$key]
                ]);

                $newInventory->save();
            }

            DB::commit();

        }

        return redirect()->back()->with('success', 'Product variant added successfully');

    }

    public function getInventory()
    {
        $inventory = WarehouseInventory::with('product','ProductVariant')->get();

//        dd($inventory);
        $result = array("data" => array());

        $num = 1;
        foreach ($inventory as $item) {

//            $warehouse = $inventory->warehouse->warehouse_name ?? null;
            $product = $item->product->product_name;
            $total = $item->total_inventory;
            $rate = $item->product->cost_price;
            $goodInventory = $item->good_inventory;
            $badInventory = $item->bad_inventory ?? 0;
            $action = '<p>';

            array_push($result["data"], array($num, $product, $total, $rate, $goodInventory, $badInventory, $action));

        }

        echo json_encode($result);

    }
}
