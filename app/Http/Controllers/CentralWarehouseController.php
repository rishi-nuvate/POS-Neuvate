<?php

namespace App\Http\Controllers;

use App\Models\CentralWarehouse;
use App\Http\Requests\StoreCentralWarehouseRequest;
use App\Http\Requests\UpdateCentralWarehouseRequest;
use App\Models\Company;
use Illuminate\Support\Facades\Gate;

class CentralWarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warehouses = CentralWarehouse::with('company')->get();
        return view('content.master.company.centralWarehouseMaster.index', compact('warehouses'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::get();
        return view('content.master.company.centralWarehouseMaster.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCentralWarehouseRequest $request)
    {
//        dd($request->all());

        $warehouse = new CentralWarehouse([
            'company_id' => $request->company_id,
            'warehouse_name' => $request->warehouse_name,
            'contact_person_name' => $request->contact_person_name,
            'contact_person_email' => $request->contact_person_email,
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
            'city' => $request->city,
            'state' => $request->state,
            'pincode' => $request->pincode,
        ]);

        $warehouse->save();

        return redirect()->back()->with('success', 'Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(CentralWarehouse $centralWarehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CentralWarehouse $centralWarehouse)
    {

//        dd($centralWarehouse);
//        $warehouse = CentralWarehouse::with('company')->where('id', $id)->first();
//
//        dd($warehouse);
        $companies = Company::get();

        return view('content.master.company.centralWarehouseMaster.edit', compact('centralWarehouse','companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCentralWarehouseRequest $request, CentralWarehouse $centralWarehouse)
    {
//        dd($centralWarehouse);

        $centralWarehouse->update([
            'company_id' => $request->company_id,
            'warehouse_name' => $request->warehouse_name,
            'contact_person_name' => $request->contact_person_name,
            'contact_person_email' => $request->contact_person_email,
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
            'city' => $request->city,
            'state' => $request->state,
            'pincode' => $request->pincode,
        ]);

        return redirect()->route('centralWarehouse.index')->with('success', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CentralWarehouse $centralWarehouse)
    {
        if(Gate::allows('delete', $centralWarehouse)){
//            dd($centralWarehouse);

            $centralWarehouse->delete();

            return redirect()->back()->with('success', 'Successfully Deleted');
        }
    }
}
