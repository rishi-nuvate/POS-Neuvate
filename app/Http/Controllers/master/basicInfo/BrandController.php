<?php

namespace App\Http\Controllers\master\basicInfo;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();

        return view('content.master.basicInfo.brand.index',compact('brands'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.master.basicInfo.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        Brand::create($request->validated());

        return Redirect()->route('brand.index')->with('success', 'Brand created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        $brands = Brand::where('id',$brand->id)->first();

        return view('content.master.basicInfo.brand.edit',compact('brands'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
