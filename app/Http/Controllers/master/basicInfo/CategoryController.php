<?php

namespace App\Http\Controllers\master\basicInfo;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('subCategory')->get();
//        dd($category);
        return view('content.master.basicInfo.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.master.basicInfo.category.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {

//        dd($request->all());
        if (Gate::allows('create', Category::class)) {

            DB::beginTransaction();

            try {
                $cat = Category::create([
                    'name' => $request->CategoryName,
                ]);

                foreach ($request->SubCatName as $subCat) {
                    $cat->subCategory()->create([
                        'name' => $subCat,
                    ]);
                }

                DB::commit();
                return redirect()->back()->with('success', 'Category has been created');

            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('content.master.basicInfo.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        if (Gate::allows('update', $category)) {

            DB::beginTransaction();

            try {

                // Update the category name
                $category->update([
                    'name' => $request->CategoryName,
                ]);
                $subcategoryId = $request->SubCatId;
//                dd(count($subcategoryId));

                if (!empty($subcategoryId)) {
                    for ($i = 0; $i < count($subcategoryId); $i++) {
                        $subCategory = SubCategory::where('id', $subcategoryId[$i])
                            ->where('CatId', $category->id)
                            ->update([
                                'name' => $request->SubCatName[$i],
                            ]);
                    }
                }

                if (!empty($request->NewSubCatName)) {
                    foreach ($request->NewSubCatName as $subCat) {
                        $category->subCategory()->create([
                            'name' => $subCat,
                        ]);
                    }
                }
                DB::commit();

                return redirect()->route('category.index')->with('success', 'Category has been updated');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public
    function destroy(Category $category)
    {
        if (Gate::allows('delete', $category)) {
            $category->delete();
        }

        return redirect()->route('category.index')->with('success', 'Category has been deleted');
    }
}
