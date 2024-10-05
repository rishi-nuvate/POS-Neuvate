<?php

namespace App\Http\Controllers;

use App\Models\Barcode;
use App\Http\Requests\StoreBarcodeRequest;
use App\Http\Requests\UpdateBarcodeRequest;
use App\Models\BarcodeItem;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.supplyChain.barcode.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.supplyChain.barcode.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBarcodeRequest $request)
    {
//        dd($request->all());
        $user_id = auth()->id();

        $barcode = new Barcode([
            'packing_date' => $request->pack_date,
            'product_id' => $request->products
        ]);
        $barcode->save();
        foreach ($request->sku_id as $key => $value) {
            if (!empty($request->sku_quantity[$key])) {
                $barcode_item = new BarcodeItem([
                    'barcode_id' => $barcode->id,
                    'sku_id' => $value,
                    'sku_quantity' => $request->sku_quantity[$key],
                    'user_id' => $user_id
                ]);
                $barcode_item->save();
            }
        }
        return redirect()->back()->with('success', 'Barcode created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barcode $barcode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barcode $barcode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBarcodeRequest $request, Barcode $barcode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barcode $barcode)
    {
        //
    }

    public function productData()
    {
        $products = Product::all();
        return json_encode($products);
    }

    public function productVariantBarcode(Request $request)
    {
        $product_id = $request->input('productId');

        $variant = ProductVariant::where('product_id', $product_id)->get()->groupBy('color');

        return json_encode($variant);
//        dd($variant);
    }

    public function getBarcode(Request $request)
    {
        $barcode = Barcode::with('barcodeItem', 'product')->get()->groupBy('product_id');

        $result = ['data' => []];
        $barcodeItem = BarcodeItem::join('product_variants', 'product_variants.id', '=', 'barcode_items.sku_id')
            ->join('barcodes', 'barcodes.id', '=', 'barcode_items.barcode_id')
            ->join('products', 'products.id', '=', 'barcodes.product_id')
            ->select('product_variants.sku as sku', 'products.product_name as product_name', 'barcode_items.sku_quantity as sku_quantity', 'barcodes.*');


//        dd($barcodeItem->get());
        $allBarcode = $barcodeItem->get()->groupBy('product_name');
//        dd($allBarcode);
        $num = 1;

        foreach ($allBarcode as $key => $value) {

            $product = $key;
            $pack_date = $value[0]->packing_date;
            $htmlDetails = '';

            foreach ($value as $sku) {
                $htmlDetails .= '<button type="button" class="m-2 btn btn-sm btn-outline-primary round waves-effect">' . $sku->sku . '</button>';
            }
            $total_quantity = $value->sum('sku_quantity');
//            dd($total_quantity);
            array_push($result['data'], [$num, $product, $pack_date, $htmlDetails, $total_quantity]);
            $num++;
        }
        echo json_encode($result);

    }
}
