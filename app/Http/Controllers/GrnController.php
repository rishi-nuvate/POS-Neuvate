<?php

namespace App\Http\Controllers;

use App\Models\Grn;
use App\Http\Requests\StoreGrnRequest;
use App\Http\Requests\UpdateGrnRequest;
use App\Models\GrnItem;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrnController extends Controller
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
        $purchaseOrders = PurchaseOrder::all();
        $products = Product::all();
        return view('content.centralWarehouse.grn.create', compact('purchaseOrders', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGrnRequest $request)
    {

        DB::beginTransaction();
        $grn_num = Grn::all()->last()->grn_num + 1;

        $grn = new Grn([
            'date' => $request->date,
            'invoice_number' => $request->invoice_no,
            'grn_num' => $grn_num,
            'po_id' => $request->po_id,
        ]);

        $grn->save();

        if ($request->WithPOSelect == 1) {
            foreach ($request->received_quantity as $key => $quantity) {
                $grnItem = new GrnItem([
                    'grn_id' => $grn->id,
                    'po_item_parameter_id' => $key,
                    'received_quantity' => $quantity,
                ]);
                $grnItem->save();
            }
        } else {
            foreach ($request->item_sku as $key => $sku) {
                $grnItem = new GrnItem([
                    'grn_id' => $grn->id,
                    'sku_id' => $sku,
                    'received_quantity' => $request->ptoduct_quantity[$key],
                ]);
                $grnItem->save();
            }

        }
//        dd($request->all());

        DB::commit();
        return redirect()->back()->with('success', 'GRN Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grn $grn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grn $grn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGrnRequest $request, Grn $grn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grn $grn)
    {
        //
    }

    public function getProductGrn(Request $request)
    {
        $productId = $request->input('productId');
        $product = Product::where('id', $productId)->first();
        $productSku = ProductVariant::where('product_id', $productId)->get();

        return response()->json([
            'product' => $product,
            'productSku' => $productSku
        ]);
    }

    public function getGrn(Request $request)
    {
        $grnId = $request->input('grnId');

        $grn = Grn::with('grnItem.sku.product', 'grnItem.poParameterId.sku.product')
            ->where('id', $grnId)
            ->whereHas('grnItem', function ($query) {
                $query->where('quality_check', 'bad');
            })
            ->first();

//        dd($grn);
        return response()->json($grn);
    }
}
