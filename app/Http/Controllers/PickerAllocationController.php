<?php

namespace App\Http\Controllers;

use App\Models\PickerAllocation;
use App\Http\Requests\StorePickerAllocationRequest;
use App\Http\Requests\UpdatePickerAllocationRequest;

class PickerAllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        dd(1);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePickerAllocationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PickerAllocation $pickerAllocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PickerAllocation $pickerAllocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePickerAllocationRequest $request, PickerAllocation $pickerAllocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PickerAllocation $pickerAllocation)
    {
        //
    }
}
