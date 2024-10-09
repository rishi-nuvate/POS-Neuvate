<?php

namespace App\Http\Controllers;

use App\Models\StoreType;
use App\Http\Requests\StoreStoreTypeRequest;
use App\Http\Requests\UpdateStoreTypeRequest;

class StoreTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.master.store.storeType.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.master.store.storeType.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoreTypeRequest $request)
    {
        $storeType = new StoreType([
            'store_type' => request('store_type'),
        ]);

        $storeType->save();

        return redirect()->back()->with('success', 'successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(StoreType $storeType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StoreType $storeType)
    {
        return view('content.master.store.storeType.edit', compact('storeType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoreTypeRequest $request, StoreType $storeType)
    {
        $storeType->update([
            'store_type' => $request->store_type,
        ]);

        return redirect()->route('storeType.index')->with('success', 'successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StoreType $storeType)
    {
        //
    }

    public function getStoreType()
    {
        $storeType = StoreType::get();
        $result = array('data' => []);
        $num = 1;
        foreach ($storeType as $type) {
            $name = $type->store_type;

            $action =
                ' <a href="storeType/' . $type->id . '/edit" title="Edit" class="btn btn-icon btn-label-primary mx-1"><i class="ti ti-edit mx-2 ti-sm"></i></a>
            <button onclick="deleteBlog(' .
                $type->id .
                ')" title="Delete" class="btn btn-icon btn-label-danger mx-1"><i class="ti ti-trash mx-2 ti-sm"></i></button>';
            array_push($result['data'], [$num, $name, $action]);
            $num++;
        }

        return response()->json($result);
    }
}
