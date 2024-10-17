<?php

namespace App\Http\Controllers;

use App\Models\ProductVariant;
use App\Models\WarehouseInventory;
use App\Http\Requests\StoreWarehouseInventoryRequest;
use App\Http\Requests\UpdateWarehouseInventoryRequest;
use App\Models\WarehouseStockIn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SplFileObject;

class WarehouseInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('content.centralWarehouse.inventoryManagement.inventoryList');
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
    public function store(StoreWarehouseInventoryRequest $request)
    {
//        dd($request->barcode_number);

        $sku = ProductVariant::where('sku', $request->barcode_number)->first();

        DB::beginTransaction();

        $stockIn = new WarehouseStockIn([
            'date' => date('Y-m-d'),
            'user_id' => Auth::id(),
            'sku_id' => $sku->id,
            'barcode_number' => $request->barcode_number,
            'scan_quantity' => 1,

        ]);

        $stockIn->save();

        $inventory = WarehouseInventory::where('sku_id', $sku->id)->first();
        if ($inventory->exists()) {
            $inventory->update([
                'good_inventory' => $inventory->good_inventory + 1,
                'total_inventory' => $inventory->total_inventory + 1,
            ]);
        } else {
            $newInventory = new WarehouseInventory([
                'sku_id' => $sku->id,
                'product_id' => $sku->product_id,
                'good_inventory' => 1,
                'total_inventory' => 1
            ]);

            $newInventory->save();
        }

        DB::commit();

        return redirect()->back()->with('success', 'Product variant added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(WarehouseInventory $warehouseInventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WarehouseInventory $warehouseInventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWarehouseInventoryRequest $request, WarehouseInventory $warehouseInventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WarehouseInventory $warehouseInventory)
    {
        //
    }

    public function bulkInwardStore(StoreWarehouseInventoryRequest $request)
    {
//        dd($request->all());

        foreach ($request->sku_id as $key => $id) {

            $sku = ProductVariant::where('sku', $id)->first();

            DB::beginTransaction();

            $stockIn = new WarehouseStockIn([
                'date' => date('Y-m-d'),
                'user_id' => Auth::id(),
                'sku_id' => $sku->id,
                'barcode_number' => $sku->sku,
                'scan_quantity' => $request->inward_quantity[$key]
            ]);

            $stockIn->save();

//            dd(request()->all());

            $inventory = WarehouseInventory::where('sku_id', $sku->id)->first();

            if ($inventory != null) {
                $inventory->update([
                    'good_inventory' => $inventory->good_inventory + $request->inward_quantity[$key],
                    'total_inventory' => $inventory->total_inventory + $request->inward_quantity[$key],
                ]);
            } else {
                $newInventory = new WarehouseInventory([
                    'sku_id' => $sku->id,
                    'product_id' => $sku->product_id,
                    'good_inventory' => $request->inward_quantity[$key],
                    'total_inventory' => $request->inward_quantity[$key]
                ]);

                $newInventory->save();
            }

            DB::commit();

        }

        return redirect()->back()->with('success', 'Product variant added successfully');

    }

    public function getInventory()
    {
        $inventory = WarehouseInventory::with('product', 'ProductVariant')->get();

//        dd($inventory);
        $result = array("data" => array());

        $num = 1;
        foreach ($inventory as $item) {

//            $warehouse = $inventory->warehouse->warehouse_name ?? null;
            $product = $item->product->product_name;
            $rate = '<div class="d-flex align-items-center">
                    <div class="badge rounded-pill bg-label-dark me-3 p-2">
                        <i class="ti ti-currency-rupee ti-sm"></i>
                    </div>
                    <div class="card-info">
                        <h5 class="mb-0">' . $item->product->cost_price . '</h5>
                        <small>Rate</small>
                    </div>
                </div>';
            $sku = '<div class="d-flex align-items-center">
                <div class="badge rounded-pill bg-label-primary me-3 p-2">
                    <i class="ti ti-shopping-cart ti-sm"></i>
                </div>
                <div class="card-info">
                    <h5 class="mb-0"> ' . $item->ProductVariant->sku . '</h5>
                    <small>Sku</small>
                </div>
            </div>';

            $total = '<div class="d-flex align-items-center">
                <div class="badge rounded-pill bg-label-primary me-3 p-2">
                    <i class="ti ti-shopping-cart ti-sm"></i>
                </div>
                <div class="card-info">
                    <h5 class="mb-0"> ' . $item->total_inventory . '</h5>
                    <small>Total</small>
                </div>
            </div>';

            $goodInventory = '<div class="d-flex align-items-center">
                <div class="badge rounded-pill bg-label-success me-3 p-2">
                    <i class="ti ti-shopping-cart ti-sm"></i>
                </div>
                <div class="card-info">
                    <h5 class="mb-0"> ' . $item->good_inventory . '</h5>
                    <small>Good</small>
                </div>
            </div>';
//            $goodInventory = $item->good_inventory;
            $badInventory = $item->bad_inventory ?? 0;
            $badInventory = '<div class="d-flex align-items-center">
                <div class="badge rounded-pill bg-label-danger me-3 p-2">
                    <i class="ti ti-shopping-cart ti-sm"></i>
                </div>
                <div class="card-info">
                    <h5 class="mb-0"> ' . $badInventory . '</h5>
                    <small>Bad</small>
                </div>
            </div>';
            $action = '<a class="btn btn-icon btn-label-primary mt-1 waves-effect mx-1" href="#"><i class="ti ti-eye ti-sm"></i></a>';

            array_push($result["data"], array($num, $product, $sku, $total, $rate, $goodInventory, $badInventory, $action));
            $num++;
        }

        echo json_encode($result);

    }

    public function importInventory()
    {
        return view('content.centralWarehouse.inventoryManagement.importInventory');
    }

    public function importInventoryStore(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'inventory' => 'required|file|mimes:csv,txt|max:2048',
        ]);

        $tempPath = $request->file('inventory')->getRealPath();

//        dd($tempPath);

        if (($csvFile = fopen($tempPath, 'r')) !== false) {

            $header = fgetcsv($csvFile);

            while (($row = fgetcsv($csvFile)) !== false) {
                print_r($row);
            }
        }
        $filePath = $request->file('inventory')->storeAs('csv', 'uploaded_file.csv');

        $file = new SplFileObject(storage_path('app/' . $filePath));
        $file->setFlags(SplFileObject::READ_CSV | SplFileObject::SKIP_EMPTY);
        $data = [];

        foreach ($file as $key => $row) {
            if (empty($row) || $key === 0 ) {
                continue;
            }
            $data[] = $row;
        }

        foreach ($data as $rows) {
            $stockIn = new WarehouseStockIn([
                'date' => date('Y-m-d'),
                'user_id' => Auth::id(),
                'sku_id' => $rows[2],
                'barcode_number' => $rows[3],
                'scan_quantity' =>$rows[7]
            ]);
            $stockIn->save();
        }

//        $Reader = new Xlsx();
//        $targetPath = public_path() . '/uploads/' . $_FILES['commission_file']['name'];
//        move_uploaded_file($_FILES['commission_file']['tmp_name'], $targetPath);
//        $spreadSheet = $Reader->load($targetPath);
//        $excelSheet = $spreadSheet->getActiveSheet();
//        $spreadSheetAry = $excelSheet->toArray();
//        $sheetCount = count($spreadSheetAry);
    }

