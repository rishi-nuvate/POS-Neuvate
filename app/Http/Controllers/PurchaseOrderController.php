<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyShipAddress;
use App\Models\Product;
use App\Models\PurchaseOrder;
use App\Http\Requests\StorePurchaseOrderRequest;
use App\Http\Requests\UpdatePurchaseOrderRequest;
use App\Models\User;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Pos = PurchaseOrder::with('Company', 'ShipAddress', 'Vendor')->get();
        $vendors = User::where('role', 'vendor')->get();
        return view('content.supplyChain.po.list', compact('Pos', 'vendors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::with('ShipAdd')->get();

        $vendors = User::where('role', 'vendor')->get();

        $products = Product::get();

//        dd(1);

        return view('content.supplyChain.po.create', compact('companies', 'vendors', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePurchaseOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePurchaseOrderRequest $request, PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseOrder $purchaseOrder)
    {
        //
    }

    public function getShipAddressByCompany(Request $request)
    {
        $company = $request->input('company_id');
        $shipAdd = CompanyShipAddress::where('company_id', $company)->get();

        return response()->json($shipAdd);

//        $company = Company::with('ShipAdd');
//        $data = [];
//        $company->where('id', $request->company_id)->get();
//
//        $addressArray[] = $company->ShipAdd;
//        $data["address"] = $addressArray;
//
//        return response()->json($data);
    }

}
