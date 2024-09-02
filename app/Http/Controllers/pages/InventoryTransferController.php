<?php

namespace App\Http\Controllers\pages;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class InventoryTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.inventoryMaster.inventory.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('content.inventoryMaster.inventory.create-by-scan');
    }

    public function createByScan()
    {
        return view('content.inventoryMaster.inventoryTransfer.create-by-scan');
    }

    public function createByPo()
    {
        return view('content.inventoryMaster.inventoryTransfer.create-by-po');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
