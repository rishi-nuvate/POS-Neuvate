<?php

namespace App\Http\Controllers;

use App\Models\CategoryMaster;
use App\Http\Requests\StoreCategoryMasterRequest;
use App\Http\Requests\UpdateCategoryMasterRequest;
use App\Models\Season;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\DB;

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
        return view('content.master.basicInfo.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryMasterRequest $request)
    {

        // Authorize the action using policies
//        $this->authorize('create', CategoryMaster::class);
//        if (Gate::allows('create', CategoryMaster::class)) {
//
//            DB::beginTransaction();
//
//            try {
//                $cat = CategoryMaster::create([
//                    'name' => $request->cat_name,
//                ]);
//
//                foreach ($request->sub_cats as $subCatData) {
//                    $cat->subCats()->create([
//                        'name' => $subCatData['name'],
//                    ]);
//                }
//
//                DB::commit();
//                return response()->json(['message' => 'Data stored successfully!'], 201);
//
//            } catch (\Exception $e) {
//                DB::rollBack();
//                return response()->json(['error' => 'Failed to store data'], 500);
//            }
//        }

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
