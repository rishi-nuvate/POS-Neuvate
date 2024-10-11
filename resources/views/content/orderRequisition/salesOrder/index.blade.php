@extends('layouts.layoutMaster')

@section('title', 'List-Company')

@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
@endsection

@section('content')
    <section class="invoice-list-wrapper">
        <h5 class="py-2 mb-2"><i class="fa fa-list px-1"></i> <span class="text-muted fw-light"> Po / </span>List</h5>

        <!-- DataTable with Buttons -->
        <div class="card mb-2">
            <div class="border-bottom d-none" id="filter-search">
                <div class="text-white rounded-top bg-primary p-2 cursor-pointer" title="click here to close filters"
                     onclick="$('#filter-search').toggleClass('d-none');"><i class="fa fa-search"></i> Search &amp;
                    Filters
                </div>
                <div class="card-body row">

                    {{--                    Dates--}}
                    {{--                    <div class="mt-3 col-md-3 col-lg-3">--}}
                    {{--                        <label class="form-label" for="type">Date range</label>--}}
                    {{--                        <span class="form-group form-control-sm">--}}
                    {{--                                <div id="dateRange" class="pull-right"--}}
                    {{--                                     style="background: #fff; cursor: pointer; padding: 8px 10px; border: 1px solid #ccc; width: 100%">--}}
                    {{--                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;--}}
                    {{--                                    <span></span> <b class="caret"></b>--}}
                    {{--                                </div>--}}
                    {{--                                <input type="hidden" id="startDateShow">--}}
                    {{--                                <input type="hidden" id="endDateShow">--}}
                    {{--                            </span>--}}
                    {{--                    </div>--}}

                    {{--                    Store Rating--}}
                    <div class="col-md-3 mt-3">
                        <label class="form-label" for="store_id">Store Rating</label>
                        <select required id="store_rating" name="store_rating"
                                class="select2 select21 form-select" data-allow-clear="true"
                                data-placeholder="Select Store Rating">
                            <option value="">Select</option>
                            <option value="1">A++</option>
                            <option value="2">A+</option>
                            <option value="3">B</option>
                            {{--                            @foreach($companies as $company)--}}
                            {{--                                <option value="{{$company->id}}">{{$company->CompanyName}}</option>--}}
                            {{--                            @endforeach--}}
                        </select>
                    </div>

                    {{--                    Store--}}
                    <div class="col-md-3 mt-3">
                        <label class="form-label" for="store_id">Store </label>
                        <select required id="store_id" name="store_id[]"
                                class="select2 select21 form-select" data-allow-clear="true"
                                data-placeholder="Select Store" multiple>
                            <option value="">Select</option>

                        </select>
                    </div>

                    {{--                    Category--}}
                    <div class="col-md-3 mt-3">
                        <label class="form-label" for="warehouse_id">Warehouse</label>
                        <select required id="warehouse_id" name="warehouse_id"
                                class="select2 select21 form-select"
                                data-placeholder="Select Warehouse" onchange="getAllFilters()">
                            <option value="">Select</option>
                            @foreach($warehouses as $warehouse)
                                <option value="{{$warehouse->id}}">{{$warehouse->warehouse_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    {{--                    Category--}}
                    <div class="col-md-3 mt-3">
                        <label class="form-label" for="cat_id">Category</label>
                        <select required id="cat_id" name="cat_id"
                                class="select2 select21 form-select" data-allow-clear="true"
                                data-placeholder="Select Category" onchange="getSubCategoriesData()">
                            <option value="">Select</option>

                        </select>
                    </div>

                    {{--                    Subcategory--}}
                    <div class="col-md-3 mt-3">
                        <label class="form-label" for="sub_cat_id">Sub Category</label>
                        <select required id="sub_cat_id" name="sub_cat_id"
                                class="select2 select21 form-select" data-allow-clear="true"
                                data-placeholder="Select Store Rating">
                            <option value="">Select</option>
                            {{--                            @foreach($companies as $company)--}}
                            {{--                                <option value="{{$company->id}}">{{$company->CompanyName}}</option>--}}
                            {{--                            @endforeach--}}
                        </select>
                    </div>

                    {{--                    Season--}}
                    <div class="col-md-3 mt-3">
                        <label class="form-label" for="season_id">season</label>
                        <select required id="season_id" name="season_id"
                                class="select2 select21 form-select" data-allow-clear="true"
                                data-placeholder="Select Store Rating">
                            <option value="">Select</option>

                        </select>
                    </div>

                    {{--                    Products--}}
                    <div class="col-md-3 mt-3">
                        <label class="form-label" for="product_id">Products</label>
                        <select required id="product_id" name="product_id[]"
                                class="select2 select21 form-select" data-allow-clear="true"
                                data-placeholder="Select Store Rating" multiple>
                            <option value="">Select</option>
                            <option value="all">All</option>

                        </select>
                    </div>


                    {{--                    Product Tags--}}
                    <div class="col-md-3 mt-3">
                        <label class="form-label" for="tag_id">Product Tags</label>
                        <select required id="tag_id" name="tag_id[]"
                                class="select2 select21 form-select" data-allow-clear="true"
                                data-placeholder="Select Store Rating" onchange="getData()" multiple>
                            <option value="">Select</option>

                        </select>
                    </div>
                    {{--                    Store tags--}}
                    <div class="col-md-3 mt-3">
                        <label class="form-label" for="store_tag">Store Tag</label>
                        <select required id="store_tag" name="store_tag[]"
                                class="select2 select21 form-select" data-allow-clear="true"
                                data-placeholder="Select Store Rating" multiple>
                            <option value="">Select</option>
                            {{--                            @foreach($companies as $company)--}}
                            {{--                                <option value="{{$company->id}}">{{$company->CompanyName}}</option>--}}
                            {{--                            @endforeach--}}
                        </select>
                    </div>

                </div>
            </div>
            <div title="click here to view filters" class="bg-primary text-white p-1 cursor-pointer"
                 onclick="$('#filter-search').toggleClass('d-none');">
        <span><b><i class="ti ti-filter"></i>Applied Filter</b> :-
          <small class="m-2" id="dateFilterShow"></small>
        </span>
            </div>
        </div>
        <div class="mt-1 card">
            <div class="card card-datatable table-responsive">
                <table class="cell-border invoice-list-table dataTable table" id="datatable-list">
                    <thead class="table-secondary text-bold">
                    <tr>
                        <th>Sr. No.</th>
                        <th>Company Name</th>
                        <th>Shipping Address</th>
                        <th>Vendor</th>
                        <th>Po No</th>
                        <th>Product</th>
                        <th>Unit Price</th>
                        <th>Total Qty</th>
                        <th>Tax</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection

@section('page-script')

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>

        function formatDate(dateStr) {
            return dateStr.split('-').reverse().join('-');
        }


        function getDateFind(start, end) {
            $('#dateRange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            var startDateFormat = new Date(start.format('MMMM D, YYYY'));
            var startDate = new Date(startDateFormat.getTime() - (startDateFormat.getTimezoneOffset() * 60000))
                .toISOString()
                .split('T')[0];

            var endDateFormat = new Date(end.format('MMMM D, YYYY'));
            var endDate = new Date(endDateFormat.getTime() - (endDateFormat.getTimezoneOffset() * 60000))
                .toISOString()
                .split('T')[0];
            $('#startDateShow').val(startDate);
            $('#endDateShow').val(endDate);
            getData(startDate, endDate);
        }

        // getDateFind();


        getData();

        function getData() {

            var warehouseId = document.getElementById('warehouse_id').value;
            var categoryId = document.getElementById('cat_id').value;
            var subCategoryId = document.getElementById('sub_cat_id').value;
            var seasonId = document.getElementById('season_id').value;
            var tags = document.getElementById('tag_id').value;
            var productId = document.getElementById('product_id').value;

            // $('#overlay').fadeIn(100);
            // if (startDate === undefined || startDate === '') {
            //     startDate = $('#startDateShow').val();
            // }
            // if (endDate === undefined || endDate === '') {
            //     endDate = $('#endDateShow').val();
            // }
            // if ($.fn.DataTable.isDataTable('#po-datatable-list')) {
            //     $('#po-datatable-list').DataTable().destroy();
            // }

            var dtInvoiceTable = $('#datatable-list');

            // if (startDate !== '') {
            //     $('#dateFilterShow').html('<b>Date Range</b> : ' + formatDate(startDate) + ' to ' + formatDate(endDate));
            // }

            if (dtInvoiceTable.length) {
                var table = dtInvoiceTable.DataTable({
                    scrollX: true,
                    processing: true,
                    serverSide: true,
                    order: [[0, "desc"]],
                    ajax: {
                        'url': "{{ route('getStockAllocation') }}",
                        'type': 'POST',
                        'headers': '{ \'X-CSRF-TOKEN\': $(\'meta[name=\'csrf-token\']\').attr(\'content\') }',
                        'data': {
                            'warehouseId': warehouseId,
                            'categoryId': categoryId,
                            'subCategoryId': subCategoryId,
                            'seasonId': seasonId,
                            'tags': tags,
                            'productId': productId,
                            '_token': "{{ csrf_token() }}"
                        }
                    },
                    'initComplete': function (setting, json) {
                        $('.dataTables_filter input').removeClass('form-control-sm');
                        $('.dataTables_length select').removeClass('form-select-sm');
                        $('#overlay').fadeOut(100);
                    },
                    dom:
                        '<"row me-2"' +
                        '<"col-md-2"<"me-3"l>>' +
                        '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>' +
                        '>t' +
                        '<"row mx-2"' +
                        '<"col-sm-12 col-md-6"i>' +
                        '<"col-sm-12 col-md-6"p>' +
                        '>',
                    language: {
                        sLengthMenu: '_MENU_',
                        search: '',
                        searchPlaceholder: 'Search..'
                    },
                    // Buttons with Dropdown
                    buttons: [
                        {
                            extend: 'collection',
                            className: 'btn btn-label-primary dropdown-toggle mx-3',
                            text: '<i class="ti ti-screen-share me-1 ti-xs"></i>Export',
                            buttons: [
                                {
                                    extend: 'print',
                                    text: '<i class="ti ti-printer me-2" ></i>Print',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        format: {
                                            body: function (inner, coldex, rowdex) {
                                                if (inner.length <= 0) return inner;
                                                var el = $.parseHTML(inner);
                                                var result = '';
                                                $.each(el, function (index, item) {
                                                    if (item.classList !== undefined && item.classList.contains('user-name')) {
                                                        result = result + item.lastChild.firstChild.textContent;
                                                    } else if (item.innerText === undefined) {
                                                        result = result + item.textContent;
                                                    } else result = result + item.innerText;
                                                });
                                                return result;
                                            }
                                        }
                                    },
                                    customize: function (win) {
                                        //customize print view for dark
                                        $(win.document.body)
                                            .css('color', headingColor)
                                            .css('border-color', borderColor)
                                            .css('background-color', bodyBg);
                                        $(win.document.body)
                                            .find('table')
                                            .addClass('compact')
                                            .css('color', 'inherit')
                                            .css('border-color', 'inherit')
                                            .css('background-color', 'inherit');
                                    }
                                },
                                {
                                    extend: 'csv',
                                    text: '<i class="ti ti-file-text me-2" ></i>Csv',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        format: {
                                            body: function (inner, coldex, rowdex) {
                                                if (inner.length <= 0) return inner;
                                                var el = $.parseHTML(inner);
                                                var result = '';
                                                $.each(el, function (index, item) {
                                                    if (item.classList !== undefined && item.classList.contains('user-name')) {
                                                        result = result + item.lastChild.firstChild.textContent;
                                                    } else if (item.innerText === undefined) {
                                                        result = result + item.textContent;
                                                    } else result = result + item.innerText;
                                                });
                                                return result;
                                            }
                                        }
                                    }
                                },
                                {
                                    extend: 'excel',
                                    text: '<i class="ti ti-file-spreadsheet me-2"></i>Excel',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        format: {
                                            body: function (inner, coldex, rowdex) {
                                                if (inner.length <= 0) return inner;
                                                var el = $.parseHTML(inner);
                                                var result = '';
                                                $.each(el, function (index, item) {
                                                    if (item.classList !== undefined && item.classList.contains('user-name')) {
                                                        result = result + item.lastChild.firstChild.textContent;
                                                    } else if (item.innerText === undefined) {
                                                        result = result + item.textContent;
                                                    } else result = result + item.innerText;
                                                });
                                                return result;
                                            }
                                        }
                                    }
                                },
                                {
                                    extend: 'pdf',
                                    text: '<i class="ti ti-file-code-2 me-2"></i>Pdf',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        format: {
                                            body: function (inner, coldex, rowdex) {
                                                if (inner.length <= 0) return inner;
                                                var el = $.parseHTML(inner);
                                                var result = '';
                                                $.each(el, function (index, item) {
                                                    if (item.classList !== undefined && item.classList.contains('user-name')) {
                                                        result = result + item.lastChild.firstChild.textContent;
                                                    } else if (item.innerText === undefined) {
                                                        result = result + item.textContent;
                                                    } else result = result + item.innerText;
                                                });
                                                return result;
                                            }
                                        }
                                    }
                                },
                                {
                                    extend: 'copy',
                                    text: '<i class="ti ti-copy me-2" ></i>Copy',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        format: {
                                            body: function (inner, coldex, rowdex) {
                                                if (inner.length <= 0) return inner;
                                                var el = $.parseHTML(inner);
                                                var result = '';
                                                $.each(el, function (index, item) {
                                                    if (item.classList !== undefined && item.classList.contains('user-name')) {
                                                        result = result + item.lastChild.firstChild.textContent;
                                                    } else if (item.innerText === undefined) {
                                                        result = result + item.textContent;
                                                    } else result = result + item.innerText;
                                                });
                                                return result;
                                            }
                                        }
                                    }
                                }
                            ]
                        },
                        {
                            text: '<i class="ti ti-filter me-md-1"></i><span class="d-md-inline-block d-none"></span>',
                            className: 'btn btn-primary',
                            action: function (e, dt, button, config) {
                                $('#filter-search').toggleClass('d-none');
                            }
                        }
                    ]
                });
            }
            // $('div.dataTables_filter input', table.table().container()).attr('title', 'search');
        }

        {{--function daletePo(PoId) {--}}
        {{--    Swal.fire({--}}
        {{--        title: "Are you sure?",--}}
        {{--        text: "You won't be able to revert this!",--}}
        {{--        icon: "warning",--}}
        {{--        showCancelButton: false,--}}
        {{--        confirmButtonText: "Yes, Approve it!"--}}
        {{--    }).then((result) => {--}}
        {{--        if (result.isConfirmed) {--}}
        {{--            $("#overlay").fadeIn(100);--}}
        {{--            $.ajax({--}}
        {{--                type: 'POST',--}}
        {{--                url: "{{ route('deletePurchaseOrder') }}",--}}
        {{--                headers: {--}}
        {{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
        {{--                },--}}
        {{--                data: {--}}
        {{--                    PoId: PoId,--}}
        {{--                    "_token": "{{ csrf_token() }}"--}}
        {{--                },--}}
        {{--                success: function (resultData) {--}}
        {{--                    Swal.fire('Done', 'Successfully! Done', 'success').then(() => {--}}
        {{--                        location.reload();--}}
        {{--                        $("#overlay").fadeOut(100);--}}
        {{--                    });--}}
        {{--                }--}}
        {{--            });--}}
        {{--        }--}}
        {{--    });--}}
        {{--}--}}

        function getSubCategoriesData() {
            var categoryId = document.getElementById('cat_id').value;
            if (categoryId) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo e(route('getSubCategories')); ?>',
                    data: {
                        categoryId: categoryId,
                        '_token': "<?php echo e(csrf_token()); ?>",
                    },
                    dataType: 'json',
                    success: function (response) {
                        $('#sub_cat_id').empty().append(
                            '<option value="">Select Sub Category</option>');
                        $.each(response, function (key, value) {
                            $('#sub_cat_id').append('<option value="' + value.id + '">' + value
                                .name + '</option>');
                        });
                    }
                });
            } else {
                $('#subCategory').empty().append('<option value="">Select Sub Category</option>');
            }
        }

        function getAllFilters() {
            var warehouseId = document.getElementById('warehouse_id').value;
            if (warehouseId) {
                $.ajax({
                    type: 'POST',
                    url: '{{route('getAllFilters')}}',
                    data: {
                        categoryId: 6,
                        '_token': "<?php echo e(csrf_token()); ?>",
                    },
                    dataType: 'json',
                    success: function (response) {

                        // Category
                        $('#cat_id').empty().append(
                            '<option value="">Select Category</option>');
                        $.each(response.categories, function (key, value) {
                            $('#cat_id').append('<option value="' + value.id + '">' + value
                                .name + '</option>');
                        });

                        // Season
                        $('#season_id').empty().append(
                            '<option value="">Select Sub Category</option>');
                        $.each(response.seasons, function (key, value) {
                            $('#season_id').append('<option value="' + value.id + '">' + value
                                .name + '</option>');
                        });

                        // Tag
                        $('#tag_id').empty().append(
                            '<option value="">Select Sub Category</option>');
                        $.each(response.tags, function (key, value) {
                            $('#tag_id').append('<option value="' + value.id + '">' + value
                                .name + '</option>');
                        });

                        // Products
                        $('#product_id').empty().append(
                            '<option value="">Select Sub Category</option>');
                        $.each(response.products, function (key, value) {
                            $('#product_id').append('<option value="' + value.id + '">' + value
                                .product_name + '</option>');
                        });

                        // Stores
                        $('#store_id').empty().append(
                            '<option value="">Select Store</option>');
                        $.each(response.stores, function (key, value) {
                            $('#store_id').append('<option value="' + value.id + '">' + value
                                .store_name + '</option>');
                        });

                    }
                });
            } else {
                $('#subCategory').empty().append('<option value="">Select Sub Category</option>');
            }
        }

    </script>
@endsection
