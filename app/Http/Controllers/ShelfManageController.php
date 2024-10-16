<?php

namespace App\Http\Controllers;

use App\Models\CentralWarehouse;
use App\Models\ShelfManage;
use App\Http\Requests\StoreShelfManageRequest;
use App\Http\Requests\UpdateShelfManageRequest;
use Illuminate\Support\Facades\DB;

class ShelfManageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.centralWarehouse.shelf.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $warehouses = CentralWarehouse::get();
        return view('content.centralWarehouse.shelf.create', compact('warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShelfManageRequest $request)
    {
        DB::beginTransaction();
        $columnNum = $request->column_num; // Assuming this gives you an integer

        for ($i = 1; $i <= $columnNum; $i++) {
            $shelf = new ShelfManage([
                'warehouse_id' => $request->warehouse_id,
                'row_num' => $request->row_num,
                'column_num' => $i,
            ]);
            $shelf->save();
        }
        DB::commit();

        return redirect()->back()->with('Success','added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ShelfManage $shelfManage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShelfManage $shelfManage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShelfManageRequest $request, ShelfManage $shelfManage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShelfManage $shelfManage)
    {
        //
    }
}
