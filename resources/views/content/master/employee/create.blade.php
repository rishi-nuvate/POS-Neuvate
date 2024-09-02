@extends('layouts/layoutMaster')

@section('title', 'Add-Employee')

@section('page-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light float-left">Master / Employee /</span> Add
    </h4>
    <!-- Invoice List Widget -->


    <div class="card">
        {{-- <h5 class="card-header">Applicable Categories</h5> --}}
        <div class="card-body">
            <div class="content">


                <div class="content-header mb-4">
                    <h3 class="mb-1">Add Employee</h3>
                </div>
                <form method="post" action="" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        {{-- <div class="col-md-3">
                            <label class="form-label" for="employeeName">Employee Name</label>
                            <input type="text" id="employeeName" name="employeeName" class="form-control"
                                value="{{ old('employeeName') }}" placeholder="Employee Name" />
                        </div> --}}

{{-- Example --}}
                        {{-- {{!! textInputField('div.class', 'label', 'inputType', 'name', 'id', 'placeholder', 'star', 'defaultValue', 'required')}} --}}

                        {{-- Employee Name --}}
                        {!! textInputField('col-md-3', 'Employee Name', 'text', 'employeeName', 'employeeName', 'Enter your name', '', '', 'required', $employee->name ?? '') !!}



                        <div class="col-md-3">
                            <label class="form-label" for="employeeCompany">Company</label>
                            <select required id="employeeCompany" name="employeeCompany"
                                class="select2 select21 form-select" data-allow-clear="true"
                                data-placeholder="Select Company">
                                <option value="dd">Select</option>
                                <option value="dd">Admin</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label" for="employeeStoreId">Store</label>
                            <select required id="employeeStoreId" name="employeeStoreId"
                                class="select2 select21 form-select" data-allow-clear="true"
                                data-placeholder="Select Company">
                                <option value="dd">Select</option>
                                <option value="dd">Blue Buddha CG Road</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label" for="employeeType">Employee Type</label>
                            <select required id="employeeType" name="employeeType" class="select2 select21 form-select"
                                data-allow-clear="true" data-placeholder="Select Company">
                                <option value="dd">Select</option>
                                <option value="dd">Full Time</option>
                                <option value="dd">Part Time</option>
                            </select>
                        </div>

{{--
                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="employeeNumber">Employee Number</label>
                            <input type="text" id="employeeNumber" name="employeeNumber" class="form-control"
                                value="{{ old('employeeNumber') }}" placeholder="Employee Number" />
                        </div> --}}

                        {{-- Employee Number --}}
                        {!! textInputField('col-md-3 mt-3', 'Employee Email', 'email', 'employeeEmail', 'employeeEmail', 'Enter your email', '*', '', 'required', $employee->email ?? '') !!}

                        {{-- Employee Number --}}
                        {!! textInputField('col-md-3 mt-3', 'Employee Number', 'number', 'employeeNumber', 'employeeNumber', 'Employee Number', '*', '', 'required', $employee->employeeNumber ?? '') !!}

                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="employeeRole">Role</label>
                            <select required id="employeeRole" name="employeeRole" class="select2 select21 form-select"
                                data-allow-clear="true" data-placeholder="Select Role">
                                <option value="ds">Select</option>
                                <option value="sdf">Admin</option>
                            </select>
                        </div>

                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="employeeDepartment">Department</label>
                            <select required id="employeeDepartment" name="employeeDepartment"
                                class="select2 select21 form-select" data-allow-clear="true"
                                data-placeholder="Select Department">
                                <option value="">Select</option>
                                <option value="ds">Sales</option>
                                <option value="sd">Cashier</option>
                            </select>
                        </div>

                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="employeeSubDepartment">Sub Department</label>
                            <select required id="employeeSubDepartment" name="employeeSubDepartment"
                                class="select2 select21 form-select" data-allow-clear="true"
                                data-placeholder="Select Sub Department">
                                <option value="">Select</option>
                                <option value="ds">Sales</option>
                                <option value="sd">Cashier</option>
                            </select>
                        </div>

                        {{-- Birth Date --}}
                        {{-- {!! textInputField('col-md-3 mt-3', 'Birth Date', 'text', 'birthdate', 'multicol-birthdate', 'YYYY-MM-DD', '', '', '', '') !!} --}}

                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="multicol-birthdate">Birth Date</label>
                            <input type="text" id="multicol-birthdate" class="form-control dob-picker"
                                placeholder="YYYY-MM-DD" />
                        </div>

                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="multicol-birthdate">Anniversary Date</label>
                            <input type="text" id="multicol-birthdate" class="form-control dob-picker"
                                placeholder="YYYY-MM-DD" />
                        </div>

                        {{-- Employee Mobile Number --}}
                        {!! textInputField('col-md-3 mt-3', 'Employee Other Mobile Number', 'number', 'employeeOtherMoNumber', 'employeeOtherMoNumber', 'Employee Other Mobile No', '*', '', $employee->employeeOtherMoNumber ?? '') !!}

                        {{-- <div class="col-md-3 mt-3">
                            <label class="form-label" for="employeeMoNumber">Employee Mobile Number</label>
                            <input type="text" id="employeeMoNumber" name="employeeMoNumber" class="form-control"
                                value="{{ old('employeeMoNumber') }}" placeholder="Employee Mobile Number" />
                        </div> --}}

                        {{-- Employee Other Mobile Number --}}
                        {!! textInputField('col-md-3 mt-3', 'Employee Other Mobile Number', 'number', 'employeeOtherMoNumber', 'employeeOtherMoNumber', 'Employee Other Mobile No', '*', '', $employee->employeeOtherMoNumber ?? '') !!}
{{--
                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="employeeOtherMoNumber">Other Mobile Number</label>
                            <input type="text" id="employeeOtherMoNumber" name="employeeOtherMoNumber"
                                class="form-control" value="{{ old('employeeOtherMoNumber') }}"
                                placeholder="Employee Other Mobile Number" />
                        </div> --}}

                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="multicol-birthdate">Date of Joining</label>
                            <input type="text" id="multicol-birthdate" class="form-control dob-picker"
                                placeholder="YYYY-MM-DD" />
                        </div>

                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="multicol-birthdate">Date of Leaving</label>
                            <input type="text" id="multicol-birthdate" class="form-control dob-picker"
                                placeholder="YYYY-MM-DD" />
                        </div>



                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="employeeAadhar">Aadhar Card Number</label>
                            <input type="text" id="employeeAadhar" name="employeeAadhar" class="form-control"
                                value="{{ old('employeeAadhar') }}" placeholder="Employee Aadhar Card Number" />
                        </div>

                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="employeePan">PAN Number</label>
                            <input type="text" id="employeePan" name="employeePan" class="form-control"
                                value="{{ old('employeePan') }}" placeholder="Employee PAN Number" />
                        </div>

                        <div class="col-md-6 mt-4">
                            <label class="form-check-label">Gender</label>
                            <div class="col mt-2">
                                <div class="form-check form-check-inline">
                                    <input name="collapsible-address-type" class="form-check-input" type="radio"
                                        value="" id="collapsible-address-type-home" checked="" />
                                    <label class="form-check-label" for="collapsible-address-type-home">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="collapsible-address-type" class="form-check-input" type="radio"
                                        value="" id="collapsible-address-type-office" />
                                    <label class="form-check-label" for="collapsible-address-type-office">
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>

                        <hr class="mt-5">
                        <h5>Address</h5>
                        <div class="col-md-6 mt-3">
                            <label class="form-label" for="employeePan">Address Line 1</label>
                            <input type="text" id="employeePan" name="employeePan" class="form-control"
                                value="{{ old('employeePan') }}" placeholder="Address Line 1" />
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label" for="employeePan">Address Line 2</label>
                            <input type="text" id="employeePan" name="employeePan" class="form-control"
                                value="{{ old('employeePan') }}" placeholder="Address Line 2" />
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="form-label" for="employeePan">City</label>
                            <input type="text" id="employeePan" name="employeePan" class="form-control"
                                value="{{ old('employeePan') }}" placeholder="Ahmedabad" />
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="form-label" for="employeePan">State</label>
                            <input type="text" id="employeePan" name="employeePan" class="form-control"
                                value="{{ old('employeePan') }}" placeholder="Gujarat" />
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="form-label" for="employeePan">Pin Code</label>
                            <input type="text" id="employeePan" name="employeePan" class="form-control"
                                value="{{ old('employeePan') }}" placeholder="382480" />
                        </div>


                        <hr class="mt-5">
                        <h5>Upload</h5>

                        <div class="col-md-4">
                            <label class="form-label" for="basic-default-upload-file">Aadhar Card</label>
                            <input type="file" class="form-control" id="basic-default-upload-file" required="">
                          </div>

                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-upload-file">PAN Card</label>
                            <input type="file" class="form-control" id="basic-default-upload-file" required="">
                          </div>

                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-upload-file">Profile Pic</label>
                            <input type="file" class="form-control" id="basic-default-upload-file" required="">
                          </div>

                    </div>
                    <br>
                    <div class="row px-0 mt-3">
                        <div class="col-lg-2 col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-primary d-grid w-100">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
