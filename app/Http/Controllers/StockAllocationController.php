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
        return view('content.orderRequisition.salesOrder.index',compact('seasons','categories','products','tags','stores','warehouses'));

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

    public function getAllFilters()
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

        return response()->json($data);

    }


    public function getStockAllocation(Request $request)
    {
        dd($request->all());
    }
}
