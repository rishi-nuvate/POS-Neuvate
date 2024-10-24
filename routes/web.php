<?php


use App\Http\Controllers\Auth\LoginRegistrationController;
use App\Http\Controllers\authenticate\AuthLogin;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\BaseStockCategoryController;
use App\Http\Controllers\centralWarehouse\CentralWarehouseMasterController;
use App\Http\Controllers\centralWarehouse\GRNMasterController;
use App\Http\Controllers\centralWarehouse\OutwardMasterController;
use App\Http\Controllers\centralWarehouse\PackMasterController;
use App\Http\Controllers\centralWarehouse\PickMasterController;
use App\Http\Controllers\centralWarehouse\ShelfMasterController;
use App\Http\Controllers\centralWarehouse\StockInMasterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\master\basicInfo\BrandController;
use App\Http\Controllers\master\basicInfo\CategoryController;
use App\Http\Controllers\master\basicInfo\ColorController;
use App\Http\Controllers\master\basicInfo\FitController;
use App\Http\Controllers\master\basicInfo\SeasonController;
use App\Http\Controllers\master\basicInfo\SleeveController;
use App\Http\Controllers\master\basicInfo\SlimController;
use App\Http\Controllers\master\basicInfo\SubCategoryController;
use App\Http\Controllers\master\basicInfo\TagsController;
use App\Http\Controllers\master\company\CentralWarehouseController;
use App\Http\Controllers\master\company\CompanyController;
use App\Http\Controllers\master\company\CompanyShipAddressController;
use App\Http\Controllers\master\InventoryMasterController;
use App\Http\Controllers\master\MasterController;
use App\Http\Controllers\master\ProductController;
use App\Http\Controllers\master\store\StoreGenerateController;
use App\Http\Controllers\master\store\StoreTypeController;
use App\Http\Controllers\master\users\EmployeeController;
use App\Http\Controllers\master\users\VenderController;
use App\Http\Controllers\orderRequisition\OrderRequisitionMasterController;
use App\Http\Controllers\orderRequisition\SalesOrderController;
use App\Http\Controllers\pages\ExpenseController;
use App\Http\Controllers\pages\InventoryController;
use App\Http\Controllers\pages\InventoryTransferController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\ShelfController;
use App\Http\Controllers\StockAllocationController;
use App\Http\Controllers\storeInventory\StockInController;
use App\Http\Controllers\supplyChain\BarcodeController;
use App\Http\Controllers\supplyChain\DesignLibraryMasterController;
use App\Http\Controllers\supplyChain\SupplyChainMasterController;
use App\Http\Controllers\WarehouseInventoryController;
use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// Pages Controller


// Master Controller

//Supply Chain Controller


date_default_timezone_set('Asia/Kolkata');
Route::get('/refresh', function () {
    Artisan::call('key:generate');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    Artisan::call('optimize:clear');
    return 'Refresh Done';
});

Route::controller(LoginRegistrationController::class)->group(function () {
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/store', 'store')->name('store');
    Route::post('/logout', 'logout')->name('logout');
});

Route::get('/authenticate/login', [AuthLogin::class, 'login'])->name('login');
Route::get('/authenticate/register', [AuthLogin::class, 'register'])->name('authenticate-register');

