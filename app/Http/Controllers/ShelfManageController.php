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

        return redirect()->back()->with('Success', 'added successfully');
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

    public function getShelfData()
    {
//        $shelves = ShelfManage::with('warehouse')->get();

//        $shelves = DB::table('shelf_manages as shelf')
//            ->join('central_warehouses as warehouse', 'shelf.warehouse_id', '=', 'warehouse.id')
//            ->select(
//                'warehouse.warehouse_name as warehouseName',
//                'shelf.row_num',
////                DB::raw('COUNT(shelf_manages.column_num) as total_columns'),
////                DB::raw('MIN(shelf_manages.column_name) as start_class'),
//            )
//            ->groupBy('warehouse.warehouse_name', 'shelf.row_num')
//            ->get();

//        dd($shelves);

        $shelves = ShelfManage::with('warehouse')
            ->get()
            ->groupBy('warehouse.warehouse_name')
            ->map(function ($groupedByWarehouse) {
                return $groupedByWarehouse->groupBy('row_num')->map(function ($groupedByRow) {
                    return [
                        'count' => $groupedByRow->count(),
                        'first_column_name' => $groupedByRow[0]->column_name
                    ];
                });
            });

//        dd($shelves);

        $result = ['data' => []];
        $num = 1;
//dd($shelves);
        foreach ($shelves as $warehouseName => $rows) {
            $warehouse = '<button type="button" class="m-2 btn btn-sm btn-outline-primary round waves-effect">' . $warehouseName . '</button>';
//            dd($rows);
            foreach ($rows as $row => $column) {
//                dd($column);
                $action =
                    ' <a href="" title="Edit" class="btn btn-icon btn-label-primary mx-1"><i class="ti ti-edit mx-2 ti-sm"></i></a>
                      <a href="/shelfProduct/' . $warehouseName . '/' . $row . '" title="Update" class="btn btn-icon btn-label-warning mx-1"><i class="fa-regular fa-file-lines mx-2"></i></a>';

                array_push($result['data'], [$num, $warehouse, $row, $column['count'], $column['first_column_name'], $action]);
                $num++;
            }

        }

        return response()->json($result);
    }

    public function shelfProduct($warehouse, $row_num)
    {
        $warehouseId = CentralWarehouse::where('warehouse_name', $warehouse)->first()->id;

        $shelves = ShelfManage::with('warehouse')->where('warehouse_id', $warehouseId)->where('row_num', $row_num)->get();

        return view('content.centralWarehouse.shelf.shelfProduct', compact('shelves', 'warehouse'));
    }
}
