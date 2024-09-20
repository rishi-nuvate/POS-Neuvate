<?php


use App\Http\Controllers\Auth\LoginRegistrationController;
use App\Http\Controllers\authenticate\AuthLogin;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\CategoryMasterController;
use App\Http\Controllers\centralWarehouse\CentralWarehouseMasterController;
use App\Http\Controllers\centralWarehouse\GRNMasterController;
use App\Http\Controllers\centralWarehouse\OutwardMasterController;
use App\Http\Controllers\centralWarehouse\PackMasterController;
use App\Http\Controllers\centralWarehouse\PickMasterController;
use App\Http\Controllers\centralWarehouse\ShelfMasterController;
use App\Http\Controllers\centralWarehouse\StockInMasterController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\master\basicInfo\BrandController;
use App\Http\Controllers\master\basicInfo\CategoryController;
use App\Http\Controllers\master\basicInfo\SeasonController;
use App\Http\Controllers\master\basicInfo\TagsController;
use App\Http\Controllers\master\EmployeeMasterController;
use App\Http\Controllers\master\InventoryMasterController;
use App\Http\Controllers\master\MasterController;
use App\Http\Controllers\master\ProductMasterController;
use App\Http\Controllers\master\TagsMasterController;
use App\Http\Controllers\orderRequisition\OrderRequisitionMasterController;
use App\Http\Controllers\orderRequisition\SalesOrderController;
use App\Http\Controllers\pages\ExpenseController;
use App\Http\Controllers\pages\InventoryController;
use App\Http\Controllers\pages\InventoryTransferController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\storeInventory\StockInController;
use App\Http\Controllers\supplyChain\BarcodeMasterController;
use App\Http\Controllers\supplyChain\DesignLibraryMasterController;
use App\Http\Controllers\supplyChain\POMasterController;
use App\Http\Controllers\supplyChain\SupplyChainMasterController;
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

    // Tags Master
    Route::resource('tags', TagsController::class);
    Route::post('/tags/{tag}', [TagsController::class, 'destroy']);

// Brand Master
    Route::resource('brand', BrandController::class);
    Route::post('/brands/{brand}', [BrandController::class, 'destroy']);

// Brand Master
    Route::resource('category', CategoryController::class);
    Route::post('/category/{category}', [CategoryController::class, 'destroy']);

// Company
    Route::resource('company', CompanyController::class);

    // SKU Master
    Route::get('product/add', [ProductMasterController::class, 'create'])->name('add-product');
    Route::get('product/view', [ProductMasterController::class, 'index'])->name(('view-product'));

    // Employee Master
    Route::get('employee/add', [EmployeeMasterController::class, 'create'])->name('add-employee');
    Route::get('employee/view', [EmployeeMasterController::class, 'index'])->name('view-employee');

    // Category Master
    Route::get('category/add', [CategoryMasterController::class, 'create'])->name('add-category');
    Route::get('category/view', [CategoryMasterController::class, 'index'])->name('view-category');


    //Inventory Master
    Route::resource('/storeInventory', InventoryMasterController::class);

//    Stock In
    Route::get('/storeInventory/stockIn/pending', [StockInController::class, 'pending'])->name('pending-stock-in');
    Route::get('/storeInventory/stockIn/create', [StockInController::class, 'create'])->name('create-stock-in');


    //Supply Chain
    Route::resource('/supplyChain', SupplyChainMasterController::class);

//    Design Library
    Route::get('/supplyChain/designLibrary/create', [DesignLibraryMasterController::class, 'create'])->name('create-design');

//    PO
    Route::get('/supplyChain/po/create', [POMasterController::class, 'create'])->name('create-po');

//    Barcode
    Route::get('/supplyChain/barcode/create', [BarcodeMasterController::class, 'create'])->name('create-barcode');


    //Central Warehouse
    Route::resource('/centralWarehouse', CentralWarehouseMasterController::class);

//    GRN
    Route::get('/centralWarehouse/grn/create', [GRNMasterController::class, 'create'])->name('create-grn');

//Stock In
    Route::get('/centralWarehouse/stockIn/bulkInward', [StockInMasterController::class, 'bulkInward'])->name('bulkInward');
    Route::get('/centralWarehouse/stockIn/singleInward', [StockInMasterController::class, 'singleInward'])->name('singleInward');

//Shelf
    Route::get('/centralWarehouse/shelf/create', [ShelfMasterController::class, 'create'])->name('create-shelf');


//Pick
    Route::get('/centralWarehouse/pick/pendingList', [PickMasterController::class, 'pendingList'])->name('pending-list-pick');
    Route::get('/centralWarehouse/pick/create', [PickMasterController::class, 'create'])->name('create-pick');


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
