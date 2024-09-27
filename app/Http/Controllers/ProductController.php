<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductVariant;
use App\Models\Season;
use App\Models\Tags;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use phpDocumentor\Reflection\DocBlock\Tag;

class ProductController extends Controller
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
        $categories = Category::all();
        $tags = Tags::all();
        $seasons = Season::all();
        $brands = Brand::all();
        return view('content.master.product.create',compact('categories','tags','seasons','brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        if (Gate::allows('create', Product::class)) {

            DB::beginTransaction();

//dd($request->all());


            try {

                if (!empty($request->tag_id)) {
                    $tag = implode(',', $request->tag_id);
                } else {
                    $tag = '';
                }

                $product = new Product([
                    'product_name' => $request->product_name,
                    'product_code' => $request->product_code,
                    'hsn_code' => $request->hsn_code,
                    'material' => $request->material,
                    'product_description' => $request->product_description,
                    'cat_id' => $request->cat_id,
                    'sub_cat_id' => $request->sub_cat_id,
                    'tag_id' => $tag,
                    'season_id' => $request->season_id,
                    'brand_id' => $request->brand_id,
                    'cost_price' => $request->cost_price,
                    'sell_price' => $request->sell_price,
                    'product_mrp' => $request->product_mrp,
                    'status' => $request->status,
                ]);
                $product->save();

                if (!empty($request->productColor)) {
                    foreach ($request->productColor as $key => $color) {
                        if (!empty($color['color'])) {
                            foreach ($request->optionValueSize[$key] as $size) {
                                if (!empty($size['size'])) {
                                    $variant = new ProductVariant([
                                        'product_id' => $product->id,
                                        'color' => $color['color'],
                                        'size' => $size['size'],
                                        'sku' => $size['sku'],
                                    ]);
                                    $variant->save();
                                }
                            }
                        }
                    }
                }

                DB::commit();
                return redirect()->back()->with('success', 'Product added successfully');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('error', $e->getMessage());
            }

//            dd($request->all());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
