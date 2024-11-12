@extends('layouts/layoutMaster')

@section('title', 'Picker-Assign ')


@section('content')
    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/centralWarehouseMaster') }}">Central Warehouse</a>
            </li>
            <li class="breadcrumb-item active">Picker</li>
            <li class="breadcrumb-item active">Assign</li>
        </ol>
    </nav>
    <!-- Invoice List Widget -->

    <form method="post" action="{{route('picker.index')}}" enctype="multipart/form-data">
    @csrf

        <div class="card">
            <div class="text-white rounded-top bg-primary p-2">
                Picker Assign
            </div>
            <div class="card-body">
                <div class="content">

                    <div class="row">

                        {{-- Example --}}
                        {{-- {{!! textInputField('div.class', 'label', 'inputType', 'name', 'id', 'placeholder', 'star', 'defaultValue', 'required')}} --}}

                        {{--                    Category--}}

                        <div class="col-md-2">
                            <label for="order_num">Order ID</label>
                            <div class="input-group">
                                <input readonly type="text" name="order_num" class="form-control"
                                       value="{{$allocatedStocks->order_id}}"/>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <label for="shop_name">Shop Name</label>
                            <div class="input-group">
                                <input readonly type="text" name="shop_name" class="form-control"
                                       value="{{$allocatedStocks->store->store_name}}"/>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label" for="picker_id">Picker</label>
                            <select required id="picker_id" name="picker_id"
                                    class="select2 select21 form-select"
                                    data-placeholder="Select Picker">
                                <option value="">Select</option>
                                @foreach($pickers as $picker)
                                    <option value="{{$picker->id}}">{{$picker->emp_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label" for="category_id">Category</label>
                            <select required id="category_id" name="category_id"
                                    class="select2 select21 form-select"
                                    data-placeholder="Select Category">
                                <option value="">Select</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
            </div>
        </div>

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

        <div class="px-0 mt-3">
            <div class="col-lg-2 col-md-12 col-sm-12">
                <button type="submit" class="btn btn-primary d-grid w-100">Submit</button>
            </div>
        </div>
    </form>

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

        {{--var categoryId = --}}

        {{--$('#datatable-list').DataTable({--}}
        {{--    autoWidth: false,--}}
        {{--    lengthMenu: [--}}
        {{--        [10, 20, 100, 500],--}}
        {{--        [10, 20, 100, "All"]--}}
        {{--    ],--}}
        {{--    order: [--}}
        {{--        [0, 'asc']--}}
        {{--    ],--}}
        {{--    "ajax": {--}}
        {{--        "url": "{{ route('stockProduct') }}",--}}
        {{--        "type": "POST",--}}
        {{--        "headers": "{ 'X-CSRF-TOKEN': $('meta[name='csrf-token']').attr('content') }",--}}
        {{--        "data": {--}}
        {{--            "":"",--}}
        {{--            "_token": "{{ csrf_token() }}"--}}
        {{--        },--}}
        {{--    },--}}

        {{--    "initComplete": function (setting, json) {--}}
        {{--        $("#overlay").fadeOut(100);--}}
        {{--    },--}}
        {{--    bDestroy: true--}}
        {{--});--}}
    </script>
@endsection
