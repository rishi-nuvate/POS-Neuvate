<?php

namespace App\Http\Controllers\master\users;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.master.users.employee.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.master.users.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        if (Gate::allows('create', Employee::class)) {
            DB::beginTransaction();

            try {

                $employee = new Employee([
                    'emp_name' => request('emp_name'),
                    'company_id' => request('company_id'),
                    'store_id' => request('store_id'),
                    'emp_type' => request('emp_type'),
                    'emp_email' => request('emp_email'),
                    'emp_number' => request('emp_number'),
                    'emp_role' => request('emp_role'),
                    'emp_department' => request('emp_department'),
                    'emp_sub_department' => request('emp_sub_department'),
                    'emp_dob' => request('emp_dob'),
                    'emp_anni_date' => request('emp_anni_date'),
                    'emp_other_num' => request('emp_other_num'),
                    'emp_doj' => request('emp_doj'),
                    'emp_dol' => request('emp_dol'),
                    'emp_aadhar_num' => request('emp_aadhar_num'),
                    'emp_pan_num' => request('emp_pan_num'),
                    'emp_gender' => request('emp_gender'),

                    'emp_addline1' => request('emp_addline1'),
                    'emp_addline2' => request('emp_addline2'),
                    'emp_city' => request('emp_city'),
                    'emp_state' => request('emp_state'),
                    'emp_pincode' => request('emp_pincode'),
                ]);

                $employee->save();

                $aadharCard = $request->emp_aadhar_file->getClientOriginalName();
                $panCard = $request->emp_pan_file->getClientOriginalName();
                $profilePic = $request->emp_profile_pic->getClientOriginalName();

                $aadharDestination = public_path('/employee /' . $employee->id . '/ aadharCard /');
                $panDestination = public_path('/company / ' . $employee->id . '/ panCard /');
                $profileDestination = public_path('/company / ' . $employee->id . '/ profilePic /');

//                if (!is_dir(public_path('/company / pan_gst '))) {
//                    mkdir(public_path('/company / pan_gst '), 0755, true);
//                }

                $request->emp_aadhar_file->move($aadharDestination, $aadharCard);
                $request->emp_pan_file->move($panDestination, $panCard);
                $request->emp_profile_pic->move($profileDestination, $profilePic);

                $employee->update([
                    'emp_aadhar_file' => $aadharCard,
                    'emp_pan_file' => $panCard,
                    'emp_profile_pic'=> $profilePic,
                ]);

                DB::commit();
                return redirect()->route('content.master.users.employee.create')->with('success', 'Employee added successfully.');

            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('error', $e->getMessage());
            }

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('content.master.users.employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        if (Gate::allows('update', $employee)) {
            DB::beginTransaction();

            try {

                // Update the employee fields
                $employee->update([
                    'emp_name' => request('emp_name'),
                    'company_id' => request('company_id'),
                    'store_id' => request('store_id'),
                    'emp_type' => request('emp_type'),
                    'emp_email' => request('emp_email'),
                    'emp_number' => request('emp_number'),
                    'emp_role' => request('emp_role'),
                    'emp_department' => request('emp_department'),
                    'emp_sub_department' => request('emp_sub_department'),
                    'emp_dob' => request('emp_dob'),
                    'emp_anni_date' => request('emp_anni_date'),
                    'emp_other_num' => request('emp_other_num'),
                    'emp_doj' => request('emp_doj'),
                    'emp_dol' => request('emp_dol'),
                    'emp_aadhar_num' => request('emp_aadhar_num'),
                    'emp_pan_num' => request('emp_pan_num'),
                    'emp_gender' => request('emp_gender'),

                    'emp_addline1' => request('emp_addline1'),
                    'emp_addline2' => request('emp_addline2'),
                    'emp_city' => request('emp_city'),
                    'emp_state' => request('emp_state'),
                    'emp_pincode' => request('emp_pincode'),
                ]);

                DB::commit();
                return redirect()->route('employee.index')->with('success', 'Employee updated successfully.');

            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        if (Gate::allows('delete', $employee)) {
            $employee->delete();
            return redirect()->route('content.master.users.employee.index')->with('success', 'Employee deleted successfully.');
        }
    }

    public function getEmployeeData()
    {
        $employees = Employee::all();

        $num = 1;
        $result = ['data' => []];
        foreach ($employees as $employee) {

            $id = $employee->id;
            $name = $employee->emp_name;

//            $company = Company::where('id', $employee->company_id)->first()->CompanyName;
            $company = $employee->company_id;
            $store = $employee->store_id;
            $role = $employee->emp_role;
            $action =
                ' <a href="/employee/' . $id . '/edit" title="Edit" class="btn btn-icon btn-label-primary mx-1"><i class="ti ti-edit mx-2 ti-sm"></i></a>
            <button onclick="daleteEmployee(' .
                $employee->id .
                ')" title="Delete" class="btn btn-icon btn-label-danger mx-1"><i class="ti ti-trash mx-2 ti-sm"></i></button>';
            array_push($result['data'], [$num, $name, $company, $store, $role, $action]);
            $num++;
        }
        echo json_encode($result);
    }
}
