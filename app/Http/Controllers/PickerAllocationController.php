<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\PickerAllocation;
use App\Http\Requests\StorePickerAllocationRequest;
use App\Http\Requests\UpdatePickerAllocationRequest;
use App\Models\PickerAllocationProduct;
use App\Models\Product;
use App\Models\StockAllocation;
use App\Models\StockAllocationProduct;
use App\Models\StoreGenerate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PickerAllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pickers = Employee::all();
        $Stores = StoreGenerate::all();
        $orders = StockAllocation::all();
        return view('content.centralWarehouse.pick.pickerList', compact('pickers', 'Stores','orders'));
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
        DB::beginTransaction();

//        dd($request->all());

        $pickerAllocation = new PickerAllocation([
            'order_id' => $request->order_id,
            'store_id' => $request->store_id,
            'emp_id' => $request->picker_id,
        ]);

        $pickerAllocation->save();

        $id = $pickerAllocation->id;
        foreach ($request->product as $productId => $status) {
            if ($status == 'on') {
                $pickerProduct = new PickerAllocationProduct([
                    'picker_allocation_id' => $id,
                    'order_id' => $request->order_id,
                    'product_id' => $productId,
                    'quantity' => $request->quantity[$productId],
                ]);

                $pickerProduct->save();

            }
        }

        DB::commit();

        return redirect()->route('picker.index');
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

    public function orderProducts(Request $request)
    {
        $result['data'] = array();
        $orderId = $request->input('orderId');
        $catId = $request->input('catId');

        $pickerProduct = PickerAllocationProduct::where('order_id', $orderId)->get();

        if ($catId == null) {
            $product = Product::with('category', 'subCategory')->get();
        } else {
            $product = Product::with('category', 'subCategory')->where('cat_id', $catId)->get();
        }
        $products = StockAllocationProduct::where('stock_allocation_id', $orderId)->get()->groupBy('product_id')
            ->map(function ($group) {
                return $group->sum('quantity');
            });

        $num = 1;
        foreach ($products as $productId => $quantity) {
            if ($product->where('id', $productId)->first()) {
                if (empty($pickerProduct->where('product_id', $productId)->toArray())) {
                    $productName = $product->where('id', $productId)->first()->product_name;
                    $category = $product->where('id', $productId)->first()->category->name . '<br>' . $product->where('id', $productId)->first()->subCategory->name;
                    $checkBox = '<div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="product[' . $productId . ']" checked>
                                </div>';
                    array_push($result['data'], [$num, $productName, $category, $quantity . '<input type="hidden" name="quantity[' . $productId . ']" value="' . $quantity . '"> ', $checkBox]);
                    $num++;
                }
            }
        }
        return response()->json($result);
    }

    public function getPicker(Request $request)
    {

        $storeId = $request->input('storeId');
        $pickerId = $request->input('pickerId');
        $orderId = $request->input('orderId');
        $pickerAllocations = PickerAllocation::with('pickerProduct', 'stockAllocation', 'store', 'employee');

        if ($storeId != null && $storeId != 'all') {
            $pickerAllocations->where('store_id', $storeId);
        }
        if ($pickerId != null && $pickerId != 'all') {
            $pickerAllocations->where('emp_id', $pickerId);
        }
        if ($orderId != null && $orderId != 'all') {
            $pickerAllocations->where('order_id', $orderId);
        }

        $pickerAllocations = $pickerAllocations->get();

        $result['data'] = array();

        $num = 1;

        foreach ($pickerAllocations as $pickerAllocation) {
            $storeName = $pickerAllocation->store->store_name;
            $orderNum = $pickerAllocation->stockAllocation->order_id;
            $picker = $pickerAllocation->employee->emp_name;
            $quantity = $pickerAllocation->pickerProduct->groupBy('picker_allocation_id')->map(function ($group) {
                return $group->sum('quantity');
            })->toArray();

            $action = '<a href="" type="button" id="' . $pickerAllocation->id . '" class="btn btn-outline-success waves-effect">
                                    <span class="ti-xs ti ti-note me-1"></span>Create
                                </a>';
            array_push($result['data'], [$num, $orderNum, $picker, $storeName, array_values($quantity)[0], $action]);
            $num++;
        }
        return response()->json($result);
    }

}
