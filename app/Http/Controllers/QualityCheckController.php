<?php

namespace App\Http\Controllers;

use App\Models\Grn;
use App\Models\QualityCheck;
use App\Http\Requests\StoreQualityCheckRequest;
use App\Http\Requests\UpdateQualityCheckRequest;

class QualityCheckController extends Controller
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
        $allGrn = Grn::all();
        return view('content.centralWarehouse.qualityCheck.create', compact('allGrn'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQualityCheckRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(QualityCheck $qualityCheck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QualityCheck $qualityCheck)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQualityCheckRequest $request, QualityCheck $qualityCheck)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QualityCheck $qualityCheck)
    {
        //
    }
}
