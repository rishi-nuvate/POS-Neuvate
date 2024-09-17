<?php

namespace App\Http\Controllers;

use App\Models\CategoryMaster;
use App\Http\Requests\StoreCategoryMasterRequest;
use App\Http\Requests\UpdateCategoryMasterRequest;
use App\Models\Season;

class CategoryMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.master.category.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.master.category.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryMasterRequest $request)
    {
        CategoryMaster::create($request->validated());

        return redirect()->back()->with('success', 'Category has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryMaster $categoryMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryMaster $categoryMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryMasterRequest $request, CategoryMaster $categoryMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryMaster $categoryMaster)
    {
        //
    }
}
