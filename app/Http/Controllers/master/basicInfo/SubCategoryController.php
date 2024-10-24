<?php

namespace App\Http\Controllers\master\basicInfo;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Models\Fit;
use App\Models\Sleeve;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreSubCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubCategoryRequest $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }

    public function getSubCategories(Request $request)
    {
        $categoryId = $request->input('categoryId');
        $subCategories = SubCategory::where('cat_id', $categoryId)->get();

        return response()->json($subCategories);
    }

    public function getSleeveFit(Request $request)
    {
        $categoryId = $request->input('categoryId');
        $subCategoryId = $request->input('subCategoryId');

        $fit = Fit::where('cat_id', $categoryId)->where('sub_cat_id', $subCategoryId)->get();
        $sleeve = Sleeve::where('cat_id', $categoryId)->where('sub_cat_id', $subCategoryId)->get();
        return response()->json([
            'fit' => $fit,
            'sleeve' => $sleeve,
        ]);
    }
}