Route::middleware('auth:web')->group(callback: function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard-blank');
    Route::get('/dashboard', [DashboardController::class, 'crm'])->name('dashboard-crm');

    // POS
    // Route::resource('/pos', PosController::class);
    Route::get('/pos', [PosController::class, 'index'])->name('pos-index');
    Route::get('/pos/hold', [PosController::class, 'hold'])->name('pos-hold');
    Route::get('pos/sales-list', [PosController::class, 'salesList'])->name('pos-sales-list');
    Route::get('pos/return-bill', [PosController::class, 'returnBill'])->name('pos-return-bill');
    // Route::get('/pos', [posController::class, 'index'])->name('scanner-index');

    // Master
    Route::resource('/master', MasterController::class);

//    // Season Master
//    Route::get('season/view', [SeasonMasterController::class, 'index'])->name('view-season');

    // Season Master
    Route::resource('season', SeasonController::class);
    Route::post('/season/{season}', [SeasonController::class, 'destroy']);
    Route::post('/seasonData', [SeasonController::class, 'getSeasonData'])->name('getSeasonData');

    // Tags Master
    Route::resource('tags', TagsController::class);
    Route::post('/tagsDelete/{tag}', [TagsController::class, 'destroy']);
    Route::post('/tagsData/', [TagsController::class, 'getTagData'])->name('getTagData');

// Brand Master
    Route::resource('brand', BrandController::class);
    Route::post('/brands/{brand}', [BrandController::class, 'destroy']);
    Route::post('/brandsData', [BrandController::class, 'getBrandData'])->name('getBrandData');

//    Fit Master
    Route::resource('fit', FitController::class);
    Route::post('/getFitData', [FitController::class, 'getFitData'])->name('getFitData');
    Route::post('/deleteFit/{fit}', [FitController::class, 'destroy']);

//    Slim Master
    Route::resource('slim', SlimController::class);
    Route::post('/getSlimData', [SlimController::class, 'getSlimData'])->name('getSlimData');
    Route::post('/slimDelete/{slim}', [SlimController::class, 'destroy']);

//    Sleeve
    Route::resource('sleeve', SleeveController::class);
    Route::post('/getSleeveData', [SleeveController::class, 'getSleeveData'])->name('getSleeveData');
    Route::post('/sleeveDelete/{sleeve}', [SleeveController::class, 'destroy']);

//    Color
    Route::resource('color', ColorController::class);
    Route::post('getColorData', [ColorController::class, 'getColorData'])->name('getColorData');
    Route::post('/deleteColor/{color}', [ColorController::class, 'destroy'])->name('deleteColor');

// Category Master
    Route::resource('category', CategoryController::class);
    Route::post('/category/{category}', [CategoryController::class, 'destroy']);
    Route::post('/getCategory', [CategoryController::class, 'getCategory'])->name('getCategory');

//    Sub-Category Master
    Route::post('/getSubCategories', [SubCategoryController::class, 'getSubCategories'])->name('getSubCategories');
    Route::post('/getSleeveFit', [SubCategoryController::class, 'getSleeveFit'])->name('getSleeveFit');


// Company
    Route::resource('/company', CompanyController::class);
    Route::post('/company/{company}', [CompanyController::class, 'destroy']);
    Route::post('/getCompanyAddress', [CompanyController::class, 'getCompanyAddress'])->name('getCompanyAddress');

//    Shipping Address
    Route::post('/shipAddressByCompany', [CompanyShipAddressController::class, 'shipAddressByCompany'])->name('shipAddressByCompany');
    Route::post('/getShippingAddress', [CompanyShipAddressController::class, 'getShippingAddress'])->name('getShippingAddress');

//    Master Central Warehouse

    Route::resource('centralWarehouse', CentralWarehouseController::class);
    Route::post('/deleteCentralWarehouse/{centralWarehouse}', [CentralWarehouseController::class, 'destroy']);

//  Vendor
    Route::resource('vendors', VenderController::class);
    Route::post('/vendor/store', [VenderController::class, 'store']);
    Route::post('/vendor/viewModelUserEdit', [VenderController::class, 'viewModelUserEdit'])->name('viewModelUserEdit');


    // SKU Master
    Route::resource('product', ProductController::class);
    Route::post('getProduct', [ProductController::class, 'getProduct'])->name('getProductList');
    Route::post('/deleteProduct/{product}', [ProductController::class, 'destroy']);
    Route::post('deleteVariant', [ProductController::class, 'deleteVariant'])->name('deleteVariant');
    Route::post('deleteSize', [ProductController::class, 'deleteSize'])->name('deleteSize');
    Route::get('productImport', [ProductController::class, 'productImport'])->name('productImport');
    Route::post('productImportStore', [ProductController::class, 'productImportStore'])->name('productImportStore');


    // Employee
    Route::resource('employee', EmployeeController::class);
    Route::post('/employeeData', [EmployeeController::class, 'getEmployeeData'])->name('getEmployeeData');
    Route::post('/employee/{employee}', [EmployeeController::class, 'destroy']);


    //Inventory Master
    Route::resource('/storeInventory', InventoryMasterController::class);

    //Supply Chain
    Route::resource('/supplyChain', SupplyChainMasterController::class);

//    Shelf Management
    Route::resource('shelf', ShelfController::class);
    Route::post('getShelfData', [ShelfController::class, 'getShelfData'])->name('getShelfData');
    Route::get('shelfInward', [ShelfController::class, 'shelfInward'])->name('shelfInward');
    Route::get('/shelfProduct/{row}/{warehouse}', [ShelfController::class, 'shelfProduct'])->name('shelfProduct');
    Route::post('shelf/shelfProduct/store', [ShelfController::class, 'shelfProductStore'])->name('shelfProductStore');
    Route::post('shelf/product', [ShelfController::class, 'getProduct'])->name('getProduct');
    Route::post('shelf/product/store', [ShelfController::class, 'productStore'])->name('productStore');


//    Design Library
    Route::get('/supplyChain/designLibrary/create', [DesignLibraryMasterController::class, 'create'])->name('create-design');

////    PO
//    Route::resource('po', PurchaseOrderController::class);
//    Route::post('/po/getSkuByProduct', [PurchaseOrderController::class, 'getSkuByProduct'])->name('getSkuByProduct');
//    Route::post('/po/getVendorAddress', [PurchaseOrderController::class, 'getVendorAddress'])->name('getVendorAddress');
//    Route::post('/po/poListAjax', [PurchaseOrderController::class, 'poListAjax'])->name('poListAjax');


    //    PO
    Route::resource('po', PurchaseOrderController::class);
    Route::post('/po/delete', [PurchaseOrderController::class, 'deletePurchaseOrder'])->name('deletePurchaseOrder');
    Route::post('/po/deletePoItem', [PurchaseOrderController::class, 'deletePurchaseOrderItemRow'])->name('deletePurchaseOrderItemRow');
    Route::post('/po/getSkuByProduct', [PurchaseOrderController::class, 'getSkuByProduct'])->name('getSkuByProduct');
    Route::post('/po/getProductVariant', [PurchaseOrderController::class, 'getProductVariant'])->name('getProductVariant');
    Route::post('/po/getVendorAddress', [PurchaseOrderController::class, 'getVendorAddress'])->name('getVendorAddress');
    Route::post('/po/getSelectedParameters', [PurchaseOrderController::class, 'getSelectedParameters'])->name('getSelectedParameters');
    Route::post('/po/poListAjax', [PurchaseOrderController::class, 'poListAjax'])->name('poListAjax');


//    Stock In
    Route::get('/storeInventory/stockIn/pending', [StockInController::class, 'pending'])->name('pending-stock-in');
    Route::get('/storeInventory/stockIn/create', [StockInController::class, 'create'])->name('create-stock-in');


//    Barcode

    Route::resource('barcode', BarcodeController::class);
    Route::post('productData', [BarcodeController::class, 'productData'])->name('productData');
    Route::post('productVariantBarcode', [BarcodeController::class, 'productVariantBarcode'])->name('productVariantBarcode');
    Route::post('getBarcode', [BarcodeController::class, 'getBarcode'])->name('getBarcode');
    Route::post('/deleteBarcode/{barcode}', [BarcodeController::class, 'destroy']);

//    Store Master

//    Store Type
    Route::resource('storeType', StoreTypeController::class);
    Route::post('/getStoreType', [StoreTypeController::class, 'getStoreType'])->name('getStoreType');

//    Store Generate
    Route::resource('storeGenerate', StoreGenerateController::class);
    Route::post('/storeGenerate/store', [StoreGenerateController::class, 'store'])->name('storeGenerate.store');
    Route::post('getAllStoreData', [StoreGenerateController::class, 'getAllStoreData'])->name('getAllStoreData');
    Route::get('/storeGenerate/baseStock/{baseStock}', [StoreGenerateController::class, 'baseStock'])->name('baseStock');

    Route::resource('baseStock', BaseStockCategoryController::class);
    Route::post('getBaseStock', [BaseStockCategoryController::class, 'getBaseStock'])->name('getBaseStock');
    Route::post('getBaseStockSize', [BaseStockCategoryController::class, 'getBaseStockSize'])->name('getBaseStockSize');


//    Warehouse Inventory

    Route::resource('WarehouseInventory', WarehouseInventoryController::class);
    Route::post('bulkInwardStore', [WarehouseInventoryController::class, 'bulkInwardStore'])->name('bulkInwardStore');
    Route::post('getInventory', [WarehouseInventoryController::class, 'getInventory'])->name('getInventory');
    Route::get('importInventory', [WarehouseInventoryController::class, 'importInventory'])->name('importInventory');
    Route::post('importInventoryStore', [WarehouseInventoryController::class, 'importInventoryStore'])->name('importInventoryStore');


    Route::get('/generateBarcode/{barcode_id}', [BarcodeController::class, 'generateBarcode']);

//    Stock Allocation
    Route::resource('stockAllocation', StockAllocationController::class);
    Route::post('stockAllocation/getAllFilters', [StockAllocationController::class, 'getAllFilters'])->name('getAllFilters');
    Route::post('getStockAllocation', [StockAllocationController::class, 'getStockAllocation'])->name('getStockAllocation');

    //Central Warehouse
    Route::resource('centralWarehouseMaster', CentralWarehouseMasterController::class);

//    GRN
    Route::get('/centralWarehouse/grn/create', [GRNMasterController::class, 'create'])->name('create-grn');

//Stock In
    Route::get('/centralWarehouse/stockIn/bulkInward', [StockInMasterController::class, 'bulkInward'])->name('bulkInward');
    Route::get('/centralWarehouse/stockIn/singleInward', [StockInMasterController::class, 'singleInward'])->name('singleInward');
    Route::post('/centralWarehouse/stockIn/getAllPOItem', [StockInMasterController::class, 'getAllPOItem'])->name('getAllPOItem');
    Route::post('/centralWarehouse/getProductSku', [StockInMasterController::class, 'getProductSku'])->name('getProductSku');
    // Route::post('/centralWarehouse/stockIn/bulkInward/store', [StockInMasterController::class, 'bulkInwardStore'])->name('bulkInwardStore');

    //Pick
    Route::get('/centralWarehouse/pick/pendingList', [PickMasterController::class, 'pendingList'])->name('pending-list-pick');
    Route::get('/centralWarehouse/pick/create', [PickMasterController::class, 'create'])->name('create-pick');
    Route::get('/centralWarehouse/picker/create', [PickMasterController::class, 'pickerCreat'])->name('create-picker');


    //Pack
    Route::get('/centralWarehouse/pack/create', [PackMasterController::class, 'create'])->name('create-pack');

    //    Outward (dispatch)
    Route::get('/centralWarehouse/outward/pending', [OutwardMasterController::class, 'pending'])->name('pending-outward');


    //    Order Requisition
    Route::resource('/orderRequisition', OrderRequisitionMasterController::class);

//Sales Order
    Route::get('/orderRequisition/salesOrder/create', [SalesOrderController::class, 'create'])->name('create-salesOrder');


    // Inventory Controller
    Route::resource('/inventory', InventoryController::class);


    // Inventory Trasnfer Controller
    Route::get('/inventory-transfer/add-by-scan', [InventoryTransferController::class, 'createByScan'])->name('add-inventory-by-scan');
    Route::get('/inventory-transfer/add-by-po', [InventoryTransferController::class, 'createByPo'])->name('add-inventory-by-po');
    Route::resource('/inventory', InventoryTransferController::class);

    // Customer
    Route::resource('/customer', CustomerController::class);

    // Expense
    Route::resource('/expense', ExpenseController::class);

    // Balance
    Route::resource('/balance', BalanceController::class);
});