//    public function bulkImportStore(Request $request)
//    {
//        $sku_masters = sku_masters::where('sku_masters.name', $sku_csv)->read();
//        if ($sku_masters) {
//            $inventory_master = new inventory_master();
//            $inventory_master->setSkuId($sku_masters->getId());
//            $resutlInventory = $inventory_master->read();
//            if ($resutlInventory) {
//                if($_POST['action_type'] == "replace"){
//                    $fetchInventoryTotal = 0;
//                    $fetchInventoryGood = 0;
//                    $fetchInventoryBad = 0;
//                }else{
//                    $fetchInventoryTotal = $inventory_master->getTotal();
//                    $fetchInventoryGood = $inventory_master->getGoodInventory();
//                    $fetchInventoryBad = $inventory_master->getBadInventory();
//                }
//
//                // $fetchInventoryWaiting = $inventory_master->getWaitingInventory();
//                if ($inventory_type == 'bad_inventory') {
//                    $inventoryTotal = $fetchInventoryTotal + $qty;
//                    $inventoryGood  = $fetchInventoryGood;
//                    $inventoryBad   = $fetchInventoryBad + $qty;
//                }else if ($inventory_type == 'good_inventory'){
//
//                    $inventoryTotal = $fetchInventoryTotal + $qty;
//                    $inventoryGood = $fetchInventoryGood + $qty;
//                    $inventoryBad = $fetchInventoryBad;
//
//                }
//            } else {
//                if ($inventory_type == 'bad_inventory') {
//                    $inventoryTotal = $qty;
//                    $inventoryGood = 0;
//                    $inventoryBad = $qty;
//                } else if ($inventory_type == 'good_inventory'){
//                    $inventoryTotal = $qty;
//                    $inventoryGood = $qty;
//                    $inventoryBad = 0;
//                }
//            }
//            $inventory_master->setProductId($sku_masters->getProductId());
//            $inventory_master->setSkuId($sku_masters->getId());
//            $inventory_master->setChannelId($sku_masters->product_masters->getChannelId());
//            $inventory_master->setTotal($inventoryTotal);
//            $inventory_master->setGoodInventory($inventoryGood);
//            //$inventory_master->setWaitingInventory($inventoryWaiting);
//            $inventory_master->setBadInventory($inventoryBad);
//            $inventory_master->setCreatedDate($todayDate);
//            $inventory_master->setUpdatedDate($todayDate);
//            $inventory_master->setLastInstockDate($todayDate);
//            $inventory_master->save();
//            if (!empty($inventory_master->getId())) {
//                $inventory_history = new inventory_history();
//                $inventory_history->setInventoryId($inventory_master->getId());
//                $inventory_history->setUserId($user_id);
//                if ($inventory_type == 'bad_inventory') {
//                    $inventory_history->setInventoryName(5);
//                    $inventory_history->setDescription("bad_inventory_inventory_upload_by_csv");
//                } else if ($inventory_type == 'good_inventory') {
//                    $inventory_history->setInventoryName(4);
//                    $inventory_history->setDescription("good_inventory_inventory_upload_by_csv");
//                }
//                $inventory_history->setType(1);
//                $inventory_history->setInventoryTotal($inventory_master->getTotal());
//                $inventory_history->setInventoryGood($inventory_master->getGoodInventory());
//                $inventory_history->setInventoryAllotted($inventory_master->getAllottedInventory());
//                $inventory_history->setInventoryWaiting($inventory_master->getWaitingInventory());
//                $inventory_history->setQty($qty);
//                $inventory_history->setCreatedDate($todayDate);
//                $inventory_history->save();
//            }
//        } else {
//            $xyz = 1;
//            $filename = 'mis-match-sku-' . date('d-m-Y') . '.csv';
//            $fp = fopen('php://output', 'w');
//            if ($i === 1) {
//                $db = MysqliDb::getInstance();
//                $header = array('SKU', 'Item Name', 'Total', 'Inventory Type');
//                header('Content-type: application/csv');
//                header('Content-Disposition: attachment; filename=' . $filename);
//                fputcsv($fp, $header);
//            }
//            fputcsv($fp, $line);
//            $i++;
//        }
//
//    }
}
