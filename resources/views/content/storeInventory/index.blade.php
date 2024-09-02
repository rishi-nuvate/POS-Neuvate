@extends('layouts/layoutMaster')

@section('title', 'Inventory Menu')

@section('content')

    <h4 class="py-3 mb-4">Store Inventory </h4>

    <!-- Block UI -->
    <div class="row">

        <!-- Customer Data -->
        <div class="col-xl-12 col-12">
            <div class="card mb-4" id="card-block">
                <div class="card-body">
                    <div class="block-ui-btn demo-inline-spacing">

                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-dark dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-users"></i>Inventory
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="{{ url('/inventory') }}"><i
                                        class="ti ti-eye me-1"></i>
                                    View</a>
                            </div>
                        </div>

                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-label-dark dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="menu-icon tf-icons ti ti-users"></i>Stock In
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="{{route('pending-stock-in') }}"><i
                                        class="ti ti-eye me-1"></i>
                                    Pending</a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- Customer Data -->

    </div>
    <!-- /Block UI -->
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
