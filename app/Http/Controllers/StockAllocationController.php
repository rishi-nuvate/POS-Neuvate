<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CentralWarehouse;
use App\Models\Color;
use App\Models\Product;
use App\Models\Season;
use App\Models\StockAllocation;
use App\Http\Requests\StoreStockAllocationRequest;
use App\Http\Requests\UpdateStockAllocationRequest;
use App\Models\StoreGenerate;
use App\Models\Tags;
use App\Models\WarehouseInventory;
use Illuminate\Http\Request;
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
        //
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
            'stores' => $stores,
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

        $inventory = WarehouseInventory::where('warehouse_id', $warehouseId)->with('product', 'productVariant')->get();

//        if ($category) {
        $inventory = $inventory->where('product.cat_id', $category);
//        }

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
                            </div>';

        foreach ($result as $productId => $color) {

            $name = Product::with('category', 'subCategory')->where('id', $productId)->first();

            foreach ($color as $key => $variant) {

                $warehouseStock = array_fill_keys($headers, 0);
                $alloted = array_fill_keys($headers, $inputField);

                foreach ($headers as $header) {
                    $warehouseStock[$header] = $variant[$header] ?? 0;
                }

                $color = Color::where('id', $key)->first()->color;
//                $productDetail = '<button type="button" class="m-2 btn btn-sm btn-outline-primary round waves-effect">' . $name->product_name . '</button><button type="button" class="m-2 btn btn-sm btn-outline-primary round waves-effect">' . $color . '</button>';
                $productDetail = '<div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-8 fs-6">
                    <ul>
                        <li>'.$name->category->name.'</li>
                        <li>'.$name->subCategory->name.'</li>
                        <li>'.$name->product_name.'</li>
                        <li>Product code: '.$name->product_code.'</li>
                        <li>Product Color: '.$color.'</li>
                    </ul>
                </div>
            </div>';
                $checkbox = '<div class="form-check justify-content-center d-flex"> <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"> </div>';

                $rows[] = array_merge([$productDetail, 'W.S.'], array_values($warehouseStock), [array_sum(array_values($warehouseStock)), $checkbox]);
                $rows[] = array_merge([$productDetail, 'S.S.'], array_values($warehouseStock), [array_sum(array_values($warehouseStock)), $checkbox]);
                $rows[] = array_merge([$productDetail, 'A.S.'], array_values($alloted), ['total', $checkbox]);

            }
        }

        $headers = array_merge(['product', ''], $headers, ['Total', '']);

        $result = array();
        $result['data'] = $rows;
//        return response()->json($result);

        return response()->json([
            'data' => $result['data'],
            'header' => $headers,
        ]);

    }
}
