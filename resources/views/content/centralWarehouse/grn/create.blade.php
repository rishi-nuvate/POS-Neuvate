@extends('layouts/layoutMaster')

@section('title', 'Create-GRN ')

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
                <div class="form-check form-check-primary mt-3 mb-3">
                    <input class="form-check-input" type="checkbox" name="WithOutPO"
                           onchange="toggleTableVisibility()" value="1" id="WithOutPO">
                    <label class="form-check-label" for="customCheckPrimary">Without PO</label>
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

                        <div class="col-md-3 mt-3" id="withPo">
                            <label class="form-label" for="category">P.O. Number</label>
                            <select required id="category" name="category"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select Company">
                                <option value="dd">Select</option>
                                <option value="dd">Admin</option>
                            </select>
                        </div>

                        {!! textInputField('col-md-3 mt-3', 'Invoice', 'text', 'invoice_no', 'invoice_no', 'Description', '', '', '','') !!}

                    </div>
                    <div id="withPoContainer" class="mt-3">
                        <div class="form-group col-sm-12 mt-3">
                            <table id="option-value"
                                   class="responsive table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <td scope="row">Sr.No</td>
                                    <td scope="row">Item Name</td>
                                    <td scope="row">Po Qty</td>
                                    <td scope="row">Received Qty</td>
                                    <td scope="row">Remaining to Rec. Qty</td>
                                    <td scope="row">Quantity</td>
                                    {{-- <td scope="row">Add</td> --}}
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                <input type="hidden" name="option_count" id="option_count"/>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="col-12 col-sm-4 col-lg-4" id="withoutPo" style="display: none;">
                        <label for="users-list-verified">Supplier</label>
                        <fieldset class="form-group">
                            <select class="form-control select2" name="Supplier" id="Supplier">
                                {{--                                @foreach ($Suppliers as $Supplier)--}}
                                {{--                                    <option value="{{ $Supplier->id }}">--}}
                                {{--                                        {{ $Supplier->company_name . ' : ' . $Supplier->person_name }}--}}
                                {{--                                    </option>--}}
                                {{--                                @endforeach--}}
                            </select>
                        </fieldset>
                    </div>
                    <div id="withoutPoContainer" class="mt-3" style="display: none;">
                        <div class="form-group col-sm-12 mt-3">
                            <table id="WithoutPoTable"
                                   class="responsive table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <td scope="row">Sr.No</td>
                                    <td scope="row">Item Name</td>
                                    <td scope="row">Quantity</td>
                                    <td scope="row">Rate</td>
                                    <td scope="row">Action</td>
                                    {{-- <td scope="row">Add</td> --}}
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                <input type="hidden" name="option_count" id="option_count"/>
                                </tfoot>
                            </table>
                            <div class="col-lg-3 col-12 invoice-actions mt-3">
                                <button type="button" class="btn btn-outline-primary" onclick="addItem()">
                                    Add
                                    another
                                </button>
                            </div>
                        </div>
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

@section('page-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>

    <script>
        function toggleTableVisibility() {
            var withPoContainer = document.getElementById('withPoContainer');

            var withoutPoContainer = document.getElementById('withoutPoContainer');

            var checkbox = document.getElementById('WithOutPO');
            if (checkbox.checked) {
                withPo.style.display = 'None'; // Hide the table when checkbox is checked
                withPoContainer.style.display = 'None'; // Hide the table when checkbox is checked

                withoutPoContainer.style.display = 'Block';
            } else {
                withPo.style.display = 'Block'; // Show the table when checkbox is unchecked
                withPoContainer.style.display = 'Block'; // Hide the table when checkbox is checked

                withoutPoContainer.style.display = 'None';
            }
        }
    </script>
@endsection
