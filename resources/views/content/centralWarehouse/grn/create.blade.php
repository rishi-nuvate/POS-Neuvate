@extends('layouts/layoutMaster')

@section('title', 'Create-GRN ')

@section('page-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light float-left">Supply Chain/ Barcode /</span> Create
    </h4>
    <!-- Invoice List Widget -->


    <div class="card">
        <div class="card-body">
            <div class="content">


                <div class="content-header mb-4">
                    <h3 class="mb-1">Create Barcode</h3>
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

                        {!! textInputField('col-md-3 mt-3', 'Date', 'date', 'date', 'date', 'Description', '', '', '','') !!}

                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="category">P.O. Number</label>
                            <select required id="category" name="category"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select Company">
                                <option value="dd">Select</option>
                                <option value="dd">Admin</option>
                            </select>
                        </div>

                        {!! textInputField('col-md-3 mt-3', 'Invoice', 'file', 'date', 'date', 'Description', '', '', '','') !!}

                    </div>
                    <div class="px-0 mt-3">
                        <div class="col-lg-2 col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-primary d-grid w-100">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
