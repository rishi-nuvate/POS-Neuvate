@extends('layouts.layoutMaster')

@section('title', 'Stock-Allocation')

@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
@endsection

@section('content')
    <section class="invoice-list-wrapper">

        <nav aria-label="breadcrumb" style="font-size: 20px">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/master') }}">Warehouse</a>
                </li>
                <li class="breadcrumb-item active">
                    <a onclick="selection()">Stock Allocation</a>
                </li>
                <li class="breadcrumb-item active">List</li>
            </ol>
        </nav>

        <div class="row justify-content-center" id="selectType">

            <div class="col-xl-4 col-12">
                <div class="card mb-4" id="page-block">
                    <div class="card-body">
                        <div class="block-ui-btn demo-inline-spacing ">
                            <div class="row d-flex justify-content-center">

                                <div class="col-md-4">
                                    <div class="btn-group mb-2">
                                        <button type="button" onclick="refill()" class="btn btn-primary">
                                            Refill
                                        </button>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="btn-group mb-2">
                                        <button type="button" class="btn btn-primary">
                                            New Stock
                                        </button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--        <div class="card mt-2" >--}}

        {{--        </div>--}}

        <!-- DataTable with Buttons -->
        <form method="post" id="stockRefill" action="{{route('stockAllocation-submit')}}" enctype="multipart/form-data"
              style="display: none">
            @csrf

            <div class="card mb-2">
                <div class="border-bottom d-none" id="filter-search">
                    <div class="text-white rounded-top bg-primary p-2 cursor-pointer"
                         title="click here to close filters"
                         onclick="$('#filter-search').toggleClass('d-none');"><i class="fa fa-search"></i> Search &amp;
                        Filters
                    </div>
                    <div class="card-body row">
                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="store_id">Store Rating</label>
                            <select required id="store_rating" name="store_rating"
                                    onchange="getData()"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select Store Rating">
                                <option value="">Select</option>
                                <option value="1">A++</option>
                                <option value="2">A+</option>
                                <option value="3">B</option>
                            </select>
                        </div>

                        {{--                    Store--}}
                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="store_id">Store </label>
                            <select required id="store_id" name="store_id"
                                    onchange="getData()"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select Store">
                                <option value="">Select</option>
                                @foreach($stores as $store)
                                    <option value="{{$store->id}}">{{$store->store_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        {{--                    Category--}}
                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="warehouse_id">Warehouse</label>
                            <select required id="warehouse_id" name="warehouse_id"
                                    class="select2 select21 form-select"
                                    data-placeholder="Select Warehouse" onchange="getAllFilters();getData()">
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
                                    data-placeholder="Select Category" onchange="getSubCategoriesData();getData()">
                                <option value="">Select</option>

                            </select>
                        </div>
                        <input type="hidden" name="order_id" id="order_id" value="">

                        {{--                    Subcategory--}}
                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="sub_cat_id">Sub Category</label>
                            <select id="sub_cat_id" name="sub_cat_id" onchange="getData()"
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
                            <select id="season_id" name="season_id" onchange="getData()"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select Store Rating">
                                <option value="">Select</option>

                            </select>
                        </div>

                        {{--                    Products--}}
                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="product_id">Products</label>
                            <select id="product_id" name="product_id[]"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select SProduct" multiple>
                                <option value="">Select</option>
                                <option value="all">All</option>

                            </select>
                        </div>


                        {{--                    Product Tags--}}
                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="tag_id">Product Tags</label>
                            <select id="tag_id" name="tag_id[]"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select tag" onchange="getData()" multiple>
                                <option value="">Select</option>

                            </select>
                        </div>
                        {{--                    Store tags--}}
                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="store_tag">Store Tag</label>
                            <select id="store_tag" name="store_tag[]"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select Store">
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

            <div class="card mt-2" id="baseStock" style="display: none">
                <table class="cell-border invoice-list-table dataTable table table-bordered" id="baseStock_size">
                    <thead class="table-secondary text-bold">
                    <tr id="baseStock_size_head">

                    </tr>
                    </thead>
                    <tbody>
                    <tr id="baseStock_size_body">>

                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-1 card">
                <div class="card card-datatable table-responsive">
                    <table class="cell-border invoice-list-table dataTable table table-bordered" id="datatable-list">
                        <thead class="table-secondary text-bold" id="tableHeader">
                        {{--                    <tr class="text-center">--}}
                        {{--                        <th>Product</th>--}}
                        {{--                        <th>Product</th>--}}
                        {{--                        <th>Product</th>--}}
                        {{--                        <th>Product</th>--}}
                        {{--                        <th>Product</th>--}}
                        {{--                        <th>Product</th>--}}
                        {{--                        <th>Product</th>--}}
                        {{--                        <th>Product</th>--}}
                        {{--                        <th>Product</th>--}}
                        {{--                        <th>Product</th>--}}
                        {{--                        <th>Product</th>--}}
                        {{--                        <th>Product</th>--}}
                        {{--                        <th>Product</th>--}}
                        {{--                        <th>Product</th>--}}
                        {{--                    </tr>--}}
                        </thead>
                        <tbody>

                        </tbody>
                        {{--                    <tbody id="dynamic-body"></tbody>--}}
                        {{--                    <tbody id="dynamic-body">--}}
                        {{--                    </tbody>--}}
                        {{--                    <tr>--}}
                        {{--                        <td>--}}
                        {{--                            <button type="button" class="btn btn-label-info waves-effect">JEANS</button>--}}
                        {{--                        </td>--}}
                        {{--                        <td>W.S.</td>--}}
                        {{--                        <td>24</td>--}}
                        {{--                        <td>26</td>--}}
                        {{--                        <td>28</td>--}}
                        {{--                        <td>30</td>--}}
                        {{--                        <td>32</td>--}}
                        {{--                        <td>34</td>--}}
                        {{--                        <td>36</td>--}}
                        {{--                        <td>38</td>--}}
                        {{--                        <td>40</td>--}}
                        {{--                        <td>42</td>--}}
                        {{--                        <td>330</td>--}}
                        {{--                        <td>--}}
                        {{--                            <div class="form-check justify-content-center d-flex">--}}
                        {{--                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">--}}
                        {{--                            </div>--}}
                        {{--                        </td>--}}
                        {{--                    </tr>--}}
                        {{--                    <tr>--}}
                        {{--                        <td>--}}
                        {{--                            <button type="button" class="btn btn-label-info waves-effect">JEANS</button>--}}
                        {{--                        </td>--}}
                        {{--                        <td>S.S.</td>--}}
                        {{--                        <td>6</td>--}}
                        {{--                        <td>10</td>--}}
                        {{--                        <td>4</td>--}}
                        {{--                        <td>13</td>--}}
                        {{--                        <td>20</td>--}}
                        {{--                        <td>1</td>--}}
                        {{--                        <td>8</td>--}}
                        {{--                        <td>21</td>--}}
                        {{--                        <td>18</td>--}}
                        {{--                        <td>17</td>--}}
                        {{--                        <td>68</td>--}}
                        {{--                        <td>--}}
                        {{--                            <div class="form-check justify-content-center d-flex">--}}
                        {{--                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">--}}
                        {{--                            </div>--}}
                        {{--                        </td>--}}

                        {{--                    </tr>--}}
                        {{--                    <tr>--}}
                        {{--                        <td>--}}
                        {{--                            <button type="button" class="btn btn-label-info waves-effect">JEANS</button>--}}
                        {{--                        </td>--}}
                        {{--                        <td>Allo.</td>--}}
                        {{--                        <td></td>--}}
                        {{--                        <td></td>--}}
                        {{--                        <td></td>--}}
                        {{--                        <td></td>--}}
                        {{--                        <td></td>--}}
                        {{--                        <td></td>--}}
                        {{--                        <td></td>--}}
                        {{--                        <td></td>--}}
                        {{--                        <td></td>--}}
                        {{--                        <td></td>--}}
                        {{--                        <td></td>--}}
                        {{--                        <td>--}}
                        {{--                            <div class="form-check justify-content-center d-flex">--}}
                        {{--                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">--}}
                        {{--                            </div>--}}
                        {{--                        </td>--}}
                        {{--                    </tr>--}}

                        {{--                    <tr>--}}
                        {{--                        <td>--}}
                        {{--                            <button type="button" class="btn btn-label-info waves-effect">Shirt</button>--}}
                        {{--                        </td>--}}
                        {{--                        <td>W.S.</td>--}}
                        {{--                        <td>24</td>--}}
                        {{--                        <td>26</td>--}}
                        {{--                        <td>28</td>--}}
                        {{--                        <td>30</td>--}}
                        {{--                        <td>32</td>--}}
                        {{--                        <td>34</td>--}}
                        {{--                        <td>36</td>--}}
                        {{--                        <td>38</td>--}}
                        {{--                        <td>40</td>--}}
                        {{--                        <td>42</td>--}}
                        {{--                        <td>330</td>--}}
                        {{--                        <td>--}}
                        {{--                            <div class="form-check justify-content-center d-flex">--}}
                        {{--                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">--}}
                        {{--                            </div>--}}
                        {{--                        </td>--}}
                        {{--                    </tr>--}}
                        {{--                    <tr>--}}
                        {{--                        <td>--}}
                        {{--                            <button type="button" class="btn btn-label-info waves-effect">Shirt</button>--}}
                        {{--                        </td>--}}
                        {{--                        <td>S.S.</td>--}}
                        {{--                        <td>6</td>--}}
                        {{--                        <td>10</td>--}}
                        {{--                        <td>4</td>--}}
                        {{--                        <td>13</td>--}}
                        {{--                        <td>20</td>--}}
                        {{--                        <td>1</td>--}}
                        {{--                        <td>8</td>--}}
                        {{--                        <td>21</td>--}}
                        {{--                        <td>18</td>--}}
                        {{--                        <td>17</td>--}}
                        {{--                        <td>68</td>--}}
                        {{--                        <td>--}}
                        {{--                            <div class="form-check justify-content-center d-flex">--}}
                        {{--                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">--}}
                        {{--                            </div>--}}
                        {{--                        </td>--}}

                        {{--                    </tr>--}}
                        {{--                    <tr>--}}
                        {{--                        <td>--}}
                        {{--                            <button type="button" class="btn btn-label-info waves-effect">Shirt</button>--}}
                        {{--                        </td>--}}
                        {{--                        <td>Allo.</td>--}}
                        {{--                        <td></td>--}}
                        {{--                        <td></td>--}}
                        {{--                        <td></td>--}}
                        {{--                        <td></td>--}}
                        {{--                        <td></td>--}}
                        {{--                        <td></td>--}}
                        {{--                        <td></td>--}}
                        {{--                        <td></td>--}}
                        {{--                        <td></td>--}}
                        {{--                        <td></td>--}}
                        {{--                        <td></td>--}}
                        {{--                        <td>--}}
                        {{--                            <div class="form-check justify-content-center d-flex">--}}
                        {{--                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">--}}
                        {{--                            </div>--}}
                        {{--                        </td>--}}
                        {{--                    </tr>--}}
                        {{--                    </tbody>--}}
                    </table>
                </div>
            </div>

            <div class="card mt-2" id="allProducts" style="display: none">
                <table class="cell-border invoice-list-table dataTable table table-bordered" id="allotted_products">
                    <thead class="table-secondary text-bold" id="tableHeader">
                    <tr>
                        <td>Product</td>
                        <td></td>
                        <td>Total Quantity</td>
                    </tr>
                    </thead>
                </table>
            </div>

            <div class="row p-2 justify-content-end">
                <div class="col-lg-2 col-md-12 col-sm-12">
                    <button type="submit" class="btn btn-primary d-grid w-100 waves-effect waves-light">Submit</button>
                </div>
            </div>
        </form>

    </section>

@endsection

@section('page-script')

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>

        var allottedProducts = [];
        var categoryId;

        $(document).on('click', '.rightCheck', function () {

            var buttonId = $(this).attr('id');
            var name = buttonId.replace(/ /g, '_');

            $('a[id="' + buttonId + '"]').closest('tr').each(function () {
                $(this).css('display', 'none');
            });

            var data = [];

            var test = '<div class="row m-2">';
            test += $('.productData[id="' + buttonId + '"]').html();
            test += '</div>';

            const inputs = document.querySelectorAll(`input[name^='allot_${name}']`);
            let inputData = {};

            inputs.forEach(input => {

                const match = input.name.match(/\[([a-zA-Z0-9]+)\]/);
                console.log(match);
                const index = match ? match[1] : null;
                if (index) {
                    inputData[`allot_${name}[${index}]`] = input.value;
                }
            });

            var totalAllotted = document.getElementById('total_' + name).value;

            data.push(test, `<button type="button" class="m-2 btn btn-md btn-outline-success round waves-effect"> alloted</button><input type="hidden" name="allocatedProducts[]" value="allot_${name}"> `, totalAllotted);

            allottedProducts.push(data);

            $('#allProducts').css('display', 'flow');

            var table = $('#allotted_products').DataTable();

            table.clear();
            table.rows.add(allottedProducts);
            table.draw();

            var orderId = document.getElementById('order_id').value;
            var storeId = document.getElementById('store_id').value;
            var warehouseId = document.getElementById('warehouse_id').value;
            var categoryId = document.getElementById('cat_id').value;

            var allot = 'allot_' + name;

            $.ajax({
                data: {
                    'orderId': orderId,
                    'storeId': storeId,
                    'warehouseId': warehouseId,
                    'categoryId': categoryId,
                    'buttonId': buttonId,
                    'allot': allot,
                    'totalAllotted': totalAllotted,
                    ...inputData,
                    "_token": "{{ csrf_token() }}"
                },
                url: "{{ route('stockAllocation.store') }}",
                method: 'POST',
                success: function (resultData) {
                    document.getElementById('order_id').value = resultData.id;
                    // Swal.fire('Done', 'Successfully! Done', 'success').then(() => {
                    //     location.reload();
                    //     $('#overlay').fadeOut(100);
                    // });
                }
            });

        });

        function getAllFilters() {

            var warehouseId = document.getElementById('warehouse_id').value;
            // var storeId = document.getElementById('store_id').value;
            if (warehouseId) {
                $.ajax({
                    type: 'POST',
                    url: '{{route('getAllFilters')}}',
                    data: {
                        warehouseId: warehouseId,
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
                    }
                });
            } else {
                $('#subCategory').empty().append('<option value="">Select Sub Category</option>');
            }
            // if (categoryId) {
            //     console.log();
            // }
        }

        function getData() {
            console.log(document.getElementById('cat_id').value);
            var warehouseId = document.getElementById('warehouse_id').value;
            categoryId = document.getElementById('cat_id').value;
            var subCatId = document.getElementById('sub_cat_id').value;
            var seasonId = document.getElementById('season_id').value;
            var storeId = document.getElementById('store_id').value;

            $.ajax({
                data: {
                    'warehouseId': warehouseId,
                    'categoryId': categoryId,
                    'subCatId': subCatId,
                    'storeId': storeId,
                    'seasonId': seasonId,
                    "_token": "{{ csrf_token() }}"
                },
                url: "{{ route('getStockAllocation') }}",
                method: 'POST',
                success: function (response) {

                    const baseStock = response.allSize;
                    const headers = response.header;
                    const data = response.data;

                    if (baseStock != null) {
                        $('#baseStock').css('display', 'flow');

                        $('#baseStock_size_head').empty();
                        $('#baseStock_size_body').empty();

                        baseStock.forEach((item) => {
                            $('#baseStock_size_head').append(`<td>${item.size}</td>`)
                            $('#baseStock_size_body').append(`<td>${item.qty}</td>`)
                        });
                    } else {
                        $('#baseStock').css('display', 'none');
                    }

                    if (!headers || !data) {
                        console.error("Headers or data are undefined");
                        return;
                    }

                    const columns = headers.map((header, index) => {
                        return {title: String(header), data: index.toString()};
                    });

                    if ($.fn.DataTable.isDataTable('#datatable-list')) {
                        $('#datatable-list').DataTable().clear().destroy();

                        $('#tableHeader').empty().append('<tr>')

                        $.each(columns, function (key, value) {
                            $('#tableHeader').append('<td> </td>');
                        });

                        $('#tableHeader').empty().append('<tr>')
                    }

                    $('#datatable-list').DataTable({
                        data: data,
                        columns: columns,
                        autoWidth: false,
                        lengthMenu: [
                            [10, 20, 100, 500],
                            [10, 20, 100, "All"]
                        ],

                        initComplete: function (settings, json) {
                            $("#overlay").fadeOut(100);

                            var table = this.api();
                            var rowCount = table.rows().count();
                            var lastColumnIndex = table.columns().count() - 1;

                            // Loop through the rows and apply rowspan to the first and last columns
                            for (var i = 0; i < rowCount; i += 3) {

                                if (i + 2 < rowCount) {
                                    // Apply rowspan to the first column
                                    var firstCell = $(table.cell(i, 0).node());
                                    firstCell.attr('rowspan', 3); // Set rowspan to 3

                                    $(table.cell(i + 1, 0).node()).hide();
                                    $(table.cell(i + 2, 0).node()).hide();

                                    // Apply rowspan to the last column
                                    var lastCell = $(table.cell(i, lastColumnIndex).node());
                                    lastCell.attr('rowspan', 3); // Set rowspan to 3

                                    $(table.cell(i + 1, lastColumnIndex).node()).hide();
                                    $(table.cell(i + 2, lastColumnIndex).node()).hide();
                                }
                            }
                        },

                        columnDefs: [
                            {orderable: true, targets: 0},
                            {orderable: true, targets: -1},
                            {orderable: false, targets: '_all'} // Disable sorting for all other columns
                        ],
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
                },
                error: function (xhr, status, error) {
                    console.error("Error fetching data:", error);
                }
            });
        }

        function getSubCategoriesData() {

            categoryId = document.getElementById('cat_id').value;

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

        function totalAllocated(value) {
            // console.log(value);

            var name = event.target.name;
            var baseName = name.replace(/\[([a-zA-Z0-9]+)\]/, '');
            var inputs = document.querySelectorAll(`input[name^="${baseName}["]`);
            // console.log(inputs)

            var sum = 0;
            inputs.forEach(function (input) {
                var inputValue = parseFloat(input.value) || 0; // Convert value to a number, default to 0 if NaN
                sum += inputValue;
            });

            document.getElementById('total_' + value).value = sum;
        }

        function refill() {
            $('#filter-search').toggleClass('d-none');

            $('#selectType').css('display', 'none')
            $('#stockRefill').css('display', 'flow')
        }

        function selection() {
            $('#selectType').css('display', 'flex')
            $('#stockRefill').css('display', 'none')
        }
    </script>
@endsection
