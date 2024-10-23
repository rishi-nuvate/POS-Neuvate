<?php

namespace App\Http\Controllers;

use App\Models\CentralWarehouse;
use App\Models\Product;
use App\Models\Shelf;
use App\Http\Requests\StoreShelfRequest;
use App\Http\Requests\UpdateShelfRequest;
use App\Models\ShelfRelation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShelfController extends Controller
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
    public function store(StoreShelfRequest $request)
    {
        DB::beginTransaction();

        $last = Shelf::get()->last()->column_name;

        if (empty($last)) {
            $last = 0;
        }
        $columnNum = $request->column_num; // Assuming this gives you an integer

        for ($i = 1; $i <= $columnNum; $i++) {
            $last++;
            $shelf = new shelf([
                'warehouse_id' => $request->warehouse_id,
                'row_num' => $request->row_num,
                'column_num' => $i,
                'column_name' => $last
            ]);
            $shelf->save();

        }
        DB::commit();

        return redirect()->back()->with('Success', 'added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shelf $shelf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shelf $shelf)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShelfRequest $request, Shelf $shelf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shelf $shelf)
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

        $shelves = shelf::with('warehouse')
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

        $products = Product::with('shelfProduct')->get();

        $shelves = shelf::with('shelfProduct.product')->where('warehouse_id', $warehouseId)->where('row_num', $row_num)->get();
//dd($shelves);
        return view('content.centralWarehouse.shelf.shelfProduct', compact('shelves', 'warehouse','products'));
    }

    public function shelfProductStore(Request $request)
    {
        foreach ($request->products_id as $key => $product) {
            foreach ($product as $productId) {
                $shelfProduct = new ShelfRelation([
                    'shelf_id' => $request->shelf_id[$key],
                    'product_id' => $productId,
                ]);

                $shelfProduct->save();
            }

        }

    }

    public function shelfInward()
    {
        $shelves = Shelf::all();
        $products = Product::all();
        return view('content.centralWarehouse.shelf.shelfInward', compact('shelves','products'));
    }

    public function getProduct(Request $request)
    {
//        dd(1);
        $id = $request->input('product_id');
//        dd($id);
        $product = Product::with('productVariant','category','subCategory')->where('id',$id)->first();
        return response()->json($product);
    }


}
