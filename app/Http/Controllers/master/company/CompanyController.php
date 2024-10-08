<?php

namespace App\Http\Controllers\master\company;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use App\Models\CompanyShipAddress;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();

        return view('content.master.company.company.index', compact('companies'));

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
            $company->fill($request->only(['CompanyName', 'BillingName', 'BillingMobileNo', 'BillingEmail', 'AddLine1', 'AddLine2', 'City', 'State', 'PinCode', 'PanGstNo','customer_care_num','customer_care_email']));
            $company->save();
            if ($request->PanGstFile) {

                $name = $request->PanGstFile->getClientOriginalName();
                $destination_path = public_path('/AllCompany/pan_gst/' . $company->id);

                if (!is_dir(public_path('/AllCompany/pan_gst'))) {
                    mkdir(public_path('/AllCompany/pan_gst'), 0755, true);
                }
                $request->PanGstFile->move($destination_path, $name);

                $company->update([
                    'PanGstFile' => $name,
                ]);
            }


//            $id = $company->id;
//            if (!empty($request->ShipCompName)) {
//                foreach ($request->ShipCompName as $key => $company) {
////                        dd($company);
//                    $shipping = new CompanyShipAddress([
//                        'company_id' => $id,
//                        'ShipCompName' => $request->ShipCompName[$key],
//                        'ShipPersonNo' => $request->ShipPersonNo[$key],
//                        'ShipPersonEmail' => $request->ShipPersonEmail[$key],
//                        'ShipGstNo' => $request->ShipGstNo[$key],
//                        'ShipAddLine1' => $request->ShipAddLine1[$key],
//                        'ShipAddLine2' => $request->ShipAddLine2[$key],
//                        'ShipCity' => $request->ShipCity[$key],
//                        'ShipState' => $request->ShipState[$key],
//                        'ShipPinCode' => $request->ShipPinCode[$key],
//                    ]);
//                    $shipping->save();
//                }
//            }


            DB::commit();
//                dd($company);
            return redirect()->route('company.index')->with('success', 'successfully created');

            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->withErrors($e->getMessage());
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
        $company = $company::with('ShipAdd')->where('id', $company->id)->first();
//dd($company);
        return view('content.master.company.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        if (Gate::allows('update', $company)) {
            DB::beginTransaction();

            try {
                $id = $company->id;
                $company = Company::find($id); // Assuming you have the company ID
                $company->fill($request->only(['CompanyName', 'BillingName', 'BillingMobileNo', 'BillingEmail', 'AddLine1', 'AddLine2', 'City', 'State', 'PinCode','customer_care_num','customer_care_email']));
                $company->save();

//                if (!empty($request->shipId)) {
//                    foreach ($request->shipId as $key => $value) {
//                        $shipping = CompanyShipAddress::where('id', $value)->first();
//                        $shipping->update([
//                            'ShipCompName' => $request->ShipCompName[$key],
//                            'ShipPersonNo' => $request->ShipPersonNo[$key],
//                            'ShipPersonEmail' => $request->ShipPersonEmail[$key],
//                            'ShipGstNo' => $request->ShipGstNo[$key],
//                            'ShipAddLine1' => $request->ShipAddLine1[$key],
//                            'ShipAddLine2' => $request->ShipAddLine2[$key],
//                            'ShipCity' => $request->ShipCity[$key],
//                            'ShipState' => $request->ShipState[$key],
//                            'ShipPinCode' => $request->ShipPinCode[$key],
//                        ]);
//                    }
//                }

//                if (!empty($request->NewShipCompName)) {
//                    foreach ($request->NewShipCompName as $key => $company) {
////                        dd($company);
//                        $shipping = new CompanyShipAddress([
//                            'company_id' => $id,
//                            'ShipCompName' => $request->NewShipCompName[$key],
//                            'ShipPersonNo' => $request->NewShipPersonNo[$key],
//                            'ShipPersonEmail' => $request->NewShipPersonEmail[$key],
//                            'ShipGstNo' => $request->NewShipGstNo[$key],
//                            'ShipAddLine1' => $request->NewShipAddLine1[$key],
//                            'ShipAddLine2' => $request->NewShipAddLine2[$key],
//                            'ShipCity' => $request->NewShipCity[$key],
//                            'ShipState' => $request->NewShipState[$key],
//                            'ShipPinCode' => $request->NewShipPinCode[$key],
//                        ]);
//                        $shipping->save();
//                    }
//                }

                DB::commit();

                $companies = Company::all();
                return view('content.master.company.company.index', compact('companies'));
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('error', $e->getMessage());
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        if (Gate::allows('delete', $company)) {
            $company->delete();
            return response()->json([
                'success' => true,
                'message' => 'Company deleted successfully!'
            ]);
        }
    }

    public function getCompanyAddress(Request $request)
    {
        $company_id = $request->input('company_id');
        $companyAdd = Company::where('id', $company_id)->first();
//        dd($companyAdd);

        return response()->json($companyAdd);
    }
}
