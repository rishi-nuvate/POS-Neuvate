@extends('layouts/layoutMaster')

@section('title', 'Return-Bill')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/toastr/toastr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bloodhound/bloodhound.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/forms-selects.js') }}"></script>
    <script src="{{ asset('assets/js/forms-tagify.js') }}"></script>
    <script src="{{ asset('assets/js/forms-typeahead.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light float-left">Return Bill </span> 
    </h4>
        <div class="row invoice-add">
            <!-- Invoice Add-->
            <div class="col-lg-12 col-12 mb-lg-0 mb-4">
                <div class="card invoice-preview-card">

                    <div class="card-body">
                        <div class="users-list-filter">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="billNo">Bill No</label>
                                    <input type="text" name="billNo" id="billNo" class="form-control" placeholder="#87654" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="CustomerName">Customer Name</label>
                                    <input type="text" value="" placeholder="customerName" class="form-control" readonly>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label" for="colorName">Customer Mobile No</label>
                                    <input type="text" value="" placeholder="customerMobileNo" class="form-control" readonly>
                                </div>

                                <div class="col-md-3 mt-4">
                                    <button type="button" id="counter" class="btn btn-label-success"
                                    data-bs-toggle="modal" data-bs-target="#pricingModal">Search</button>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive mt-5">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><b>Product Name</b></th>
                                        <th><b>Quantity</b></th>
                                        <th><b>Price</b></th>
                                        <th><b>Total</b></th>
                                        <th><b>Action</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            3D Printer
                                        </td>
                                        <td>
                                            4
                                        </td>
                                        <td>
                                            $200
                                        </td>
                                        <td>
                                            $800
                                        </td>
                                            <td>
                                                <a class="btn btn-icon btn-label-primary mx-2"
                                                    href=""><i
                                                        class="ti ti-edit mx-2 ti-sm"></i></a>
                                                <button type="button" class="btn btn-icon btn-label-danger mx-2">
                                                    <i class="ti ti-trash mx-2 ti-sm"></i></button>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jeans
                                        </td>
                                        <td>
                                            4
                                        </td>
                                        <td>
                                            $200
                                        </td>
                                        <td>
                                            $800
                                        </td>
                                            <td>
                                                <a class="btn btn-icon btn-label-primary mx-2"
                                                    href=""><i
                                                        class="ti ti-edit mx-2 ti-sm"></i></a>
                                                <button type="button" class="btn btn-icon btn-label-danger mx-2">
                                                    <i class="ti ti-trash mx-2 ti-sm"></i></button>
                                            </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="col-md-12 mt-4 text-end">
                                <button type="button" id="counter" class="btn btn-label-success"
                                data-bs-toggle="modal" data-bs-target="#pricingModal">Print Bill</button>
                            </div>
                    </div>
                </div>
            </div>
            <!-- /Invoice Add-->
        </div>

@endsection

