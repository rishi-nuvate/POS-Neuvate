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
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\master\basicInfo\BrandController;
use App\Http\Controllers\master\basicInfo\CategoryController;
use App\Http\Controllers\master\basicInfo\FitController;
use App\Http\Controllers\master\basicInfo\SeasonController;
use App\Http\Controllers\master\basicInfo\SleeveController;
use App\Http\Controllers\master\basicInfo\SlimController;
use App\Http\Controllers\master\basicInfo\SubCategoryController;
use App\Http\Controllers\master\basicInfo\TagsController;
use App\Http\Controllers\master\company\CompanyController;
use App\Http\Controllers\master\EmployeeController;
use App\Http\Controllers\master\InventoryMasterController;
use App\Http\Controllers\master\MasterController;
use App\Http\Controllers\master\ProductController;
use App\Http\Controllers\master\TagsMasterController;
use App\Http\Controllers\master\VenderController;
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
    Route::post('/seasonData', [SeasonController::class, 'getSeasonData'])->name('getSeasonData');

    // Tags Master
    Route::resource('tags', TagsController::class);
    Route::post('/tags/{tag}', [TagsController::class, 'destroy']);
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
    Route::post('/getSleeveData', [SleeveController::class,'getSleeveData'])->name('getSleeveData');
    Route::post('/sleeveDelete/{sleeve}', [SleeveController::class,'destroy']);


// Category Master
    Route::resource('category', CategoryController::class);
    Route::post('/category/{category}', [CategoryController::class, 'destroy']);
    Route::post('/getCategory', [CategoryController::class, 'getCategory'])->name('getCategory');

//    Sub-Category Master
    Route::post('/getSubCategories', [SubCategoryController::class, 'getSubCategories'])->name('getSubCategories');
    Route::post('/getSleeveFit', [SubCategoryController::class, 'getSleeveFit'])->name('getSleeveFit');


// Company
    Route::resource('company', CompanyController::class);
    Route::post('/company/{company}', [CompanyController::class, 'destroy']);

//    Vendor
    Route::resource('vendors', VenderController::class);
    Route::post('/vendor/store', [VenderController::class, 'store']);
    Route::post('/vendor/viewModelUserEdit', [VenderController::class, 'viewModelUserEdit'])->name('viewModelUserEdit');

    // SKU Master
    Route::resource('product', ProductController::class);
    Route::post('getProduct', [ProductController::class, 'getProduct'])->name('getProduct');
    Route::post('/product/{product}', [ProductController::class, 'destroy']);
    Route::post('deleteVariant', [ProductController::class, 'deleteVariant'])->name('deleteVariant');

//    Route::get('product/view', [ProductMasterController::class, 'index'])->name(('view-product'));

    // Employee
    Route::resource('employee', EmployeeController::class);
    Route::post('/employeeData', [EmployeeController::class, 'getEmployeeData'])->name('getEmployeeData');
    Route::post('/employee/{employee}', [EmployeeController::class, 'destroy']);

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
