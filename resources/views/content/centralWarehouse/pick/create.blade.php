@extends('layouts/layoutMaster')

@section('title', 'Create-Pick ')


@section('content')
    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/centralWarehouseMaster') }}">Central Warehouse</a>
            </li>
            <li class="breadcrumb-item active">Picking</li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </nav>

    <!-- Invoice List Widget -->

    {{--    <div class="card mb-3">--}}
    {{--        <div class="card-body">--}}
    {{--            <div class="content">--}}
    {{--                <div class="col-md-12 col-sm-12">--}}
    {{--                    <div class="row gy-sm-2">--}}
    {{--                        <div class="col-sm-6 col-lg-3">--}}
    {{--                            <div--}}
    {{--                                class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-2 pb-sm-0">--}}
    {{--                                <div>--}}
    {{--                                    <p class="mb-0  font-weight-bold">Date</p>--}}
    {{--                                </div>--}}
    {{--                                <span class="me-sm-4 btn-sm btn btn-outline-info">2024-07-30</span>--}}
    {{--                            </div>--}}
    {{--                            <hr class="d-none d-sm-block d-lg-none me-4">--}}
    {{--                        </div>--}}
    {{--                        <div class="col-sm-6 col-lg-3">--}}
    {{--                            <div--}}
    {{--                                class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-2 pb-sm-0">--}}
    {{--                                <div>--}}
    {{--                                    <p class="mb-0  font-weight-bold">Sales Order No.</p>--}}

    {{--                                </div>--}}
    {{--                                <span class="me-sm-4 btn-sm btn btn-outline-primary">#4567</span>--}}

    {{--                            </div>--}}
    {{--                            <hr class="d-none d-sm-block d-lg-none me-4">--}}
    {{--                        </div>--}}
    {{--                        <div class="col-sm-6 col-lg-3">--}}
    {{--                            <div--}}
    {{--                                class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-2 pb-sm-0">--}}
    {{--                                <div>--}}
    {{--                                    <p class="mb-0  font-weight-bold">Total Quantity</p>--}}

    {{--                                </div>--}}
    {{--                                <span class="me-sm-4 btn-sm btn btn-outline-info">300</span>--}}

    {{--                            </div>--}}
    {{--                            <hr class="d-none d-sm-block d-lg-none me-4">--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <div class="card">

        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table" id="datatable-list">
                <thead>
                <tr>
                    <th>SR No.</th>
                    <th>Shop Name</th>
                    <th>Remaining Quantity</th>
                    <th>Alloted Quantity</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                @php $num = 1 @endphp
                @foreach($allocatedStocks as $allocatedStock)
                    <tr>
                        <td>{{$num}}</td>
                        <td>
                            <div class="d-flex justify-content-start align-items-center user-name">
                                <div class="d-flex flex-column"><span
                                        class="emp_name text-truncate">{{$allocatedStock->store->store_name}}</span><small
                                        class="emp_post text-truncate text-muted">{{$allocatedStock->store->store_code}}</small></div>
                            </div>
                        </td>
                        <td>{{$allocatedStock->total_qty}}</td>
                        <td>0</td>
                        <td>
                            <a href="{{route('create-picker',$allocatedStock->id)}}" type="button" data-bs-target="#edit"
                               class="btn btn-outline-success waves-effect">
                                <span class="ti ti-pencil ti-md"></span>Start
                            </a>
                        </td>
                    </tr>
                    @php$num++ @endphp
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection


@section('page-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>

    <script>

        $('#datatable-list').DataTable({
            autoWidth: false,
            lengthMenu: [
                [10, 20, 100, 500],
                [10, 20, 100, "All"]
            ],

            order: [
                [0, 'asc']
            ]
        });
    </script>
@endsection

