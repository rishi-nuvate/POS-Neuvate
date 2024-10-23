@extends('layouts/layoutMaster')

@section('title', 'List-SKU')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/toastr/toastr.css') }}"/>
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/toastr/toastr.js') }}"></script>
@endsection

@section('content')
    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{url('/centralWarehouseMaster')}}">Central Warehouse</a>
            </li>
            <li class="breadcrumb-item active">Inventory</li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </nav>
    <!-- Master Tags List -->

    <div class="card mb-2">
        <div class="border-bottom d-none" id="filter-search">
            <div class="text-white rounded-top bg-primary p-2 cursor-pointer" title="click here to close filters"
                 onclick="$('#filter-search').toggleClass('d-none');"><i class="fa fa-search"></i> Search &amp;
                Filters
            </div>
            <div class="card-body row">

                {{--                    Category--}}
                <div class="col-md-3 mt-3">
                    <label class="form-label" for="warehouse_id">Warehouse</label>
                    <select required id="warehouse_id" name="warehouse_id"
                            class="select2 select21 form-select"
                            data-placeholder="Select Warehouse" onchange="getAllFilters(); getBarcode()">
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
                            data-placeholder="Select Category" onchange="getSubCategoriesData(); getBarcode()">
                        <option value="">Select</option>

                    </select>
                </div>

                {{--                    Subcategory--}}
                <div class="col-md-3 mt-3">
                    <label class="form-label" for="sub_cat_id">Sub Category</label>
                    <select required id="sub_cat_id" name="sub_cat_id"
                            class="select2 select21 form-select" data-allow-clear="true"
                            data-placeholder="Select Store Rating" onchange="getBarcode()">
                        <option value="">Select</option>
                        {{--                            @foreach($companies as $company)--}}
                        {{--                                <option value="{{$company->id}}">{{$company->CompanyName}}</option>--}}
                        {{--                            @endforeach--}}
                    </select>
                </div>

                {{--                    Products--}}
                <div class="col-md-3 mt-3">
                    <label class="form-label" for="product_id">Products</label>
                    <select required id="product_id" name="product_id[]"
                            class="select2 select21 form-select" data-allow-clear="true"
                            data-placeholder="Select Store Rating" multiple onchange="getBarcode()">
                        <option value="">Select</option>
                        <option value="all">All</option>

                    </select>
                </div>


                {{--                    Product Tags--}}
                <div class="col-md-3 mt-3">
                    <label class="form-label" for="tag_id">Product Tags</label>
                    <select required id="tag_id" name="tag_id[]"
                            class="select2 select21 form-select" data-allow-clear="true"
                            data-placeholder="Select Store Rating" onchange="getBarcode()" multiple>
                        <option value="">Select</option>

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

    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table" id="datatable-list">
                <thead>
                <tr>
                    <th>SR No.</th>
                    <th>Product Name</th>
                    <th>SKU Num</th>
                    <th>Total Inventory</th>
                    <th>PRICE</th>
                    <th>Good Inventory</th>
                    <th>Bad Inventory</th>
                    <th>Rack column</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection


@section('page-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>

    <script>
        window.onload = function () {
            getBarcode();
        }

        function getBarcode() {

            var warehouse = document.getElementById('warehouse_id').value;
            var category = document.getElementById('cat_id').value;
            var subCategory = document.getElementById('sub_cat_id').value;
            var product = document.getElementById('product_id').value;

            // console.log(warehouse);
            // console.log(category);
            // console.log(subCategory);
            console.log(product);


            $("#overlay").fadeIn(100);
            $('#datatable-list').DataTable({
                autoWidth: false,
                lengthMenu: [
                    [10, 20, 100, 500],
                    [10, 20, 100, "All"]
                ],

                order: [
                    [1, 'asc']
                ],
                "ajax": {
                    "url": "{{ route('getInventory') }}",
                    "type": "POST",
                    "headers": "{ 'X-CSRF-TOKEN': $('meta[name='csrf-token']').attr('content') }",
                    "data": {
                        "warehouse": warehouse,
                        "category": category,
                        "subCategory": subCategory,
                        "product": product,
                        "_token": "{{ csrf_token() }}"
                    },
                },

                "initComplete": function (setting, json) {
                    $("#overlay").fadeOut(100);
                },
                bDestroy: true,
                dom:
                    '<"row me-2"' +
                    '<"col-md-2"<"me-3"l>>' +
                    '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>' +
                    '>t' +
                    '<"row mx-2"' +
                    '<"col-sm-12 col-md-6"i>' +
                    '<"col-sm-12 col-md-6"p>' +
                    '>',
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
                                            console.log(el);
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
                ],
            });
        }

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

                        // Tag
                        $('#tag_id').empty().append(
                            '<option value="">Select Sub Category</option>');
                        $.each(response.tags, function (key, value) {
                            $('#tag_id').append('<option value="' + value.id + '">' + value
                                .name + '</option>');
                        });

                        // Products
                        $('#product_id').empty().append(
                            '<option value="">Select Product</option>');
                        $.each(response.products, function (key, value) {
                            $('#product_id').append('<option value="' + value.id + '">' + value
                                .product_name + '</option>');
                        });
                    }
                });
            } else {
                $('#subCategory').empty().append('<option value="">Select Sub Category</option>');
            }
        }

        function deleteBarcode(barcodeId) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: false,
                confirmButtonText: "Yes, Approve it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#overlay").fadeIn(100);
                    $.ajax({
                        type: 'POST',
                        url: '/deleteBarcode/' + barcodeId,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            barcodeId: barcodeId,
                            "_token": "<?php echo e(csrf_token()); ?>"
                        },
                        success: function (resultData) {
                            Swal.fire('Done', 'Successfully! Done', 'success').then(() => {
                                location.reload();
                                $("#overlay").fadeOut(100);
                            });
                        }
                    });
                }
            });
        }
    </script>
@endsection
