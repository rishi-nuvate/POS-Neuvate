@extends('layouts/layoutMaster')

@section('title', 'Create-Pick ')


@section('content')
    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/centralWarehouseMaster') }}">Central Warehouse</a>
            </li>
            <li class="breadcrumb-item active">Picker</li>
            <li class="breadcrumb-item active">List</li>
        </ol>
    </nav>

    <!-- Invoice List Widget -->
    <div class="card">
        <div class="text-white rounded-top bg-primary p-2">
            Filter
        </div>
        <div class="card-body">
            <div class="content">

                <div class="row">

                    {{-- Example --}}
                    {{-- {{!! textInputField('div.class', 'label', 'inputType', 'name', 'id', 'placeholder', 'star', 'defaultValue', 'required')}} --}}

                    {{--Category--}}

                    <div class="col-md-3">
                        <label class="form-label" for="picker_id">Picker</label>
                        <select required id="picker_id" name="picker_id"
                                class="select2 select21 form-select"
                                data-placeholder="Select Picker" onchange="getPicker()">
                            <option value="">Select</option>
                            <option value="all">All</option>
                            @foreach($pickers as $picker)
                                <option value="{{$picker->id}}">{{$picker->emp_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label" for="store_id">Store</label>
                        <select id="store_id" name="store_id"
                                class="select2 select21 form-select"
                                data-placeholder="Select Store" onchange="getPicker()">
                            <option value="">Select</option>
                            <option value="all">All</option>
                            @foreach($Stores as $Store)
                                <option value="{{$Store->id}}">{{$Store->store_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="order_id">Picker</label>
                        <select required id="order_id" name="order_id"
                                class="select2 select21 form-select"
                                data-placeholder="Select Picker" onchange="getPicker()">
                            <option value="">Select</option>
                            <option value="all">All</option>
                            @foreach($orders as $order)
                                <option value="{{$order->id}}">{{$order->order_id}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card card-datatable ">
            <div id="datatable-list_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <table class="cell-border invoice-list-table dataTable table table-responsive" id="datatable-list"
                       aria-describedby="datatable-list_info">
                    <thead>
                    <tr>
                        <th>SR No.</th>
                        <th>Order No.</th>
                        <th>Picker</th>
                        <th>Store</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--                    <tr>--}}
                    {{--                        <td>1</td>--}}
                    {{--                        <td>--}}
                    {{--                            <div class="d-flex justify-content-start align-items-center user-name">--}}
                    {{--                                <div class="d-flex flex-column"><span--}}
                    {{--                                        class="emp_name text-truncate">Jeans</span><small--}}
                    {{--                                        class="emp_post text-truncate text-muted"></small></div>--}}
                    {{--                            </div>--}}
                    {{--                        </td>--}}
                    {{--                        <td>--}}
                    {{--                            <button type="button" class="m-2 btn btn-sm btn-outline-primary round waves-effect">--}}
                    {{--                                Jeans--}}
                    {{--                            </button>--}}
                    {{--                        </td>--}}
                    {{--                        <td>--}}
                    {{--                            <button type="button" class="m-2 btn btn-md btn-outline-success round waves-effect">50--}}
                    {{--                            </button>--}}
                    {{--                        </td>--}}
                    {{--                        <td>--}}
                    {{--                            <a href="#"--}}
                    {{--                               type="button" class="btn btn-outline-warning waves-effect" >--}}
                    {{--                                <span class="ti-xs ti ti-note me-1"></span>Create--}}
                    {{--                            </a>--}}
                    {{--                        </td>--}}
                    {{--                    </tr>--}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection


@section('page-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>

    <script>

        window.onload = getPicker;

        function getPicker() {

            var storeId = document.getElementById('store_id').value;
            var pickerId = document.getElementById('picker_id').value;
            var orderId = document.getElementById('order_id').value;

            $('#datatable-list').DataTable().clear().destroy();

            var table = new $('#datatable-list').DataTable({
                autoWidth: false,
                lengthMenu: [
                    [10, 20, 100, 500],
                    [10, 20, 100, "All"]
                ],
                order: [
                    [0, 'asc']
                ],
                "ajax": {
                    "url": "{{ route('getPicker') }}",
                    "type": "POST",
                    "headers": "{ 'X-CSRF-TOKEN': $('meta[name='csrf-token']').attr('content') }",
                    "data": {
                        "storeId": storeId,
                        "pickerId": pickerId,
                        "orderId": orderId,
                        "_token": "{{ csrf_token() }}"
                    },
                },
            });
        }

    </script>
@endsection

