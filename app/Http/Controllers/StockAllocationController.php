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
//        dd($request->all());
        $category = $request->input('categoryId');

        $inventory = WarehouseInventory::where('warehouse_id', $warehouseId)->with('product', 'productVariant')->get();

        $result = array();
        foreach ($inventory as $item) {
            $result[$item->product_id][$item->productVariant->color][$item->productVariant->size] = (int) $item->good_inventory;
        }
//        dd($result);

        $headers = [];

        foreach ($result as $productId => $color) {
            foreach ($color as $variant) {
                $headers = array_merge($headers, array_keys($variant));
            }
        }
        $headers = array_unique($headers);
        sort($headers);

        $rows = [];

        foreach ($result as $productId => $color) {

            $name = Product::where('id', $productId)->first()->product_name;

            foreach ($color as $key=>$variant) {
                $row = array_fill_keys($headers, null);
                foreach ($headers as $header) {
                    $row[$header] = $variant[$header] ?? 0;
                }
                $color = Color::where('id', $key)->first()->color;
                $productDetail = '<button type="button" class="m-2 btn btn-sm btn-outline-primary round waves-effect">' . $name . '</button><button type="button" class="m-2 btn btn-sm btn-outline-primary round waves-effect">' . $color . '</button>';
                $checkbox = '<div class="form-check justify-content-center d-flex"> <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"> </div>';

//                $total = array_sum();
//                print_r(array_sum(array_values($row)));

                $rows[] = array_merge([$productDetail,'W.S.'], array_values($row),['total',$checkbox]);
            }
        }
//        dd($rows);
        $headers = array_merge(['product'], $headers);

        $result = array();
        $result['data'] = $rows;

//        $data = array();
//        dd($rows);

//        $result = [];
//        foreach ($array as $key1 => $subArray) {
//            foreach ($subArray as $key2 => $values) {
//                $flattened = array_merge([$key1, $key2], array_values($values));
//                $result[] = $flattened;
//            }
//        }

        return response()->json($result);
    }
}
