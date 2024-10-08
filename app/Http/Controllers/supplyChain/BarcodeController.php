<?php

namespace App\Http\Controllers\supplyChain;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBarcodeRequest;
use App\Http\Requests\UpdateBarcodeRequest;
use App\Models\Barcode;
use App\Models\BarcodeItem;
use App\Models\Company;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
//        dd($barcode);
        return view('content.supplyChain.barcode.edit', compact('barcode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBarcodeRequest $request, Barcode $barcode)
    {
        $user_id = auth()->id();

//        dd($request->all());

        foreach ($request->sku as $key => $value) {
            $barcode_item = BarcodeItem::where('id', $request->sku_id[$key])
                ->update([
                    'sku_quantity' => $request->sku_quantity[$key],
                    'user_id' => $user_id
                ]);
        }
        return redirect()->route('barcode.index')->with('success', 'Barcode updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barcode $barcode)
    {

        Gate::allows('delete', $barcode);
        $barcode->delete();
        return redirect()->route('barcode.index')->with('success', 'Barcode deleted successfully.');
    }

    public function productData()
    {
        $products = Product::all();
        return json_encode($products);
    }

    public function productVariantBarcode(Request $request)
    {
        $product_id = $request->input('productId');
        $barcode_id = $request->input('barcodeId') ?? '';

        if (!empty($barcode_id)) {

            $allBarcode = BarcodeItem::with([
                'productVariant',
                'barcode.product'
            ])
                ->where('barcode_id', '=', $barcode_id)
                ->get()
                ->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'sku' => $item->productVariant->sku,
                        'color' => $item->productVariant->color,
                        'sku_quantity' => $item->sku_quantity,
                    ];
                })
                ->groupBy('color');

//            dd($allBarcode);
            return json_encode($allBarcode);
        } else {

            $variant = ProductVariant::where('product_id', $product_id)->get()->groupBy('color');

            return json_encode($variant);

        }


//        dd($variant);
    }

    public function getBarcode(Request $request)
    {
//        $barcode = Barcode::with('barcodeItem', 'product')->get()->groupBy('product_id');

        $result = ['data' => []];

        $allBarcode = BarcodeItem::with([
            'productVariant',
            'barcode.product'
        ])->get();


        $allBarcode = BarcodeItem::with([
            'productVariant',
            'barcode.product'
        ])
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->barcode->id,
                    'sku' => $item->productVariant->sku,
                    'product_name' => $item->barcode->product->product_name,
                    'sku_quantity' => $item->sku_quantity,
                    'packing_date' => $item->barcode->packing_date
                ];
            })
            ->groupBy('product_name');

//        $filteredBarcode = $allBarcode->filter(function ($item) {
//            return $item['sku_quantity'] == 40;
//        });
//
//        $filteredBarcode = $filteredBarcode->groupBy('product_name')->toArray();


//        $barcodeItem = BarcodeItem::join('product_variants', 'product_variants.id', '=', 'barcode_items.sku_id')
//            ->join('barcodes', 'barcodes.id', '=', 'barcode_items.barcode_id')
//            ->join('products', 'products.id', '=', 'barcodes.product_id')
//            ->select('product_variants.sku as sku', 'products.product_name as product_name', 'barcode_items.sku_quantity as sku_quantity', 'barcodes.*');
//
//
////        dd($barcodeItem->get());
//        $allBarcode = $barcodeItem->get()->groupBy('product_name');
//        dd($filteredBarcode);
//        dd($allBarcode);
        $num = 1;

        foreach ($allBarcode as $key => $value) {
            $product = $key;
            $pack_date = $value[0]['packing_date'];
            $htmlDetails = '';

            foreach ($value as $sku) {
                $htmlDetails .= '<button type="button" class="m-2 btn btn-sm btn-outline-primary round waves-effect">' . $sku['sku'] . '</button>';
            }
            $total_quantity = $value->sum('sku_quantity');

            $barcode = '<button type="button" class="m-2 btn btn-sm btn-outline-primary round waves-effect"><a  href="/generateBarcode/' . $value[0]['id'] . '"> Generate Barcode </a> </button>';

            $action = ' <a href="barcode/' . $value[0]['id'] . '/edit" title="Edit" class="btn btn-icon btn-label-primary mx-1"><i class="ti ti-edit mx-2 ti-sm"></i></a>
            <button onclick="deleteBarcode(' . $value[0]['id'] . ')" title="Delete" class="btn btn-icon btn-label-danger mx-1"><i class="ti ti-trash mx-2 ti-sm"></i></button>';
//            dd($total_quantity);
            array_push($result['data'], [$num, $product, $pack_date, $htmlDetails, $total_quantity, $barcode, $action]);
            $num++;
        }
        echo json_encode($result);

    }

    public function generateBarcode($barcode_id)
    {
        $company = Company::where('id', 14)->first();
        $allSku = BarcodeItem::where('barcode_id', $barcode_id)->with('productVariant.product')->get();
//        dd($sku);
        return view('content.supplyChain.barcode.barcodeGenerate', compact('allSku','company'));
    }
}
