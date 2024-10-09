@extends('layouts/layoutMaster')

@section('title', 'Central Warehouse Menu')

@section('content')

    <h4 class="py-3 mb-4">Central Warehouse </h4>

    <!-- Block UI -->
    <div class="row">

        <div class="col-xl-12 col-12">
            <div class="card mb-4" id="card-block">
                <div class="card-body">
                    <div class="block-ui-btn demo-inline-spacing">

                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-dark dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-users"></i>GRN
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="{{route('create-grn')}}"><i
                                        class="ti ti-pencil me-1"></i>
                                    Create</a>
                                <a class="dropdown-item" href="#"><i
                                        class="ti ti-pencil me-1"></i>
                                    List</a>
                            </div>
                        </div>

                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-dark dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-users"></i>Stock In
                            </button>
                            <div class="dropdown-menu" style="">
                                {{--Add inventory by P.O. --}}
                                <a class="dropdown-item" href="{{route('bulkInward')}}"><i
                                        class="ti ti-pencil me-1"></i>
                                    Bulk Inward</a>

                                {{--Add inventory by Scan --}}
                                <a class="dropdown-item" href="{{route('singleInward')}}"><i
                                        class="ti ti-pencil me-1"></i>
                                    Single Inward</a>

                                <a class="dropdown-item" href=""><i
                                        class="ti ti-eye me-1"></i>
                                    QC report</a>


                            </div>
                        </div>

                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-dark dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-building-warehouse"></i>Inventory Management
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="{{route('WarehouseInventory.index')}}"><i
                                        class="ti ti-eye me-1"></i>
                                    Inventory List</a>
                                <a class="dropdown-item" href="#"><i
                                        class="ti ti-eye me-1"></i>
                                    History</a>
                            </div>
                        </div>

                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-dark dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-building-warehouse"></i>Inventory Transfer
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="#"><i
                                        class="ti ti-pencil me-1"></i>
                                    Create</a>
                                <a class="dropdown-item" href="#"><i
                                        class="ti ti-eye me-1"></i>
                                    List</a>
                            </div>
                        </div>
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-dark dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-building-warehouse"></i>Shelf Manage
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="{{route('create-shelf')}}"><i
                                        class="ti ti-pencil me-1"></i>
                                    Create</a>
                                <a class="dropdown-item" href="#"><i
                                        class="ti ti-eye me-1"></i>
                                    List</a>
                                <a class="dropdown-item" href="#"><i
                                        class="ti ti-eye me-1"></i>
                                    Shelf Design</a>
                            </div>
                        </div>

                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-dark dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-building-warehouse"></i>Pick
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="{{route('pending-list-pick')}}"><i
                                        class="ti ti-pencil me-1"></i>
                                    Pending List</a>

                                <a class="dropdown-item" href="{{route('create-pick')}}"><i
                                        class="ti ti-pencil me-1"></i>
                                    Pick Create</a>
                                <a class="dropdown-item" href="#"><i
                                        class="ti ti-eye me-1"></i>
                                    Pick List</a>
                            </div>
                        </div>

                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-dark dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-building-warehouse"></i>Pack
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="{{route('create-pack')}}"><i
                                        class="ti ti-pencil me-1"></i>
                                    Pack Create</a>
                                <a class="dropdown-item" href="#"><i
                                        class="ti ti-eye me-1"></i>
                                    Pack List</a>
                            </div>
                        </div>

                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-dark dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-building-warehouse"></i>Outward (dispatch)
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="{{route('pending-outward')}}"><i
                                        class="ti ti-pencil me-1"></i>
                                    Pending</a>
                                <a class="dropdown-item" href="#"><i
                                        class="ti ti-eye me-1"></i>
                                    List</a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Block UI -->
@endsection

