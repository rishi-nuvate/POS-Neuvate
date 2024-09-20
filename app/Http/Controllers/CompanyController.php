<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.master.company.company.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.master.company.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
//        dd($request->all());

        if (Gate::allows('create', Company::class)) {
            DB::beginTransaction();
            try {
                $company = new Company();
                $company->fill($request->only(['CompanyName','BillingName','BillingMobileNo','BillingEmail','AddLine1','AddLine2','City','State','PinCode']));
                $company->save();
                DB::commit();
                dd($company);
                return redirect()->route('company.index')->with('success','successfully created');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}
