<?php

namespace App\Http\Controllers;

use App\Models\BaseStockCategory;
use App\Http\Requests\StoreBaseStockCategoryRequest;
use App\Http\Requests\UpdateBaseStockCategoryRequest;
use App\Models\BaseStockSize;
use App\Models\Category;
use App\Models\StoreGenerate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaseStockCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.master.store.baseStock.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $stores = StoreGenerate::all();
        return view('content.master.store.baseStock.create', compact('categories', 'stores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBaseStockCategoryRequest $request)
    {
//        dd($request->all());

        DB::beginTransaction();

        foreach ($request->category_id as $key => $catId) {
            if ($request->category_qty[$key] > 0) {
                $categoryStore = new BaseStockCategory([
                    'store_id' => $request->store_id,
                    'cat_id' => $catId,
                    'cat_qty' => $request->category_qty[$key],
                ]);

                $categoryStore->save();
                foreach ($request->size[$catId] as $index => $size) {

                    $sizeQuantity = new BaseStockSize([
                        'base_stock_cat_id' => $categoryStore->id,
                        'size' => $size,
                        'qty' => $request->size_qty[$catId][$index],
                        'ratio' => $request->size_ratio[$catId][$index],
                    ]);
                    $sizeQuantity->save();
                }

            }
        }

        DB::commit();
    }

    /**
     * Display the specified resource.
     */
    public function show(BaseStockCategory $baseStockCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BaseStockCategory $baseStockCategory, Request $request)
    {
        $baseStock = BaseStockCategory::where('id',$request->baseStock)->get();
        return view('content.master.store.baseStock.edit', compact('baseStock'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBaseStockCategoryRequest $request, BaseStockCategory $baseStockCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BaseStockCategory $baseStockCategory)
    {
//
    }

    public function getBaseStock()
    {
        $baseStock = BaseStockCategory::with('store', 'category', 'size')->get();
//        dd($baseStock);
        $result = array();
        $result['data'] = array();
        $num = 1;
        foreach ($baseStock as $store) {
            $storeName = $store->store->store_name;
            $action =
                ' <a href="baseStock/'.$store->id.'/edit" title="Edit" class="btn btn-icon btn-label-primary mx-1"><i class="ti ti-edit mx-2 ti-sm"></i></a>
            <button onclick="deleteBlog(' .
                $store->id .
                ')" title="Delete" class="btn btn-icon btn-label-danger mx-1"><i class="ti ti-trash mx-2 ti-sm"></i></button>';
            array_push($result['data'], [$num, $storeName, $action]);
            $num++;
        }
        return response()->json($result);
    }
}
