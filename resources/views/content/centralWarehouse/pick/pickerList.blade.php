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

    <div class="card mt-3">
        <div class="card card-datatable table-responsive">
            <div id="datatable-list_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <table class="cell-border invoice-list-table dataTable table" id="datatable-list"
                       aria-describedby="datatable-list_info">
                    <thead>
                    <tr>
                        <th>SR No.</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Check Box</th>
                        {{--                            <th>Action</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <div class="d-flex justify-content-start align-items-center user-name">
                                <div class="d-flex flex-column"><span
                                        class="emp_name text-truncate">Jeans</span><small
                                        class="emp_post text-truncate text-muted"></small></div>
                            </div>
                        </td>
                        <td>
                            <button type="button" class="m-2 btn btn-sm btn-outline-primary round waves-effect">
                                Jeans
                            </button>
                        </td>
                        <td>
                            <button type="button" class="m-2 btn btn-md btn-outline-success round waves-effect">50
                            </button>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div class="d-flex justify-content-start align-items-center user-name">
                                <div class="d-flex flex-column"><span
                                        class="emp_name text-truncate">cargo Jeans</span><small
                                        class="emp_post text-truncate text-muted"></small></div>
                            </div>
                        </td>
                        <td>
                            <button type="button" class="m-2 btn btn-sm btn-outline-primary round waves-effect">
                                Jeans
                            </button>
                        </td>
                        <td>
                            <button type="button" class="m-2 btn btn-md btn-outline-success round waves-effect">50
                            </button>
                        </td>
                        <td>
                            <div class="form-check" >
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <div class="d-flex justify-content-start align-items-center user-name">
                                <div class="d-flex flex-column"><span
                                        class="emp_name text-truncate">Blue Jeans</span><small
                                        class="emp_post text-truncate text-muted"></small></div>
                            </div>
                        </td>
                        <td>
                            <button type="button" class="m-2 btn btn-sm btn-outline-primary round waves-effect">
                                Jeans
                            </button>
                        </td>
                        <td>
                            <button type="button" class="m-2 btn btn-md btn-outline-success round waves-effect">50
                            </button>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


{{--    <div class="card">--}}
{{--        <div class="card-datatable table-responsive pt-0">--}}
{{--            <table class="datatables-basic table" id="datatable-list">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th>SR No.</th>--}}
{{--                    <th>Shop Name</th>--}}
{{--                    <th>Remaining Quantity</th>--}}
{{--                    <th>Alloted Quantity</th>--}}
{{--                    <th>Edit</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @php $num = 1 @endphp--}}
{{--                @foreach($allocatedStocks as $allocatedStock)--}}
{{--                    <tr>--}}
{{--                        <td>{{$num}}</td>--}}
{{--                        <td>--}}
{{--                            <div class="d-flex justify-content-start align-items-center user-name">--}}
{{--                                <div class="d-flex flex-column"><span--}}
{{--                                        class="emp_name text-truncate">{{$allocatedStock->store->store_name}}</span><small--}}
{{--                                        class="emp_post text-truncate text-muted">{{$allocatedStock->store->store_code}}</small></div>--}}
{{--                            </div>--}}
{{--                        </td>--}}
{{--                        <td>{{$allocatedStock->total_qty}}</td>--}}
{{--                        <td>0</td>--}}
{{--                        <td>--}}
{{--                            <a href="{{route('create-picker',$allocatedStock->id)}}" type="button" data-bs-target="#edit"--}}
{{--                               class="btn btn-outline-success waves-effect">--}}
{{--                                <span class="ti ti-pencil ti-md"></span>Start--}}
{{--                            </a>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    @php$num++ @endphp--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
{{--    </div>--}}

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

