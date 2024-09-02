@extends('layouts/layoutMaster')

@section('title', 'Master Menu')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/toastr/toastr.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/toastr/toastr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>

@endsection

@section('page-script')
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/app-invoice-list.js') }}"></script>
    <script src="{{ asset('assets/js/app-invoice-add.js') }}"></script>
@endsection

@section('content')

    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Master /</span> Customer</h4>

    <!-- Block UI -->
    <div class="row">

        <!-- Customer Data -->
        <div class="col-xl-4 col-12">
            <div class="card mb-4" id="card-block">
                <h5 class="card-header">Customer Data</h5>
                <div class="card-body">
                    <div class="block-ui-btn demo-inline-spacing">

                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-dark dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-users"></i>Customer
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href=""><i
                                        class="ti ti-pencil me-1"></i>
                                    Add</a>
                                <a class="dropdown-item" href=""><i
                                        class="ti ti-eye me-1"></i>
                                    View</a>
                            </div>
                        </div>
        <!-- Customer Data -->
    </div>
    <!-- /Block UI -->
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
