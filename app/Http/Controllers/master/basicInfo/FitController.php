<?php

namespace App\Http\Controllers\master\basicInfo;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFitRequest;
use App\Http\Requests\UpdateFitRequest;
use App\Models\Category;
use App\Models\Fit;
use Illuminate\Support\Facades\Gate;

class FitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.master.basicInfo.fit.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::with('subCategory')->get();
        return view('content.master.basicInfo.fit.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFitRequest $request)
    {

        Fit::create($request->validated());

        return redirect()->back()->with('success', 'Fit created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Fit $fit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fit $fit)
    {
        $categories = Category::with('subCategory')->get();
        $fits = Fit::with('category','subCategory')->where('id',$fit->id)->first();
        return view('content.master.basicInfo.fit.edit', compact('fits','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFitRequest $request, Fit $fit)
    {
        $fit->update([
            'fit_name'=> $request->fit_name,
            'cat_id'=> $request->cat_id,
            'sub_cat_id'=> $request->sub_cat_id,
        ]);

        return redirect()->route('fit.index')->with('success', 'Fit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fit $fit)
    {
        Gate::allows('delete', $fit);
        $fit->delete();
        return redirect()->back()->with('success', 'Fit deleted successfully');
    }

    public function getFitData()
    {
        $fits = Fit::with('category', 'subCategory')->get();

        $num = 1;
        $result = ['data' => []];
        foreach ($fits as $fit) {


            $id = $fit->id;
            $name = $fit->fit_name;
            $category = $fit->category->Name;
            $subCategory = $fit->subCategory->Name;

            $action =
                ' <a href="fit/' . $id . '/edit" title="Edit" class="btn btn-icon btn-label-primary mx-1"><i class="ti ti-edit mx-2 ti-sm"></i></a>
            <button onclick="deleteFit(' .
                $fit->id .
                ')" title="Delete" class="btn btn-icon btn-label-danger mx-1"><i class="ti ti-trash mx-2 ti-sm"></i></button>';
            array_push($result['data'], [$num, $category, $subCategory, $name, $action]);
            $num++;
        }
        echo json_encode($result);

    }
}
