@extends('layouts/layoutMaster')

@section('title', 'Create-Design')

@section('page-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light float-left">Design /</span> Add
    </h4>
    <!-- Invoice List Widget -->


    <div class="card">
        <div class="card-body">
            <div class="content">


                <div class="content-header mb-4">
                    <h3 class="mb-1">Add Design</h3>
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

                        {{-- Date --}}
                        {!! textInputField('col-md-3 mt-3', 'Date', 'date', 'date', 'date', 'Enter Date', '', '', 'required', $employee->name ?? '') !!}


                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="category">Category</label>
                            <select required id="category" name="category"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select Company">
                                <option value="dd">Select</option>
                                <option value="dd">Admin</option>
                            </select>
                        </div>

                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="subcategory">Subcategory</label>
                            <select required id="subcategory" name="subcategory"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select Company">
                                <option value="dd">Select</option>
                                <option value="dd">Blue Buddha CG Road</option>
                            </select>
                        </div>

{{--                        Product Name--}}

                        {!! textInputField('col-md-3 mt-3', 'Product Name', 'text', 'productName', 'productName', 'Enter your product name', '', '', 'required', $employee->name ?? '') !!}

{{--                        Color--}}
                        {!! textInputField('col-md-3 mt-3', 'Color', 'text', 'color', 'color', 'Color', '', '', '', $employee->name ?? '') !!}

{{--                        Size--}}
                        {!! textInputField('col-md-3 mt-3', 'Size', 'text', 'size', 'size', 'Size', '', '', '') !!}

{{--                        Quantity--}}
                        {!! textInputField('col-md-3 mt-3', 'Quantity', 'number', 'quantity', 'quantity', 'Quantity', '', '', '') !!}
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
