<?php

namespace App\Http\Controllers\master\basicInfo;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSleeveRequest;
use App\Http\Requests\UpdateSleeveRequest;
use App\Models\Category;
use App\Models\Sleeve;
use App\Models\Slim;
use Illuminate\Support\Facades\Gate;

class SleeveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.master.basicInfo.sleeve.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('content.master.basicInfo.sleeve.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSleeveRequest $request)
    {
        Sleeve::create($request->validated());

        return redirect()->route('sleeve.index')->with('success', 'Fit created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sleeve $sleeve)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sleeve $sleeve)
    {
        $categories = Category::all();
        return view('content.master.basicInfo.sleeve.edit',compact('sleeve','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSleeveRequest $request, Sleeve $sleeve)
    {
        $sleeve->update($request->validated());
        return redirect()->route('sleeve.index')->with('success', 'Sleeve updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sleeve $sleeve)
    {
        Gate::allows('delete', $sleeve);
        $sleeve->delete();
        return redirect()->back()->with('success', 'Sleeve deleted successfully');
    }

    public function getSleeveData()
    {
        $allSleeve = Sleeve::with('category', 'subCategory')->get();

        $num = 1;
        $result = ['data' => []];
        foreach ($allSleeve as $sleeve) {


            $id = $sleeve->id;
            $name = $sleeve->sleeve_name;
            $category = $sleeve->category->name;
            $subCategory = $sleeve->subCategory->name;

            $action =
                ' <a href="sleeve/' . $id . '/edit" title="Edit" class="btn btn-icon btn-label-primary mx-1"><i class="ti ti-edit mx-2 ti-sm"></i></a>
            <button onclick="deleteSleeve(' .
                $sleeve->id .
                ')" title="Delete" class="btn btn-icon btn-label-danger mx-1"><i class="ti ti-trash mx-2 ti-sm"></i></button>';
            array_push($result['data'], [$num, $category, $subCategory, $name, $action]);
            $num++;
        }
        echo json_encode($result);
    }
}
