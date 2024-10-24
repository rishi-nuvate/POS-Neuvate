@extends('layouts/layoutMaster')

@section('title', 'Edit-Employee')

@section('page-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>
@endsection

@section('content')

    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/master') }}">Master</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{route('employee.index')}}">
                    Employee
                </a>
            </li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>

    <!-- Invoice List Widget -->

    <form method="post" action="{{route('employee.update',['employee'=>$employee->id])}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="col-lg-12 col-12 mb-lg-0 mb-4 mt-2">
            <div class="text-white rounded-top bg-primary p-2">
                Add Employee
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="content">


                        <div class="content-header mb-4">
                            <h3 class="mb-1">Add Employee</h3>
                        </div>


                        <div class="row">

                            {{--{!! textInputField('div.class', 'label', 'inputType', 'name', 'id', 'placeholder', '*','inputClass', 'defaultValue', 'required','readonly') !!} --}}

                            {{--{!! selectField('col-md-3 mt-3', 'Lable', 'name', 'for,id','select2 select21 form-select (select class)', 'placeholder' ,[10 => 'Ten',20 => 'Twenty',30 => 'Thirty',], 'star', 'default value', 'required', 'readonly') !!}--}}


                            {{-- Employee Name --}}
                            {!! textInputField('col-md-3 mt-3', 'Employee Name', 'text', 'emp_name', 'emp_name', 'Enter your name', '*', '',$employee->emp_name, 'required', '') !!}

                            {{--Company --}}
                            {!! selectField('col-md-3 mt-3', 'Company', 'company_id', 'company_id','select2 select21 form-select','Select Company', [10 => 'Select',20 => 'Twenty',30 => 'Thirty',], '', $employee->company_id ,'', '') !!}

                            {{--Store--}}
                            {!! selectField('col-md-3 mt-3', 'Store', 'store_id', 'store_id','select2 select21 form-select', 'Select Store',[10 => 'Select',20 => 'Blue Buddha CG Road',30 => 'Thirty',], '', $employee->store_id, '', '') !!}

                            {{-- Employee Type--}}
                            {!! selectField('col-md-3 mt-3', 'Employee Type', 'emp_type', 'emp_type','select2 select21 form-select', 'Select Type',[10 => 'Select','Full Time' => 'Full Time','Part Time' => 'Part Time',], '',$employee->emp_type , '', '') !!}

                            {{-- Employee Number --}}
                            {!! textInputField('col-md-3 mt-3', 'Employee Email', 'email', 'emp_email', 'emp_email', 'Enter your email', '*', '',$employee->emp_email, 'required', '') !!}

                            {{-- Employee Number --}}
                            {!! textInputField('col-md-3 mt-3', 'Employee Number', 'number', 'emp_number', 'emp_number', 'Employee Number', '*', '',$employee->emp_number, 'required', '') !!}

                            {{--Role--}}
                            {!! selectField('col-md-3 mt-3', 'Role', 'emp_role', 'emp_role','select2 select21 form-select', 'Select Role',[10 => 'Select','Admin' => 'Admin','Part Time' => 'Part Time',], '', '', '', '') !!}

                            {{--Department--}}
                            {!! selectField('col-md-3 mt-3', 'Department', 'emp_department', 'emp_department','select2 select21 form-select', 'Select Department',[10 => 'Select','Sales' => 'Sales','Cashier' => 'Cashier',], '', '', '', '') !!}

                            {{--Sub Department--}}
                            {!! selectField('col-md-3 mt-3', 'Sub Department', 'emp_sub_department', 'emp_sub_department','select2 select21 form-select', 'Select Department',[10 => 'Select','Sales' => 'Sales','Cashier' => 'Cashier',], '', '', '', '') !!}

                            {{-- Birth Date --}}
                            {{-- {!! textInputField('col-md-3 mt-3', 'Birth Date', 'text', 'birthdate', 'multicol-birthdate', 'YYYY-MM-DD', '', '', '', '') !!} --}}

                            {{--Birth Date--}}
                            {!! textInputField('col-md-3 mt-3', 'Birth Date', 'text', 'emp_dob', 'multiCol-birthdate', 'YYYY-MM-DD', '', 'dob-picker', $employee->emp_dob,'','') !!}

                            {{--Anniversary Date--}}
                            {!! textInputField('col-md-3 mt-3', 'Anniversary Date', 'text', 'emp_anni_date', 'multiCol-anniversary', 'YYYY-MM-DD', '', 'dob-picker', $employee->emp_anni_date,'','') !!}

                            {{-- Employee Mobile Number --}}
                            {!! textInputField('col-md-3 mt-3', 'Employee Other Mobile Number', 'number', 'emp_other_num', 'emp_other_num', 'Employee Other Mobile No', '*', '',$employee->emp_other_num,'','' ) !!}

                            {{-- Date Of Joining --}}
                            {!! textInputField('col-md-3 mt-3', 'Date of Joining', 'text', 'emp_doj', 'multiCol-date-of-joining', 'YYYY-MM-DD', '', 'dob-picker', $employee->emp_doj,'','') !!}

                            {{--Date Of Leaving--}}
                            {!! textInputField('col-md-3 mt-3', 'Date of Leaving', 'text', 'emp_dol', 'multiCol-date-of-joining', 'YYYY-MM-DD', '', 'dob-picker', $employee->emp_dol,'','') !!}

                            {{--Aadhar Card Number--}}
                            {!! textInputField('col-md-3 mt-3', 'Aadhar Card Number', 'text', 'emp_aadhar_num', 'emp_aadhar_num', 'Employee Aadhar Card Number', '', '', $employee->emp_aadhar_num,'','') !!}

                            {{--Pan Card Number--}}
                            {!! textInputField('col-md-3 mt-3', 'Pan Card Number', 'text', 'emp_pan_num', 'emp_pan_num', 'Employee Pan Card Number', '', '', $employee->emp_pan_num,'','') !!}


                            <div class="col-md-6 mt-4">
                                <label class="form-check-label">Gender</label>
                                <div class="col mt-2">
                                    <div class="form-check form-check-inline">
                                        <input name="emp_gender" class="form-check-input" type="radio"
                                               value="" id="gender" checked=""/>
                                        <label class="form-check-label" for="collapsible-address-type-home">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input name="emp_gender" class="form-check-input" type="radio"
                                               value="" id="gender"/>
                                        <label class="form-check-label" for="collapsible-address-type-office">
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-12 col-12 mb-lg-0 mb-4 mt-2">
            <div class="text-white rounded-top bg-primary p-2">
                Address
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="content">

                        <div class="row">

                            {{--Address Line 1--}}
                            {!! textInputField('col-md-6 mt-3', 'Address Line 1', 'text', 'emp_addline1', 'emp_addline1', 'Address Line 1', '', '', $employee->emp_addline1,'','') !!}

                            {{--Address Line 2--}}
                            {!! textInputField('col-md-6 mt-3', 'Address Line 2', 'text', 'emp_addline2', 'emp_addline2', 'Address Line 2', '', '', $employee->emp_addline2,'','') !!}


                            <div class="col-md-4 mt-3">
                                <label class="form-label" for="emp_city">City</label>
                                <input type="text" id="emp_city" name="emp_city"
                                       class="form-control"
                                       value="{{ $employee->emp_city }}" placeholder="Ahmedabad"/>
                            </div>

                            <div class="col-md-4 mt-3">
                                <label class="form-label" for="emp_state">State</label>
                                <input type="text" id="emp_state" name="emp_state"
                                       class="form-control"
                                       value="{{ $employee->emp_state }}" placeholder="Gujarat"/>
                            </div>

                            <div class="col-md-4 mt-3">
                                <label class="form-label" for="emp_pincode">Pin Code</label>
                                <input type="text" id="emp_pincode" name="emp_pincode"
                                       class="form-control"
                                       value="{{ $employee->emp_pincode }}" placeholder="382480"/>
                            </div>


                            <hr class="mt-5">
                            <h5>Upload</h5>

                            <div class="col-md-4">
                                <label class="form-label" for="basic-default-upload-file">Aadhar
                                    Card</label>
                                <input type="file" name="emp_aadhar_file" class="form-control"
                                       id="basic-default-upload-file">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label" for="basic-default-upload-file">PAN
                                    Card</label>
                                <input type="file" name="emp_pan_file" class="form-control"
                                       id="basic-default-upload-file">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label" for="basic-default-upload-file">Profile
                                    Pic</label>
                                <input type="file" name="emp_profile_pic" class="form-control"
                                       id="basic-default-upload-file">
                            </div>

                        </div>
                        <br>
                        <div class="row px-0 mt-3">
                            <div class="col-lg-2 col-md-12 col-sm-12">
                                <button type="submit" class="btn btn-primary d-grid w-100">Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
