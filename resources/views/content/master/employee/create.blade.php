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

                        {{-- {{!! textInputField('div.class', 'label', 'inputType', 'name', 'id', 'placeholder', 'star', 'input class', 'defaultValue', 'required','Readonly')}} --}}

                        {{--{!! selectField('col-md-3 mt-3', 'Lable', 'name', 'for,id','select2 select21 form-select (select class)', 'placeholder' ,[10 => 'Ten',20 => 'Twenty',30 => 'Thirty',], 'star', 'default value', 'required', 'readonly') !!}--}}


                        {{-- Employee Name --}}
                        {!! textInputField('col-md-3 mt-3', 'Employee Name', 'text', 'employeeName', 'employeeName', 'Enter your name', '', '', 'required', $employee->name ?? '') !!}

                        {{--Company --}}
                        {!! selectField('col-md-3 mt-3', 'Company', 'employeeCompany', 'employeeCompany','select2 select21 form-select','Select Company', [10 => 'Select',20 => 'Twenty',30 => 'Thirty',], '', '', '', '') !!}

                        {{--Store--}}
                        {!! selectField('col-md-3 mt-3', 'Store', 'employeeStoreId', 'employeeStoreId','select2 select21 form-select', 'Select Company',[10 => 'Select',20 => 'Blue Buddha CG Road',30 => 'Thirty',], '', '', '', '') !!}

                        {{-- Employee Type--}}
                        {!! selectField('col-md-3 mt-3', 'Employee Type', 'employeeType', 'employeeType','select2 select21 form-select', 'Select Type',[10 => 'Select',20 => 'Full Time',30 => 'Part Time',], '', '', '', '') !!}

                        {{-- Employee Number --}}
                        {!! textInputField('col-md-3 mt-3', 'Employee Email', 'email', 'employeeEmail', 'employeeEmail', 'Enter your email', '*', '', 'required', $employee->email ?? '') !!}

                        {{-- Employee Number --}}
                        {!! textInputField('col-md-3 mt-3', 'Employee Number', 'number', 'employeeNumber', 'employeeNumber', 'Employee Number', '*', '', 'required', $employee->employeeNumber ?? '') !!}

                        {{--Role--}}
                        {!! selectField('col-md-3 mt-3', 'Role', 'employeeRole', 'employeeRole','select2 select21 form-select', 'Select Role',[10 => 'Select',20 => 'Admin',30 => 'Part Time',], '', '', '', '') !!}

                        {{--Department--}}
                        {!! selectField('col-md-3 mt-3', 'Department', 'employeeDepartment', 'employeeDepartment','select2 select21 form-select', 'Select Department',[10 => 'Select',20 => 'Sales',30 => 'Cashier',], '', '', '', '') !!}

                        {{--Sub Department--}}
                        {!! selectField('col-md-3 mt-3', 'Sub Department', 'employeeSubDepartment', 'employeeSubDepartment','select2 select21 form-select', 'Select Department',[10 => 'Select',20 => 'Sales',30 => 'Cashier',], '', '', '', '') !!}

                        {{-- Birth Date --}}
                        {{-- {!! textInputField('col-md-3 mt-3', 'Birth Date', 'text', 'birthdate', 'multicol-birthdate', 'YYYY-MM-DD', '', '', '', '') !!} --}}

                        {{--Birth Date--}}
                        {!! textInputField('col-md-3 mt-3', 'Birth Date', 'text', 'employeeBirthdate', 'multiCol-birthdate', 'YYYY-MM-DD', '', 'dob-picker', '','','') !!}

                        {{--Anniversary Date--}}
                        {!! textInputField('col-md-3 mt-3', 'Anniversary Date', 'text', 'employeeBirthdate', 'multiCol-anniversary', 'YYYY-MM-DD', '', 'dob-picker', '','','') !!}

                        {{-- Employee Mobile Number --}}
                        {!! textInputField('col-md-3 mt-3', 'Employee Other Mobile Number', 'number', 'employeeOtherMoNumber', 'employeeOtherMoNumber', 'Employee Other Mobile No', '*', '', $employee->employeeOtherMoNumber ?? '') !!}

                        {{-- Date Of Joining --}}
                        {!! textInputField('col-md-3 mt-3', 'Date of Joining', 'text', 'dateOfJoining', 'multiCol-date-of-joining', 'YYYY-MM-DD', '', 'dob-picker', '','','') !!}

                        {{--Date Of Leaving--}}
                        {!! textInputField('col-md-3 mt-3', 'Date of Leaving', 'text', 'dateOfLeaving', 'multiCol-date-of-joining', 'YYYY-MM-DD', '', 'dob-picker', '','','') !!}

                        {{--Aadhar Card Number--}}
                        {!! textInputField('col-md-3 mt-3', 'Aadhar Card Number', 'text', 'employeeAadhar', 'employeeAadhar', 'Employee Aadhar Card Number', '', '', old('employeeAadhar'),'','') !!}

                        {{--Pan Card Number--}}
                        {!! textInputField('col-md-3 mt-3', 'Pan Card Number', 'text', 'employeePan', 'employeePan', 'Employee Pan Card Number', '', '', old('employeePan'),'','') !!}


                        <div class="col-md-6 mt-4">
                            <label class="form-check-label">Gender</label>
                            <div class="col mt-2">
                                <div class="form-check form-check-inline">
                                    <input name="collapsible-address-type" class="form-check-input" type="radio"
                                           value="" id="collapsible-address-type-home" checked=""/>
                                    <label class="form-check-label" for="collapsible-address-type-home">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="collapsible-address-type" class="form-check-input" type="radio"
                                           value="" id="collapsible-address-type-office"/>
                                    <label class="form-check-label" for="collapsible-address-type-office">
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>


                        <hr class="mt-5">
                        <h5>Address</h5>

                        {{--Address Line 1--}}
                        {!! textInputField('col-md-6 mt-3', 'Address Line 1', 'text', 'addressLine1', 'addressLine1', 'Address Line 1', '', '', old('addressLine1'),'','') !!}

                        {{--Address Line 2--}}
                        {!! textInputField('col-md-6 mt-3', 'Address Line 2', 'text', 'addressLine2', 'addressLine2', 'Address Line 2', '', '', old('addressLine2'),'','') !!}

                        <div class="col-md-6 mt-3">
                            <label class="form-label" for="employeePan">Address Line 2</label>
                            <input type="text" id="employeePan" name="employeePan" class="form-control"
                                   value="{{ old('employeePan') }}" placeholder="Address Line 2"/>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="form-label" for="employeePan">City</label>
                            <input type="text" id="employeePan" name="employeePan" class="form-control"
                                   value="{{ old('employeePan') }}" placeholder="Ahmedabad"/>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="form-label" for="employeePan">State</label>
                            <input type="text" id="employeePan" name="employeePan" class="form-control"
                                   value="{{ old('employeePan') }}" placeholder="Gujarat"/>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="form-label" for="employeePan">Pin Code</label>
                            <input type="text" id="employeePan" name="employeePan" class="form-control"
                                   value="{{ old('employeePan') }}" placeholder="382480"/>
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
