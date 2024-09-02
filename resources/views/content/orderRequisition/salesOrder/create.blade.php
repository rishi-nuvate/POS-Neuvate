@extends('layouts/layoutMaster')

@section('title', 'Create-Sales-Order')

@section('page-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light float-left">Order Requisition/ Sales Order /</span> Create
    </h4>
    <!-- Invoice List Widget -->



    <form method="post" action="" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="content">


                    <div class="content-header mb-4">
                        <h3 class="mb-1">Create Sales Order</h3>
                    </div>


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
                            <label class="form-label" for="category">Company</label>
                            <select required id="category" name="category"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select Company">
                                <option value="dd">Select</option>
                                <option value="dd">Admin</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">

            <div class="card-body">
                <div class="content">
                    <div class="row">

                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="subcategory">Store</label>
                            <select required id="subcategory" name="subcategory"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select Company">
                                <option value="dd">Select</option>
                                <option value="dd">Blue Buddha CG Road</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="subcategory">SKU Code</label>
                            <select required id="subcategory" name="subcategory"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select Company">
                                <option value="dd">Select</option>
                                <option value="dd">Blue Buddha CG Road</option>
                            </select>
                        </div>

                        {{-- Description --}}
                        {!! textInputField('col-md-3 mt-3', 'Product Name', 'text', 'date', 'date', 'Product Name', '', '', '','readonly') !!}


                        {{--                        Quantity--}}

                        {!! textInputField('col-md-1 mt-3', 'Quantity', 'text', 'productName', 'productName', '5', '', '', 'required') !!}

                        {{--                        Unit Price--}}
                        {!! textInputField('col-md-2 mt-3', 'Unit Price', 'text', 'color', 'color', '500', '', '', '', 'readonly') !!}

                        {{--                        Tex--}}
                        {!! textInputField('col-md-1 mt-3', 'Tax (%)', 'text', 'size', 'size', 'M', '', '', '','readonly') !!}

                        {{--                        Amount--}}
                        {!! textInputField('col-md-2 mt-3', 'Amount', 'number', 'quantity', 'quantity', '2500', '', '', '','readonly') !!}

                        <div class="col-md-1 mt-3">
                            <button type="submit" class="btn btn-primary d-grid w-100">Add</button>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-1 mt-3">
            <button type="submit" class="btn btn-warning d-grid w-100">Add store</button>
        </div>
<div class="card mt-3">
    <div class="card-body">
        <div class="content">
        <div class="col-md-3 mt-3">
            <button type="submit" class="btn btn-lg btn-primary d-grid w-100">Submit</button>
        </div>
        </div>
    </div>
</div>
    </form>
@endsection
