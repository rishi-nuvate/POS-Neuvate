<?php

namespace App\Http\Controllers;

use App\Models\BaseStockCategory;
use App\Models\Category;
use App\Models\CentralWarehouse;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Season;
use App\Models\StockAllocation;
use App\Http\Requests\StoreStockAllocationRequest;
use App\Http\Requests\UpdateStockAllocationRequest;
use App\Models\StockAllocationProduct;
use App\Models\StoreGenerate;
use App\Models\Tags;
use App\Models\WarehouseInventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tag;

class StockAllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seasons = Season::all();
        $categories = category::all();
        $products = Product::all();
        $tags = Tags::all();
        $stores = StoreGenerate::all();
        $warehouses = CentralWarehouse::all();
        return view('content.orderRequisition.salesOrder.index', compact('seasons', 'categories', 'products', 'tags', 'stores', 'warehouses'));

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
    public function store(StoreStockAllocationRequest $request)
    {

        DB::beginTransaction();

//        dd($request->all());

        $allot = $request->input('allot');
        $products = $request->input($allot);

        $orderId = $request->input('orderId');

        $order_id = StockAllocation::all()->last();

        if ($orderId != null) {
            $stockId = $orderId;
        } else {

            $order_id = $order_id->order_id + 1;
            $stock = new StockAllocation([
                'store_id' => $request->input('storeId'),
                'warehouse_id' => $request->input('warehouseId'),
                'category_id' => $request->input('categoryId'),
                'order_id' => $order_id,
                'user_id' => Auth::id(),
            ]);

            $stock->save();
            $stockId = $stock->id;
        }

        $productVarient = ProductVariant::get();

//        foreach ($request->allocatedProducts as $oneProduct) {
//            $totalQuantity += $request->total_allocated[$oneProduct];

        $all = explode('_', $allot);
        $productId = $all[1];
        $colorId = $all[2];

        $total = StockAllocation::where('id', $stockId)->first()->total_qty;


        foreach ($products as $key => $qty) {

            if (!empty($productVarient->where('product_id', $productId)->where('color', $colorId)->where('size', $key)->toArray())) {

                $skus = $productVarient->where('product_id', $productId)->where('color', $colorId)->where('size', $key);
//                dd($skus);
                foreach ($skus as $sku) {
                    $stockProduct = new StockAllocationProduct([
                        'stock_allocation_id' => $stockId,
                        'product_id' => $productId,
                        'sku_id' => $sku->id,
                        'quantity' => $qty,
                    ]);
                    $stockProduct->save();
                }
                $total += $qty;
            }
        }

        $stock = StockAllocation::where('id', $stockId)->update([
            'total_qty' => $total,
        ]);

        DB::commit();

//        $totalAllotted = $request->input('totalAllotted');
//        $id = explode(' ', $request->input('buttonId'));
//        $productId = $id[0];
//        $colorId = $id[1];
//
//        $id = str_replace(' ', '_', $request->input('buttonId'));
//        $name = 'allot_' . $id;
//
//        $inputData = array_values($request->except('_token', 'buttonId', 'product'));
//
//        dd($totalAllotted);

//        return redirect()->back()->with('success', 'successful');
        return response()->json(['success' => 'true', 'id' => $stockId]);


    }

    /**
     * Display the specified resource.
     */
    public function show(StockAllocation $stockAllocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StockAllocation $stockAllocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStockAllocationRequest $request, StockAllocation $stockAllocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StockAllocation $stockAllocation)
    {
        //
    }

    public function getAllFilters(Request $request)
    {
        $seasons = Season::all();
        $categories = category::all();
        $products = Product::all();
        $tags = Tags::all();
        $stores = StoreGenerate::all();

        $data = [
            'seasons' => $seasons,
            'categories' => $categories,
            'products' => $products,
            'tags' => $tags,
        ];

//        foreach ($inventory as $inventoryItem) {
////            dd($inventoryItem->product->productVariant->groupBy('color'));
//            foreach ($inventoryItem->product->productVariant->groupBy('color') as $color=> $variant) {
//
//                $product = $inventoryItem->product->product_name;
//
//                dd($product);
//
//            }
//        }


//            ->map(function ($item) {
//                return [
//                    'id' => $item->id,
//                    'sku' => $item->productVariant->sku,
//                    'color' => $item->productVariant->color,
//                    'sku_quantity' => $item->sku_quantity,
//                ];
//            });

        return response()->json($data);
    }


    public function getStockAllocation(Request $request)
    {
        $warehouseId = $request->input('warehouseId');
        $category = $request->input('categoryId');
        $subCatId = $request->input('subCatId');
        $storeId = $request->input('storeId');
        $seasonId = $request->input('seasonId');

        $allSize = null;
        if ($storeId != null) {
            if ($category != null) {
                if ($baseStock = BaseStockCategory::where('store_id', $storeId)
                    ->where('cat_id', $category)
                    ->with('size')
                    ->first()) {
                    $allSize = $baseStock->size;
                }
            }
        }

//        dd($allSize);

        $inventory = WarehouseInventory::where('warehouse_id', $warehouseId)->with('product', 'productVariant')->get();

        $inventory = $inventory->where('product.cat_id', $category);

        if ($subCatId != null) {
            $inventory = $inventory->where('product.sub_cat_id', $subCatId);
        }
        if ($seasonId != null) {
            $inventory = $inventory->where('product.season_id', $seasonId);
        }

        $result = array();

        foreach ($inventory as $item) {
            $result[$item->product_id][$item->productVariant->color][$item->productVariant->size] = (int)$item->good_inventory;
        }

        $headers = [];

        foreach ($result as $productId => $color) {
            foreach ($color as $variant) {
                $headers = array_merge($headers, array_keys($variant));
            }
        }

        $headers = array_unique($headers);
        sort($headers);

        $rows = [];
        $inputField = '<div class="input-group">
                                <input type="text" name="quantity" class="form-control"
                                       aria-label="Item" />
                                <input type="hidden" name="allot"/>
                            </div>';

        foreach ($result as $productId => $color) {

            $name = Product::with('category', 'subCategory')->where('id', $productId)->first();

            foreach ($color as $key => $variant) {
                $color = Color::where('id', $key)->first();

                $warehouseStock = array_fill_keys($headers, 0);
                $alloted = array_fill_keys($headers, $inputField);

                foreach ($headers as $header) {
                    $warehouseStock[$header] = $variant[$header] ?? 0;
                    $alloted[$header] = '<div class="input-group">
                                <input type="number" name="allot_' . $name->id . '_' . $color->id . '[' . $header . ']" class="form-control"
                                       aria-label="Item" value= 0 onchange="totalAllocated(\'' . $name->id . '_' . $color->id . '\')" />
                            </div>';
                }


                $total = '<div class="input-group">
                                <input type="number" name="total_allocated[allot_' . $name->id . '_' . $color->id . ']" id="total_' . $name->id . '_' . $color->id . '" class="form-control"
                                       aria-label="Item" value= 0 readonly/>
                            </div>';

                $productDetail = '<div class="row productData" id="' . $name->id . ' ' . $color->id . '">

                <div class="col-md-12 fs-6">
                    <ul>
                        <li>' . $name->category->name . '</li>
                        <li>' . $name->subCategory->name . '</li>
                        <li>' . $name->product_name . '</li>
                        <li>Product code: ' . $name->product_code . '</li>
                        <li>Product Color: ' . $color->color . '</li>
                    </ul>
                </div>
                </div>';

                $checkbox = '<div class="justify-content-center d-flex"> <a class="btn btn-icon btn-label-success m-1 waves-effect rightCheck" id="' . $name->id . ' ' . $color->id . '"><i class="fa-solid fa-check"></i></a><a class="btn btn-icon btn-label-danger m-1 waves-effect" id="' . $name->id . '"><i class="fa-solid fa-xmark" style="color: red;"></i></a></div>';

                $rows[] = array_merge([$productDetail, 'W.S.'], array_values($warehouseStock), [array_sum(array_values($warehouseStock)), $checkbox]);
                $rows[] = array_merge([$productDetail, 'S.S.'], array_values($warehouseStock), [array_sum(array_values($warehouseStock)), $checkbox]);
                $rows[] = array_merge([$productDetail, 'A.S.'], array_values($alloted), [$total, $checkbox]);

            }
        }

        $headers = array_merge(['product', ''], $headers, ['Total', '']);

        $result = array();
        $result['data'] = $rows;

        return response()->json([
            'data' => $result['data'],
            'header' => $headers,
            'allSize' => $allSize,
        ]);

    }


    public function stockAllocationSubmit(Request $request)
    {
        $orderId = $request->order_id;

        $stockAllocation = StockAllocation::where('id', $orderId)->update([
            'final_submit' => now(),
        ]);

        return redirect()->back()->with('success', 'Stock Allocation Submitted Successfully');
    }
}
