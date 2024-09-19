<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
