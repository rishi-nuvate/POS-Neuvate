<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CentralWarehouse;
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

        $test = $inventory->filter(fn($item) => $item->product->cat_id == $category);

        dd($test);

        $array = array('51' => array('red' => array('24' => '50')));
        $array['51']['red']['26'] = '50';
        $array['51']['red']['28'] = '0';

        dd($array);

        $result = [];

        foreach ($array as $key1 => $subArray) {
            foreach ($subArray as $key2 => $values) {
                $flattened = array_merge([$key1, $key2], array_values($values));
                $result[] = $flattened;
            }
        }

//        dd($result);

        dd($request->all());
    }
}
