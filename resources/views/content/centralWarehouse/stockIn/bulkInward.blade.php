@extends('layouts/layoutMaster')

@section('title', 'Create-bulkInward ')

@section('page-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light float-left">Central Warehouse/ Bulk Inward /</span> Create
    </h4>
    <!-- Invoice List Widget -->


    <div class="card">
        <div class="card-body">
            <div class="content">


                <div class="content-header mb-4">
                    <h3 class="mb-1">Create Bulk Inward</h3>
                </div>
                <form method="post" action="" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        {{-- Example --}}
                        {{-- {{!! textInputField('div.class', 'label', 'inputType', 'name', 'id', 'placeholder', 'star', 'defaultValue', 'required')}} --}}

                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="category">P.O. Number</label>
                            <select required id="category" name="category"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select Company">
                                <option value="dd">Select</option>
                                <option value="dd">Admin</option>
                            </select>
                        </div>

                        {!! textInputField('col-md-3 mt-3', 'Date', 'date', 'date', 'date', 'Description', '', '', '','') !!}

                    </div>
                    <div class="row">
                        {!! textInputField('col-md-2 mt-3', 'SKU', 'text', 'text', 'text', '34567', '', '', '','readonly') !!}
                        {!! textInputField('col-md-2 mt-3', 'Po number', 'text', 'text', 'text', 'number', '', '', '','readonly') !!}
                        {!! textInputField('col-md-2 mt-3', 'Dispatched By Factory', 'text', 'text', 'text', '5', '', '', '','readonly') !!}
                        {!! textInputField('col-md-2 mt-3', 'Pending to add in Inventory', 'text', 'text', 'text', '1', '', '', '','') !!}
                        {!! textInputField('col-md-2 mt-3', 'Total Inventory', 'text', 'text', 'text', '0', '', '', '','readonly') !!}
                        {!! textInputField('col-md-1 mt-3', 'Good Inventory', 'text', 'text', 'text', '0', '', '', '','') !!}
                        {!! textInputField('col-md-1 mt-3', 'Bad Inventory', 'text', 'text', 'text', '0', '', '', '','') !!}

                        {!! textInputField('col-md-2 mt-3', 'SKU', 'text', 'text', 'text', '34567', '', '', '','readonly') !!}
                        {!! textInputField('col-md-2 mt-3', 'Po number', 'text', 'text', 'text', 'number', '', '', '','readonly') !!}
                        {!! textInputField('col-md-2 mt-3', 'Dispatched By Factory', 'text', 'text', 'text', '5', '', '', '','readonly') !!}
                        {!! textInputField('col-md-2 mt-3', 'Pending to add in Inventory', 'text', 'text', 'text', '1', '', '', '','') !!}
                        {!! textInputField('col-md-2 mt-3', 'Total Inventory', 'text', 'text', 'text', '0', '', '', '','readonly') !!}
                        {!! textInputField('col-md-1 mt-3', 'Good Inventory', 'text', 'text', 'text', '0', '', '', '','') !!}
                        {!! textInputField('col-md-1 mt-3', 'Bad Inventory', 'text', 'text', 'text', '0', '', '', '','') !!}

                        {!! textInputField('col-md-2 mt-3', 'SKU', 'text', 'text', 'text', '34567', '', '', '','readonly') !!}
                        {!! textInputField('col-md-2 mt-3', 'Po number', 'text', 'text', 'text', 'number', '', '', '','readonly') !!}
                        {!! textInputField('col-md-2 mt-3', 'Dispatched By Factory', 'text', 'text', 'text', '5', '', '', '','readonly') !!}
                        {!! textInputField('col-md-2 mt-3', 'Pending to add in Inventory', 'text', 'text', 'text', '1', '', '', '','') !!}
                        {!! textInputField('col-md-2 mt-3', 'Total Inventory', 'text', 'text', 'text', '0', '', '', '','readonly') !!}
                        {!! textInputField('col-md-1 mt-3', 'Good Inventory', 'text', 'text', 'text', '0', '', '', '','') !!}
                        {!! textInputField('col-md-1 mt-3', 'Bad Inventory', 'text', 'text', 'text', '0', '', '', '','') !!}

                        {!! textInputField('col-md-2 mt-3', 'SKU', 'text', 'text', 'text', '34567', '', '', '','readonly') !!}
                        {!! textInputField('col-md-2 mt-3', 'Po number', 'text', 'text', 'text', 'number', '', '', '','readonly') !!}
                        {!! textInputField('col-md-2 mt-3', 'Dispatched By Factory', 'text', 'text', 'text', '5', '', '', '','readonly') !!}
                        {!! textInputField('col-md-2 mt-3', 'Pending to add in Inventory', 'text', 'text', 'text', '1', '', '', '','') !!}
                        {!! textInputField('col-md-2 mt-3', 'Total Inventory', 'text', 'text', 'text', '0', '', '', '','readonly') !!}
                        {!! textInputField('col-md-1 mt-3', 'Good Inventory', 'text', 'text', 'text', '0', '', '', '','') !!}
                        {!! textInputField('col-md-1 mt-3', 'Bad Inventory', 'text', 'text', 'text', '0', '', '', '','') !!}

                        {!! textInputField('col-md-2 mt-3', 'SKU', 'text', 'text', 'text', '34567', '', '', '','readonly') !!}
                        {!! textInputField('col-md-2 mt-3', 'Po number', 'text', 'text', 'text', 'number', '', '', '','readonly') !!}
                        {!! textInputField('col-md-2 mt-3', 'Dispatched By Factory', 'text', 'text', 'text', '5', '', '', '','readonly') !!}
                        {!! textInputField('col-md-2 mt-3', 'Pending to add in Inventory', 'text', 'text', 'text', '1', '', '', '','') !!}
                        {!! textInputField('col-md-2 mt-3', 'Total Inventory', 'text', 'text', 'text', '0', '', '', '','readonly') !!}
                        {!! textInputField('col-md-1 mt-3', 'Good Inventory', 'text', 'text', 'text', '0', '', '', '','') !!}
                        {!! textInputField('col-md-1 mt-3', 'Bad Inventory', 'text', 'text', 'text', '0', '', '', '','') !!}

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
