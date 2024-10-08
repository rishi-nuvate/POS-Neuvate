<?php

namespace App\Http\Controllers\centralWarehouse;

use App\Http\Controllers\Controller;
use App\Models\BarcodeItem;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\PurchaseOrderItem;
use Illuminate\Http\Request;

class StockInMasterController extends Controller
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

    public function bulkInward()
    {
        $products = Product::get();
        return view('content.centralWarehouse.stockIn.bulkInward', compact('products'));
    }

    public function singleInward()
    {
        return view('content.centralWarehouse.stockIn.singleInward');
    }

    public function getAllPOItem(Request $request)
    {
        $poId = $request->input('poId');
        $result = ['data' => []];
        $poItem = PurchaseOrderItem::where('po_id', $poId)->with('purchaseOrderItemParameter', 'product')->get();
        $num = 1;
        foreach ($poItem as $item) {

            foreach ($item->purchaseOrderItemParameter as $allSku) {
                $sku = $allSku->item_sku;
                $qty = $allSku->item_qty;
                $product = $item->product->product_name;
//                dd($item);

                array_push($result['data'], [$num, $sku, $qty, $product]);

                $num++;
            }
        }
        return json_encode($result['data']);

    }

    public function getProductSku(Request $request)
    {
        $product_id = $request->input('productId');

        $productSku = ProductVariant::where('product_id', $product_id)->get();
        return json_encode($productSku);
    }
}
