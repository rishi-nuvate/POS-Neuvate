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
                if ($request->size[$catId]) {
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
        }

        DB::commit();

        return redirect()->route('baseStock.index');

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
        $stores = StoreGenerate::all();
        $baseStock = BaseStockCategory::where('store_id', $request->baseStock)->with('category')->get();
//        dd($baseStock);
        return view('content.master.store.baseStock.edit', compact('baseStock', 'stores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBaseStockCategoryRequest $request, BaseStockCategory $baseStockCategory)
    {
        $storeId = $request->store_id;

        DB::beginTransaction();
        foreach ($request->old_size as $key => $oldSize) {
            $baseStockSize = BaseStockSize::where('id', $key)->update([
                'size' => $oldSize,
                'ratio' => $request->old_size_ratio[$key],
                'qty' => $request->old_size_qty[$key],
            ]);
        }
        foreach ($request->category_id as $key1 => $catId) {
            $baseStock = BaseStockCategory::where('store_id', $storeId)->where('cat_id', $catId)->first();
            $baseStock->update([
                'cat_qty' => $request->category_qty[$key1],
            ]);
//            dd($request->all());
            if (!empty($request->size[$catId]) ) {
                foreach ($request->size[$catId] as $index => $size) {

                    $sizeQuantity = new BaseStockSize([
                        'base_stock_cat_id' => $baseStock->id,
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
     * Remove the specified resource from storage.
     */
    public function destroy(BaseStockCategory $baseStockCategory)
    {
//
    }

    public function getBaseStock()
    {

        $baseStock = BaseStockCategory::with('store', 'category', 'size')->select('store_id')
            ->distinct()
            ->get();

//        dd($baseStock);

        $result = array();
        $result['data'] = array();
        $num = 1;
        foreach ($baseStock as $store) {
            $storeName = $store->store->store_name;
            $action =
                ' <a href="baseStock/' . $store->store_id . '/edit" title="Edit" class="btn btn-icon btn-label-primary mx-1"><i class="ti ti-edit mx-2 ti-sm"></i></a>
            <button onclick="deleteBlog(' .
                $store->store_id .
                ')" title="Delete" class="btn btn-icon btn-label-danger mx-1"><i class="ti ti-trash mx-2 ti-sm"></i></button>';
            array_push($result['data'], [$num, $storeName, $action]);
            $num++;
        }
        return response()->json($result);
    }

    public function getBaseStockSize(Request $request)
    {
        $Id = $request->input('Id');
        $baseStockSize = BaseStockSize::where('base_stock_cat_id', $Id)->get();
        return response()->json($baseStockSize);
    }
}
