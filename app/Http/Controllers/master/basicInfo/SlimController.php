<?php

namespace App\Http\Controllers\master\basicInfo;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSlimRequest;
use App\Http\Requests\UpdateSlimRequest;
use App\Models\Category;
use App\Models\Slim;
use Illuminate\Support\Facades\Gate;

class SlimController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.master.basicInfo.slim.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('content.master.basicInfo.slim.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSlimRequest $request)
    {
        Slim::create($request->validated());

        return redirect()->route('slim.index')->with('success', 'Fit created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slim $slim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slim $slim)
    {
        $categories = Category::all();
        return view('content.master.basicInfo.slim.edit',compact('slim','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSlimRequest $request, Slim $slim)
    {
        $slim->update($request->validated());
        return redirect()->route('slim.index')->with('success', 'Fit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slim $slim)
    {
        Gate::allows('delete', $slim);
        $slim->delete();
        return redirect()->back()->with('success', 'Fit deleted successfully');
    }

    public function getSlimData()
    {
        $allSlim = Slim::with('category', 'subCategory')->get();

        $num = 1;
        $result = ['data' => []];
        foreach ($allSlim as $slim) {


            $id = $slim->id;
            $name = $slim->slim_name;
            $category = $slim->category->name;
            $subCategory = $slim->subCategory->name;

            $action =
                ' <a href="slim/' . $id . '/edit" title="Edit" class="btn btn-icon btn-label-primary mx-1"><i class="ti ti-edit mx-2 ti-sm"></i></a>
            <button onclick="deleteSlim(' .
                $slim->id .
                ')" title="Delete" class="btn btn-icon btn-label-danger mx-1"><i class="ti ti-trash mx-2 ti-sm"></i></button>';
            array_push($result['data'], [$num, $category, $subCategory, $name, $action]);
            $num++;
        }
        echo json_encode($result);
    }
}
