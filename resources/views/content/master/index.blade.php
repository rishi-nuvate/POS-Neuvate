@extends('layouts/layoutMaster')

@section('title', 'Master Menu')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/toastr/toastr.css') }}"/>
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

    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Master /</span> List</h4>

    <!-- Block UI -->
    <div class="row">


        {{--     Comapany   --}}
        <div class="col-xl-3 col-12">
            <div class="card mb-4" id="page-block">
                <h5 class="card-header">Company</h5>
                <div class="card-body">
                    <div class="block-ui-btn demo-inline-spacing">
                        {{--Company--}}
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-dark dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-truck"></i>Company
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="{{ route('company.create') }}"><i
                                        class="ti ti-pencil me-1"></i>
                                    Add</a>
                                <a class="dropdown-item" href="{{ route('company.index') }}"><i
                                        class="ti ti-eye me-1"></i>
                                    View</a>
                            </div>
                        </div>

                        {{--                        Central Warehouse--}}
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-dark dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-truck"></i>Central Warehouse
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="{{route('centralWarehouse.create')}}"><i
                                        class="ti ti-pencil me-1"></i>
                                    Add</a>
                                <a class="dropdown-item" href="{{route('centralWarehouse.index')}}"><i
                                        class="ti ti-eye me-1"></i>
                                    List</a>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
        {{--    Company    --}}

        <!-- Customer Data -->
        <div class="col-xl-4 col-12">
            <div class="card mb-4" id="card-block">
                <h5 class="card-header">Users</h5>
                <div class="card-body">
                    <div class="block-ui-btn demo-inline-spacing">

                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-dark dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-users"></i>Employee
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="{{ route('employee.create') }}"><i
                                        class="ti ti-pencil me-1"></i>
                                    Add</a>
                                <a class="dropdown-item" href="{{route('employee.index')}}"><i
                                        class="ti ti-eye me-1"></i>
                                    View</a>
                            </div>

                        </div>

                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-dark dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-users"></i>Vendor
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="{{ route('vendors.create') }}"><i
                                        class="ti ti-pencil me-1"></i>
                                    Add</a>
                                <a class="dropdown-item" href="{{ route('vendors.index') }}"><i
                                        class="ti ti-eye me-1"></i>
                                    View</a>
                            </div>
                        </div>

                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-dark dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-truck"></i>SIS Brand
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Customer Data -->

        <!-- SKU -->
        <div class="col-xl-5 col-12">
            <div class="card mb-4" id="card-block">
                <h5 class="card-header">Basic Info</h5>
                <div class="card-body">
                    <div class="block-ui-btn demo-inline-spacing">
                        {{--categories--}}
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-dark dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-truck"></i>Category
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="{{ route('category.create') }}"><i
                                        class="ti ti-pencil me-1"></i>
                                    Add</a>
                                <a class="dropdown-item" href="{{ route('category.index') }}"><i
                                        class="ti ti-eye me-1"></i>
                                    View</a>
                            </div>
                        </div>

                        {{--Brand--}}
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-dark dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-users"></i>Brand
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="{{ route('brand.create') }}"><i
                                        class="ti ti-pencil me-1"></i>
                                    Add</a>
                                <a class="dropdown-item" href="{{ route('brand.index')}}"><i
                                        class="ti ti-eye me-1"></i>
                                    View</a>
                            </div>
                        </div>

                        {{--                        Season--}}
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-dark dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-users"></i>Season
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="{{ route('season.create') }}"><i
                                        class="ti ti-pencil me-1"></i>
                                    Add</a>
                                <a class="dropdown-item" href="{{ route('season.index') }}"><i
                                        class="ti ti-eye me-1"></i>
                                    View</a>
                            </div>
                        </div>

                        {{--                        Tags--}}
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-dark dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-users"></i>Tags
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('tags.create') }}"><i
                                        class="ti ti-pencil me-1"></i>
                                    Add</a>
                                <a class="dropdown-item" href="{{ route('tags.index') }}"><i
                                        class="ti ti-eye me-1"></i>
                                    View</a>
                            </div>
                        </div>
                        {{--                        FIT--}}
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-dark dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-truck"></i>Fit
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="{{ route('fit.create') }}"><i
                                        class="ti ti-pencil me-1"></i>
                                    Add</a>
                                <a class="dropdown-item" href="{{ route('fit.index') }}"><i
                                        class="ti ti-eye me-1"></i>
                                    View</a>
                            </div>
                        </div>
                        {{--                        SLIM--}}
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-dark dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-truck"></i>Sleeve
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="{{ route('sleeve.create') }}"><i
                                        class="ti ti-pencil me-1"></i>
                                    Add</a>
                                <a class="dropdown-item" href="{{ route('sleeve.index') }}"><i
                                        class="ti ti-eye me-1"></i>
                                    View</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SKU Data -->

        <!-- Category Data -->
        <div class="col-xl-3 col-12">
            <div class="card mb-4" id="page-block">
                <h5 class="card-header">Product Info</h5>
                <div class="card-body">
                    <div class="block-ui-btn demo-inline-spacing">


                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-dark dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-users"></i>Product
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="{{ route('product.create') }}"><i
                                        class="ti ti-pencil me-1"></i>
                                    Add</a>
                                <a class="dropdown-item" href="{{ route('product.index') }}"><i
                                        class="ti ti-eye me-1"></i>
                                    View</a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- Category Data -->

        <!-- Category Data -->
        <div class="col-xl-5 col-12">
            <div class="card mb-4" id="page-block">
                <h5 class="card-header">Store</h5>
                <div class="card-body">
                    <div class="block-ui-btn demo-inline-spacing">

                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-primary dropdown-toggle"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-truck"></i>Store Type
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

                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-primary dropdown-toggle"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-truck"></i>Payment Type
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
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-primary dropdown-toggle"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-truck"></i>Store Generate
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
                    </div>
                </div>
            </div>
        </div>
        <!-- Category Data -->

        <!-- Discount -->
        <div class="col-xl-4 col-12">
            <div class="card mb-4" id="page-block">
                <h5 class="card-header">Discount</h5>
                <div class="card-body">
                    <div class="block-ui-btn demo-inline-spacing">

                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-dark dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-truck"></i>Discount
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

                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-dark dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-truck"></i>Coupon Code
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
                    </div>
                </div>
            </div>
        </div>
        <!-- Discount -->


        {{--Role & Permissinon --}}
        {{--        Admin--}}
        {{--        <div class="col-xl-4 col-12">--}}
        {{--            <div class="card mb-4" id="page-block">--}}
        {{--                <h5 class="card-header">Role & Permission</h5>--}}
        {{--                <div class="card-body">--}}
        {{--                    <div class="block-ui-btn demo-inline-spacing">--}}

        {{--                        <div class="btn-group mb-2">--}}
        {{--                            <button type="button" class="btn btn-label-dark dropdown-toggle" data-bs-toggle="dropdown"--}}
        {{--                                    aria-expanded="false">--}}
        {{--                                <i class="menu-icon tf-icons ti ti-truck"></i>Category--}}
        {{--                            </button>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--Role & permission--}}


    </div>
    <!-- /Block UI -->
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
