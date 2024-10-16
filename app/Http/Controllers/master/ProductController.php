<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Fit;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Season;
use App\Models\Sleeve;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.master.product.index');
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
        $sleeves = Sleeve::all();
        $fits = Fit::all();
        $colors = Color::all();
        return view('content.master.product.create', compact('categories', 'tags', 'seasons', 'brands', 'fits', 'sleeves', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        if (Gate::allows('create', Product::class)) {

            DB::beginTransaction();

//dd($request->all());

//            try {

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
                    'size_cm' => $request->size_cm,
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

                            if (!empty($color['media'])) {

                                $name = $color['media']->getClientOriginalName();
                                $destination_path = public_path('productImage/' . $product->id . '/' . $color['color']);

                                if (!is_dir($destination_path)) {
                                    mkdir($destination_path, 0777, true);
                                }
                                $color['media']->move($destination_path, $name);
                            }

                            foreach ($request->optionValueSize[$key] as $size) {
//                                dd($size);
                                if (!empty($size['size'])) {
                                    $variant = new ProductVariant([
                                        'product_id' => $product->id,
                                        'color' => $color['color'],
                                        'size' => $size['size'],
                                        'sku' => $size['sku'],
                                        'barcode' => $size['barcode'],
                                        'image' => $name ?? null,
                                    ]);
                                    $variant->save();
                                }
                            }
                        }
                    }
                }

                DB::commit();
                return redirect()->back()->with('success', 'Product added successfully');
//            } catch (\Exception $e) {
//                DB::rollBack();
//                return redirect()->back()->with('error', $e->getMessage());
//            }

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

//        dd($product);

        $categories = Category::all();
        $tags = Tags::all();
        $seasons = Season::all();
        $brands = Brand::all();
        $product = $product->with('category', 'subCategory', 'brand', 'season', 'productVariant', 'fit', 'sleeve')->where('id', $product->id)->first();

//        dd($product->category);

        return view('content.master.product.edit', compact('product', 'categories', 'tags', 'seasons', 'brands'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        $product->update([
            'product_name' => $request->product_name,
            'product_code' => $request->product_code,
            'hsn_code' => $request->hsn_code,
            'material' => $request->material,
            'product_description' => $request->product_description,
            'cost_price' => $request->cost_price,
            'sell_price' => $request->sell_price,
            'product_mrp' => $request->product_mrp,
            'status' => $request->status,
            'cat_id' => $request->cat_id,
            'sub_cat_id' => $request->sub_cat_id,
            'season_id' => $request->season_id,
            'brand_id' => $request->brand_id,
            'fit_id' => $request->fit_id,
            'sleeve_id' => $request->sleeve_id
        ]);

        if (!empty($request->productColor)) {
            foreach ($request->productColor as $key => $color) {
                if (!empty($color['color'])) {
                    foreach ($request->optionValueSize[$key] as $size) {
                        if (!empty($size['size'])) {
                            $variant = ProductVariant::where('product_id', $product->id)
                                ->where('id', $size['size_id'])
                                ->update([
                                    'size' => $size['size'],
                                    'sku' => $size['sku'],
                                ]);
                        }
                    }
                }
            }
        }


        if (!empty($request->productColor)) {
            foreach ($request->productColor as $key => $color) {
                if (!empty($color['color'])) {
                    foreach ($request->newOptionValueSize[$key] as $size) {
                        if (!empty($size['size'])) {
                            $variant = new ProductVariant([
                                'product_id' => $product->id,
                                'color' => $color['color'],
                                'size' => $size['size'],
                                'sku' => $size['sku'],
                            ]);
                        }
                        $variant->save();
                    }
                }
            }
        }

//        dd(request()->all());

        if (!empty($request->newProductColor)) {
            foreach ($request->newProductColor as $key => $color) {
                if (!empty($color['color'])) {
                    foreach ($request->newOptionValueSize[$key] as $size) {
                        if (!empty($size['size'])) {
                            $variant = new ProductVariant([
                                'product_id' => $product->id,
                                'color' => $color['color'],
                                'size' => $size['size'],
                                'sku' => $size['sku'],
                            ]);
                        }
                        $variant->save();
                    }
                }
            }
        }


        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (Gate::allows('delete', $product)) {
            $product->delete();
            return redirect()->route('product.index')->with('success', 'Product deleted.');
        } else {
            return redirect()->route('product.index')->with('error', 'You can not delete this product.');
        }


    }

    public function getProduct()
    {
        $products = Product::with('category', 'subCategory')->get();

//        dd($products);
        $num = 1;
        $result = ['data' => []];
        $allTags = Tags::all();
        $htmlDetails = '';

        foreach ($products as $product) {
            if (!empty($product->tag_id)) {
                $tags = explode(',', $product->tag_id);

                // Loop through the tags
                foreach ($tags as $tag) {
                    $tagName = $allTags->where('id', $tag)->first()->name;
                    $htmlDetails .= '<button type="button" class="m-2 btn btn-sm btn-outline-primary round waves-effect">' . $tagName . '</button>';
                }
            }

//            dd($htmlDetails);

            $id = $product->id;
            $name = $product->product_name;
            $product_code = $product->product_code;
            $category = $product->category->name;
            $subCategory = $product->subCategory->name;
            if ($product->status == 0) {
                $status = '<button class="btn btn-sm btn-outline-success waves-effect">
                                            Active
                                        </button>';
            } else {
                $status = '<button class="btn btn-sm btn-outline-success waves-effect">
                                            Deactive
                                        </button>';
            }

            $action =
                ' <a href="product/' . $id . '/edit" title="Edit" class="btn btn-icon btn-label-primary mx-1"><i class="ti ti-edit mx-2 ti-sm"></i></a>
            <button onclick="deleteProduct(' .
                $product->id .
                ')" title="Delete" class="btn btn-icon btn-label-danger mx-1"><i class="ti ti-trash mx-2 ti-sm"></i></button>';
            array_push($result['data'], [$num, $name, $product_code, $category, $subCategory, $htmlDetails, $status, $action]);
            $num++;
            $htmlDetails = '';
        }
        echo json_encode($result);

    }

    public function deleteVariant(Request $request)
    {
        $color = $request->input('color');
        $productId = $request->input('productId');

        $product = ProductVariant::where('product_id', $productId)->where('color', $color)->delete();

        return redirect()->back()->with('success', 'Product variant deleted.');

    }

    public function deleteSize(Request $request)
    {
        $id = $request->input('sizeId');

        $product = ProductVariant::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Product variant deleted.');

    }
}
