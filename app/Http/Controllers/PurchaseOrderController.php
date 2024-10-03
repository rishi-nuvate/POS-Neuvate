<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyShipAddress;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\PurchaseOrder;
use App\Http\Requests\StorePurchaseOrderRequest;
use App\Http\Requests\UpdatePurchaseOrderRequest;
use App\Models\PurchaseOrderItem;
use App\Models\PurchaseOrderItemParameter;
use App\Models\User;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Pos = PurchaseOrder::with('Company', 'ShipAddress', 'Vendor')->get();
        $vendors = User::where('role', 'vendor')->get();
        return view('content.supplyChain.po.list', compact('Pos', 'vendors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::with('ShipAdd')->get();

        $vendors = User::where('role', 'vendor')->get();

        $products = Product::get();

//        dd(1);

        return view('content.supplyChain.po.create', compact('companies', 'vendors', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePurchaseOrderRequest $request)
    {

//        dd($request->all());
        $count = count($request->unitPrice);
        $sku_count = count($request->sku);

        if (!empty($request->vendor) && !empty($request->company) && !empty($request->shippingAddress)) {
            $Po = new PurchaseOrder([
                'user_id' => $request->vendor,
                'company_id' => $request->company,
                'company_shipping_id' => $request->shippingAddress,
            ]);

            if ($Po->save()) {
                for ($i = 0; $i < $count; $i++) {
                    $PoItems = new PurchaseOrderItem([
                        'po_id' => $Po->id,
                        'product_id' => $request->product_id[$i],
                        'product_description' => $request->description[$i],
                        'unit_price' => $request->unitPrice[$i],
                        'tax_amount' => $request->tax[$i],
                        'total_quantity' => $request->TotalQty[$i],
                    ]);

                    if ($PoItems->save()) {
                        for ($j = 0; $j < $sku_count; $j++) {
                            $PoItemParameters = new PurchaseOrderItemParameter([
                                'po_id' => $Po->id,
                                'po_item_id' => $PoItems->id,
                                'item_sku' => $request->sku[$j],
                                'item_color' => $request->color[$j],
                                'item_size' => $request->size[$j],
                                'item_qty' => $request->quantity[$j],
                            ]);
                            if (!$PoItemParameters->save()) {
                                return redirect()->route('po.create')->withErrors('Error saving POItemParameters.');
                            }
                        }
                    } else {
                        return redirect()->route('po.create')->withErrors('Error saving POItems.');
                    }
                }
                return redirect()->route('po.create')->withSuccess('Successfully Saved');
            } else {
                return redirect()->route('po.create')->withErrors('Error saving PO.');
            }
        }
        return redirect()->route('po.create')->withSuccess('Validation Failed');
    }

    /**
     * Display the specified resource.
     */
    public function show(PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePurchaseOrderRequest $request, PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseOrder $purchaseOrder)
    {
        //
    }

    public function getSkuByProduct(Request $request)
    {

        $product = $request->product_id;
        $data = [];
        $productRow = Product::where('id', $product)->first();
        $productVariants = ProductVariant::where('product_id', $product)->get();

        $productColorArray = [];
        $productSizeArray = [];
        $productSkuArray = [];

        foreach ($productVariants as $productVariant) {
            $productColorArray[] = $productVariant->color;
            $productSizeArray[] = $productVariant->size;
            $productSkuArray[] = $productVariant->sku;
        }

        $data["productColors"] = $productColorArray;
        $data["productSize"] = $productSizeArray;
        $data["productSkus"] = $productSkuArray;
        $data["productRow"] = $productRow->cost_price;

        return response()->json($data);

    }

    public function getProductVariant(Request $request)
    {
        $product = $request->product_id;
        $data = [];
        $productRow = Product::where('id', $product)->first();
        $productVariants = ProductVariant::where('product_id', $product)->get();

        $productColorArray = [];
        $productSizeArray = [];
        $productSkuArray = [];

        foreach ($productVariants as $productVariant) {
            $productColorArray[] = $productVariant->color;
            $productSizeArray[] = $productVariant->size;
            $productSkuArray[] = $productVariant->sku;
        }

        $data["productColors"] = $productColorArray;
        $data["productSize"] = $productSizeArray;
        $data["productSkus"] = $productSkuArray;

        return response()->json($data);
    }

    public function getVendorAddress(Request $request){
        $vendor_id = $request->input('vendorId');
        $vendor = User::with('UserAddress')->where('id', $vendor_id)->first();

        return response()->json($vendor);

//        dd($vendor);
    }
}
