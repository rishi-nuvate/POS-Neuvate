@extends('layouts/layoutMaster')

@section('title', 'Order Requisition Menu')

@section('content')

    <h4 class="py-3 mb-4">Order Requisition </h4>

    <!-- Block UI -->
    <div class="row">

        <div class="col-xl-12 col-12">
            <div class="card mb-4" id="card-block">
                <div class="card-body">
                    <div class="block-ui-btn demo-inline-spacing">

                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-dark dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-users"></i>Stock Allocation
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="{{route('create-salesOrder')}}"><i
                                        class="ti ti-pencil me-1"></i>
                                    Create</a>
                                <a class="dropdown-item" href="{{route('stockAllocation.index')}}"><i
                                        class="ti ti-eye me-1"></i>
                                    List</a>
                                <a class="dropdown-item" href=""><i
                                        class="ti ti-eye me-1"></i>
                                    Upload</a>
                            </div>
                        </div>


                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-dark dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-users"></i>Reports
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="#"><i
                                        class="ti ti-pencil me-1"></i>
                                    WIP & Instock</a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Block UI -->
@endsection

