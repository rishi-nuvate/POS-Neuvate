<?php

namespace App\Http\Controllers\master\company;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyShipAddressRequest;
use App\Http\Requests\UpdateCompanyShipAddressRequest;
use App\Models\CompanyShipAddress;
use Illuminate\Http\Request;


class CompanyShipAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreCompanyShipAddressRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyShipAddress $companyShipAddress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyShipAddress $companyShipAddress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyShipAddressRequest $request, CompanyShipAddress $companyShipAddress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyShipAddress $companyShipAddress)
    {
        //
    }

    public function shipAddressByCompany( Request $request)
    {
        $companyId = $request->input('company_id');
        $shipAddress = CompanyShipAddress::where('company_id', $companyId)->get();
        return response()->json($shipAddress);
    }

    public function getShippingAddress(Request $request)
    {
        $shipId = $request->input('ship_id');
        $shipAddress = CompanyShipAddress::where('id', $shipId)->first();

        return response()->json($shipAddress);

    }

}
