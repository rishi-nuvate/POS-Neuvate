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
                    <div class="col-md-3 mt-3">
                        <label class="form-label" for="store_id">Store Rating</label>
                        <select required id="store_rating" name="store_rating"
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
                        <select required id="store_id" name="store_id[]"
                                class="select2 select21 form-select" data-allow-clear="true"
                                data-placeholder="Select Store">
                            <option value="">Select</option>

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
                                data-placeholder="Select SProduct" multiple>
                            <option value="">Select</option>
                            <option value="all">All</option>

                        </select>
                    </div>


                    {{--                    Product Tags--}}
                    <div class="col-md-3 mt-3">
                        <label class="form-label" for="tag_id">Product Tags</label>
                        <select required id="tag_id" name="tag_id[]"
                                class="select2 select21 form-select" data-allow-clear="true"
                                data-placeholder="Select tag" onchange="getData()" multiple>
                            <option value="">Select</option>

                        </select>
                    </div>
                    {{--                    Store tags--}}
                    <div class="col-md-3 mt-3">
                        <label class="form-label" for="store_tag">Store Tag</label>
                        <select required id="store_tag" name="store_tag[]"
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

        <div class="mt-1 card">
            <div class="card card-datatable table-responsive">
                <table class="cell-border invoice-list-table dataTable table table-bordered" id="datatable-list">
                    <thead class="table-secondary text-bold">
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
        }

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        function getData() {

            var warehouseId = document.getElementById('warehouse_id').value;
            var categoryId = document.getElementById('cat_id').value;

            $.ajax({

                data: {
                    'warehouseId': warehouseId,
                    'categoryId': categoryId,
                    "_token": "{{ csrf_token() }}"
                },
                url: "{{ route('getStockAllocation') }}",
                method: 'POST',
                success: function (response) {
                    // $('#datatable-list').DataTable().clear();
                    const headers = response.header;
                    const data = response.data;

                    console.log(data);
                    if (!headers || !data) {
                        console.error("Headers or data are undefined");
                        return;
                    }

                    const columns = headers.map((header, index) => {
                        return {title: String(header), data: index.toString()};
                    });

// Clear and destroy the existing DataTable instance
                    if ($.fn.DataTable.isDataTable('#datatable-list')) {
                        $('#datatable-list').DataTable().clear().destroy();
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

        {{--var dataTable = $('#datatable-list').DataTable({--}}
        {{--    autoWidth: false,--}}
        {{--    lengthMenu: [--}}
        {{--        [10, 20, 100, 500],--}}
        {{--        [10, 20, 100, "All"]--}}
        {{--    ],--}}
        {{--    columnDefs: [--}}
        {{--        {orderable: true, targets: 0},--}}
        {{--        {orderable: true, targets: -1},--}}
        {{--        {orderable: false, targets: '_all'} // Disable sorting for all other columns--}}
        {{--    ],--}}
        {{--    // order: [--}}
        {{--    //     [0, 'desc']--}}
        {{--    // ],--}}
        {{--    initComplete: function (settings, json) {--}}
        {{--        $("#overlay").fadeOut(100);--}}

        {{--        // Apply rowspan to the first column--}}
        {{--        var table = this.api();--}}
        {{--        var rowCount = table.rows().count();--}}
        {{--        var lastColumnIndex = table.columns().count() - 1;--}}

        {{--        // Loop through the rows and apply rowspan to the first and last columns--}}
        {{--        for (var i = 0; i < rowCount; i += 3) {--}}
        {{--            // Check if there are enough rows left for a complete group of 3--}}
        {{--            if (i + 2 < rowCount) {--}}
        {{--                // Apply rowspan to the first column--}}
        {{--                var firstCell = $(table.cell(i, 0).node());--}}
        {{--                firstCell.attr('rowspan', 3); // Set rowspan to 3--}}
        {{--                // Hide the next two cells in the first column--}}
        {{--                $(table.cell(i + 1, 0).node()).hide();--}}
        {{--                $(table.cell(i + 2, 0).node()).hide();--}}

        {{--                // Apply rowspan to the last column--}}
        {{--                var lastCell = $(table.cell(i, lastColumnIndex).node());--}}
        {{--                lastCell.attr('rowspan', 3); // Set rowspan to 3--}}
        {{--                // Hide the next two cells in the last column--}}
        {{--                $(table.cell(i + 1, lastColumnIndex).node()).hide();--}}
        {{--                $(table.cell(i + 2, lastColumnIndex).node()).hide();--}}
        {{--            }--}}
        {{--        }--}}
        {{--        // var previousValue = null;--}}
        {{--        // var rowspanCount = 1;--}}
        {{--        //--}}
        {{--        // table.rows().every(function (rowIdx, tableLoop, rowLoop) {--}}
        {{--        //     var data = this.data();--}}
        {{--        //     var cell = $(table.cell(rowIdx, 0).node());--}}
        {{--        //--}}
        {{--        //     if (previousValue === data[0]) {--}}
        {{--        //         rowspanCount++;--}}
        {{--        //         cell.hide();--}}
        {{--        //     } else {--}}
        {{--        //         if (rowspanCount > 1) {--}}
        {{--        //             $(table.cell(rowIdx - rowspanCount, 0).node()).attr('rowspan', rowspanCount);--}}
        {{--        //         }--}}
        {{--        //         rowspanCount = 1;--}}
        {{--        //         previousValue = data[0];--}}
        {{--        //     }--}}
        {{--        // });--}}

        {{--        // Apply rowspan on the last set if applicable--}}
        {{--        // if (rowspanCount > 1) {--}}
        {{--        //     $(table.cell(table.rows()[0].length - rowspanCount, 0).node()).attr('rowspan', rowspanCount);--}}
        {{--        // }--}}
        {{--    },--}}
        {{--    bDestroy: true,--}}
        {{--    dom:--}}
        {{--        '<"row me-2"' +--}}
        {{--        '<"col-md-2"<"me-3"l>>' +--}}
        {{--        '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>' +--}}
        {{--        '>t' +--}}
        {{--        '<"row mx-2"' +--}}
        {{--        '<"col-sm-12 col-md-6"i>' +--}}
        {{--        '<"col-sm-12 col-md-6"p>' +--}}
        {{--        '>',--}}
        {{--    buttons: [--}}
        {{--        {--}}
        {{--            extend: 'collection',--}}
        {{--            className: 'btn btn-label-primary dropdown-toggle mx-3',--}}
        {{--            text: '<i class="ti ti-screen-share me-1 ti-xs"></i>Export',--}}
        {{--            buttons: [--}}
        {{--                {--}}
        {{--                    extend: 'print',--}}
        {{--                    text: '<i class="ti ti-printer me-2" ></i>Print',--}}
        {{--                    className: 'dropdown-item',--}}
        {{--                    exportOptions: {--}}
        {{--                        format: {--}}
        {{--                            body: function (inner, coldex, rowdex) {--}}
        {{--                                if (inner.length <= 0) return inner;--}}
        {{--                                var el = $.parseHTML(inner);--}}
        {{--                                var result = '';--}}
        {{--                                $.each(el, function (index, item) {--}}
        {{--                                    if (item.classList !== undefined && item.classList.contains('user-name')) {--}}
        {{--                                        result = result + item.lastChild.firstChild.textContent;--}}
        {{--                                    } else if (item.innerText === undefined) {--}}
        {{--                                        result = result + item.textContent;--}}
        {{--                                    } else result = result + item.innerText;--}}
        {{--                                });--}}
        {{--                                return result;--}}
        {{--                            }--}}
        {{--                        }--}}
        {{--                    },--}}
        {{--                    customize: function (win) {--}}
        {{--                        //customize print view for dark--}}
        {{--                        $(win.document.body)--}}
        {{--                            .css('color', headingColor)--}}
        {{--                            .css('border-color', borderColor)--}}
        {{--                            .css('background-color', bodyBg);--}}
        {{--                        $(win.document.body)--}}
        {{--                            .find('table')--}}
        {{--                            .addClass('compact')--}}
        {{--                            .css('color', 'inherit')--}}
        {{--                            .css('border-color', 'inherit')--}}
        {{--                            .css('background-color', 'inherit');--}}
        {{--                    }--}}
        {{--                },--}}
        {{--                {--}}
        {{--                    extend: 'csv',--}}
        {{--                    text: '<i class="ti ti-file-text me-2" ></i>Csv',--}}
        {{--                    className: 'dropdown-item',--}}
        {{--                    exportOptions: {--}}
        {{--                        format: {--}}
        {{--                            body: function (inner, coldex, rowdex) {--}}
        {{--                                if (inner.length <= 0) return inner;--}}
        {{--                                var el = $.parseHTML(inner);--}}
        {{--                                var result = '';--}}
        {{--                                $.each(el, function (index, item) {--}}
        {{--                                    if (item.classList !== undefined && item.classList.contains('user-name')) {--}}
        {{--                                        result = result + item.lastChild.firstChild.textContent;--}}
        {{--                                    } else if (item.innerText === undefined) {--}}
        {{--                                        result = result + item.textContent;--}}
        {{--                                    } else result = result + item.innerText;--}}
        {{--                                });--}}
        {{--                                return result;--}}
        {{--                            }--}}
        {{--                        }--}}
        {{--                    }--}}
        {{--                },--}}
        {{--                {--}}
        {{--                    extend: 'excel',--}}
        {{--                    text: '<i class="ti ti-file-spreadsheet me-2"></i>Excel',--}}
        {{--                    className: 'dropdown-item',--}}
        {{--                    exportOptions: {--}}
        {{--                        format: {--}}
        {{--                            body: function (inner, coldex, rowdex) {--}}
        {{--                                if (inner.length <= 0) return inner;--}}
        {{--                                var el = $.parseHTML(inner);--}}
        {{--                                var result = '';--}}
        {{--                                $.each(el, function (index, item) {--}}
        {{--                                    if (item.classList !== undefined && item.classList.contains('user-name')) {--}}
        {{--                                        result = result + item.lastChild.firstChild.textContent;--}}
        {{--                                    } else if (item.innerText === undefined) {--}}
        {{--                                        result = result + item.textContent;--}}
        {{--                                    } else result = result + item.innerText;--}}
        {{--                                });--}}
        {{--                                return result;--}}
        {{--                            }--}}
        {{--                        }--}}
        {{--                    }--}}
        {{--                },--}}
        {{--                {--}}
        {{--                    extend: 'pdf',--}}
        {{--                    text: '<i class="ti ti-file-code-2 me-2"></i>Pdf',--}}
        {{--                    className: 'dropdown-item',--}}
        {{--                    exportOptions: {--}}
        {{--                        format: {--}}
        {{--                            body: function (inner, coldex, rowdex) {--}}
        {{--                                if (inner.length <= 0) return inner;--}}
        {{--                                var el = $.parseHTML(inner);--}}
        {{--                                var result = '';--}}
        {{--                                $.each(el, function (index, item) {--}}
        {{--                                    if (item.classList !== undefined && item.classList.contains('user-name')) {--}}
        {{--                                        result = result + item.lastChild.firstChild.textContent;--}}
        {{--                                    } else if (item.innerText === undefined) {--}}
        {{--                                        result = result + item.textContent;--}}
        {{--                                    } else result = result + item.innerText;--}}
        {{--                                });--}}
        {{--                                return result;--}}
        {{--                            }--}}
        {{--                        }--}}
        {{--                    }--}}
        {{--                },--}}
        {{--                {--}}
        {{--                    extend: 'copy',--}}
        {{--                    text: '<i class="ti ti-copy me-2" ></i>Copy',--}}
        {{--                    className: 'dropdown-item',--}}
        {{--                    exportOptions: {--}}
        {{--                        format: {--}}
        {{--                            body: function (inner, coldex, rowdex) {--}}
        {{--                                if (inner.length <= 0) return inner;--}}
        {{--                                var el = $.parseHTML(inner);--}}
        {{--                                var result = '';--}}
        {{--                                $.each(el, function (index, item) {--}}
        {{--                                    if (item.classList !== undefined && item.classList.contains('user-name')) {--}}
        {{--                                        result = result + item.lastChild.firstChild.textContent;--}}
        {{--                                    } else if (item.innerText === undefined) {--}}
        {{--                                        result = result + item.textContent;--}}
        {{--                                    } else result = result + item.innerText;--}}
        {{--                                });--}}
        {{--                                return result;--}}
        {{--                            }--}}
        {{--                        }--}}
        {{--                    }--}}
        {{--                }--}}
        {{--            ]--}}
        {{--        },--}}
        {{--        {--}}
        {{--            text: '<i class="ti ti-filter me-md-1"></i><span class="d-md-inline-block d-none"></span>',--}}
        {{--            className: 'btn btn-primary',--}}
        {{--            action: function (e, dt, button, config) {--}}
        {{--                $('#filter-search').toggleClass('d-none');--}}
        {{--            }--}}
        {{--        }--}}
        {{--    ],--}}
        {{--});--}}

        {{--function getData() {--}}

        {{--    // var dataTable = $('#datatable-list').DataTable();--}}

        {{--    var warehouseId = document.getElementById('warehouse_id').value;--}}
        {{--    var categoryId = document.getElementById('cat_id').value;--}}


        {{--    $('#datatable-list').DataTable({--}}
        {{--        autoWidth: false,--}}
        {{--        lengthMenu: [--}}
        {{--            [10, 20, 100, 500],--}}
        {{--            [10, 20, 100, "All"]--}}
        {{--        ],--}}
        {{--        columnDefs: [--}}
        {{--            {orderable: true, targets: 0},--}}
        {{--            {orderable: true, targets: -1},--}}
        {{--            {orderable: false, targets: '_all'} // Disable sorting for all other columns--}}
        {{--        ],--}}
        {{--        ajax: {--}}
        {{--            url: "{{ route('getStockAllocation') }}",--}}
        {{--            type: "POST",--}}
        {{--            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},--}}
        {{--            data: {--}}
        {{--                'warehouseId': warehouseId,--}}
        {{--                'categoryId': categoryId,--}}
        {{--                "_token": "{{ csrf_token() }}"--}}
        {{--            },--}}

        {{--        },--}}
        {{--        initComplete: function (settings, json) {--}}
        {{--            $("#overlay").fadeOut(100);--}}

        {{--            var table = this.api();--}}
        {{--            var rowCount = table.rows().count();--}}
        {{--            var lastColumnIndex = table.columns().count() - 1;--}}

        {{--            // Loop through the rows and apply rowspan to the first and last columns--}}
        {{--            for (var i = 0; i < rowCount; i += 3) {--}}

        {{--                if (i + 2 < rowCount) {--}}
        {{--                    // Apply rowspan to the first column--}}
        {{--                    var firstCell = $(table.cell(i, 0).node());--}}
        {{--                    firstCell.attr('rowspan', 3); // Set rowspan to 3--}}

        {{--                    $(table.cell(i + 1, 0).node()).hide();--}}
        {{--                    $(table.cell(i + 2, 0).node()).hide();--}}

        {{--                    // Apply rowspan to the last column--}}
        {{--                    var lastCell = $(table.cell(i, lastColumnIndex).node());--}}
        {{--                    lastCell.attr('rowspan', 3); // Set rowspan to 3--}}

        {{--                    $(table.cell(i + 1, lastColumnIndex).node()).hide();--}}
        {{--                    $(table.cell(i + 2, lastColumnIndex).node()).hide();--}}
        {{--                }--}}
        {{--            }--}}
        {{--        },--}}
        {{--        bDestroy: true,--}}
        {{--        dom:--}}
        {{--            '<"row me-2"' +--}}
        {{--            '<"col-md-2"<"me-3"l>>' +--}}
        {{--            '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>' +--}}
        {{--            '>t' +--}}
        {{--            '<"row mx-2"' +--}}
        {{--            '<"col-sm-12 col-md-6"i>' +--}}
        {{--            '<"col-sm-12 col-md-6"p>' +--}}
        {{--            '>',--}}
        {{--        buttons: [--}}
        {{--            {--}}
        {{--                extend: 'collection',--}}
        {{--                className: 'btn btn-label-primary dropdown-toggle mx-3',--}}
        {{--                text: '<i class="ti ti-screen-share me-1 ti-xs"></i>Export',--}}
        {{--                buttons: [--}}
        {{--                    {--}}
        {{--                        extend: 'print',--}}
        {{--                        text: '<i class="ti ti-printer me-2" ></i>Print',--}}
        {{--                        className: 'dropdown-item',--}}
        {{--                        exportOptions: {--}}
        {{--                            format: {--}}
        {{--                                body: function (inner, coldex, rowdex) {--}}
        {{--                                    if (inner.length <= 0) return inner;--}}
        {{--                                    var el = $.parseHTML(inner);--}}
        {{--                                    var result = '';--}}
        {{--                                    $.each(el, function (index, item) {--}}
        {{--                                        if (item.classList !== undefined && item.classList.contains('user-name')) {--}}
        {{--                                            result = result + item.lastChild.firstChild.textContent;--}}
        {{--                                        } else if (item.innerText === undefined) {--}}
        {{--                                            result = result + item.textContent;--}}
        {{--                                        } else result = result + item.innerText;--}}
        {{--                                    });--}}
        {{--                                    return result;--}}
        {{--                                }--}}
        {{--                            }--}}
        {{--                        },--}}
        {{--                        customize: function (win) {--}}
        {{--                            //customize print view for dark--}}
        {{--                            $(win.document.body)--}}
        {{--                                .css('color', headingColor)--}}
        {{--                                .css('border-color', borderColor)--}}
        {{--                                .css('background-color', bodyBg);--}}
        {{--                            $(win.document.body)--}}
        {{--                                .find('table')--}}
        {{--                                .addClass('compact')--}}
        {{--                                .css('color', 'inherit')--}}
        {{--                                .css('border-color', 'inherit')--}}
        {{--                                .css('background-color', 'inherit');--}}
        {{--                        }--}}
        {{--                    },--}}
        {{--                    {--}}
        {{--                        extend: 'csv',--}}
        {{--                        text: '<i class="ti ti-file-text me-2" ></i>Csv',--}}
        {{--                        className: 'dropdown-item',--}}
        {{--                        exportOptions: {--}}
        {{--                            format: {--}}
        {{--                                body: function (inner, coldex, rowdex) {--}}
        {{--                                    if (inner.length <= 0) return inner;--}}
        {{--                                    var el = $.parseHTML(inner);--}}
        {{--                                    var result = '';--}}
        {{--                                    $.each(el, function (index, item) {--}}
        {{--                                        if (item.classList !== undefined && item.classList.contains('user-name')) {--}}
        {{--                                            result = result + item.lastChild.firstChild.textContent;--}}
        {{--                                        } else if (item.innerText === undefined) {--}}
        {{--                                            result = result + item.textContent;--}}
        {{--                                        } else result = result + item.innerText;--}}
        {{--                                    });--}}
        {{--                                    return result;--}}
        {{--                                }--}}
        {{--                            }--}}
        {{--                        }--}}
        {{--                    },--}}
        {{--                    {--}}
        {{--                        extend: 'excel',--}}
        {{--                        text: '<i class="ti ti-file-spreadsheet me-2"></i>Excel',--}}
        {{--                        className: 'dropdown-item',--}}
        {{--                        exportOptions: {--}}
        {{--                            format: {--}}
        {{--                                body: function (inner, coldex, rowdex) {--}}
        {{--                                    if (inner.length <= 0) return inner;--}}
        {{--                                    var el = $.parseHTML(inner);--}}
        {{--                                    var result = '';--}}
        {{--                                    $.each(el, function (index, item) {--}}
        {{--                                        if (item.classList !== undefined && item.classList.contains('user-name')) {--}}
        {{--                                            result = result + item.lastChild.firstChild.textContent;--}}
        {{--                                        } else if (item.innerText === undefined) {--}}
        {{--                                            result = result + item.textContent;--}}
        {{--                                        } else result = result + item.innerText;--}}
        {{--                                    });--}}
        {{--                                    return result;--}}
        {{--                                }--}}
        {{--                            }--}}
        {{--                        }--}}
        {{--                    },--}}
        {{--                    {--}}
        {{--                        extend: 'pdf',--}}
        {{--                        text: '<i class="ti ti-file-code-2 me-2"></i>Pdf',--}}
        {{--                        className: 'dropdown-item',--}}
        {{--                        exportOptions: {--}}
        {{--                            format: {--}}
        {{--                                body: function (inner, coldex, rowdex) {--}}
        {{--                                    if (inner.length <= 0) return inner;--}}
        {{--                                    var el = $.parseHTML(inner);--}}
        {{--                                    var result = '';--}}
        {{--                                    $.each(el, function (index, item) {--}}
        {{--                                        if (item.classList !== undefined && item.classList.contains('user-name')) {--}}
        {{--                                            result = result + item.lastChild.firstChild.textContent;--}}
        {{--                                        } else if (item.innerText === undefined) {--}}
        {{--                                            result = result + item.textContent;--}}
        {{--                                        } else result = result + item.innerText;--}}
        {{--                                    });--}}
        {{--                                    return result;--}}
        {{--                                }--}}
        {{--                            }--}}
        {{--                        }--}}
        {{--                    },--}}
        {{--                    {--}}
        {{--                        extend: 'copy',--}}
        {{--                        text: '<i class="ti ti-copy me-2" ></i>Copy',--}}
        {{--                        className: 'dropdown-item',--}}
        {{--                        exportOptions: {--}}
        {{--                            format: {--}}
        {{--                                body: function (inner, coldex, rowdex) {--}}
        {{--                                    if (inner.length <= 0) return inner;--}}
        {{--                                    var el = $.parseHTML(inner);--}}
        {{--                                    var result = '';--}}
        {{--                                    $.each(el, function (index, item) {--}}
        {{--                                        if (item.classList !== undefined && item.classList.contains('user-name')) {--}}
        {{--                                            result = result + item.lastChild.firstChild.textContent;--}}
        {{--                                        } else if (item.innerText === undefined) {--}}
        {{--                                            result = result + item.textContent;--}}
        {{--                                        } else result = result + item.innerText;--}}
        {{--                                    });--}}
        {{--                                    return result;--}}
        {{--                                }--}}
        {{--                            }--}}
        {{--                        }--}}
        {{--                    }--}}
        {{--                ]--}}
        {{--            },--}}
        {{--            {--}}
        {{--                text: '<i class="ti ti-filter me-md-1"></i><span class="d-md-inline-block d-none"></span>',--}}
        {{--                className: 'btn btn-primary',--}}
        {{--                action: function (e, dt, button, config) {--}}
        {{--                    $('#filter-search').toggleClass('d-none');--}}
        {{--                }--}}
        {{--            }--}}
        {{--        ],--}}
        {{--    });--}}

        {{--    // $('#datatable-list').DataTable({--}}
        {{--    //     autoWidth: false,--}}
        {{--    //     lengthMenu: [--}}
        {{--    --}}{{----}}{{--        [10, 20, 100, 500],--}}
        {{--    --}}{{--        [10, 20, 100, "All"]--}}
        {{--    --}}{{--    ],--}}
        {{--    --}}{{--    columnDefs: [--}}
        {{--    --}}{{--        {orderable: true, targets: 0},--}}
        {{--    --}}{{--        {orderable: true, targets: -1},--}}
        {{--    --}}{{--        {orderable: false, targets: '_all'} // Disable sorting for all other columns--}}
        {{--    --}}{{--    ],--}}
        {{--    --}}{{--    ajax: {--}}
        {{--    --}}{{--        url: "{{ route('getStockAllocation') }}",--}}
        {{--    --}}{{--        type: "POST",--}}
        {{--    --}}{{--        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},--}}
        {{--    --}}{{--        data: {--}}
        {{--    --}}{{--            'warehouseId': warehouseId,--}}
        {{--    --}}{{--            'categoryId': categoryId,--}}
        {{--    --}}{{--            "_token": "{{ csrf_token() }}"--}}
        {{--    --}}{{--        },--}}
        {{--    --}}{{--        dataSrc: function (response) {--}}
        {{--    --}}{{--            // Clear the existing headers--}}
        {{--    --}}{{--            $('#dynamic-header').empty();--}}
        {{--    --}}{{--            $('#dynamic-body').empty();--}}
        {{--    --}}{{--            // Generate new headers--}}
        {{--    --}}{{--            response.header.forEach(function (header) {--}}
        {{--    --}}{{--                $('#dynamic-header').append('<th>' + header + '</th>');--}}
        {{--    --}}{{--            });--}}
        {{--    --}}{{--            // response.data.forEach(function (product) {--}}
        {{--    --}}{{--            //     let row = $('<tr></tr>'); // Create a new row element--}}
        {{--    --}}{{--            //     product.forEach(function (data) {--}}
        {{--    --}}{{--            //         row.append('<td>' + data + '</td>'); // Append each data point to the row--}}
        {{--    --}}{{--            //     });--}}
        {{--    --}}{{--            //     $('#dynamic-body').append(row); // Append the row to the table body--}}
        {{--    --}}{{--            // });--}}
        {{--    --}}{{--        },--}}
        {{--    --}}{{--    },--}}

        {{--    --}}{{--    bDestroy: true,--}}
        {{--    --}}{{--    dom:--}}
        {{--    --}}{{--        '<"row me-2"' +--}}
        {{--    --}}{{--        '<"col-md-2"<"me-3"l>>' +--}}
        {{--    --}}{{--        '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>' +--}}
        {{--    --}}{{--        '>t' +--}}
        {{--    --}}{{--        '<"row mx-2"' +--}}
        {{--    --}}{{--        '<"col-sm-12 col-md-6"i>' +--}}
        {{--    --}}{{--        '<"col-sm-12 col-md-6"p>' +--}}
        {{--    --}}{{--        '>',--}}
        {{--    --}}{{--    buttons: [--}}
        {{--    --}}{{--        {--}}
        {{--    --}}{{--            extend: 'collection',--}}
        {{--    --}}{{--            className: 'btn btn-label-primary dropdown-toggle mx-3',--}}
        {{--    --}}{{--            text: '<i class="ti ti-screen-share me-1 ti-xs"></i>Export',--}}
        {{--    --}}{{--            buttons: [--}}
        {{--    --}}{{--                {--}}
        {{--    --}}{{--                    extend: 'print',--}}
        {{--    --}}{{--                    text: '<i class="ti ti-printer me-2" ></i>Print',--}}
        {{--    --}}{{--                    className: 'dropdown-item',--}}
        {{--    --}}{{--                    exportOptions: {--}}
        {{--    --}}{{--                        format: {--}}
        {{--    --}}{{--                            body: function (inner, coldex, rowdex) {--}}
        {{--    --}}{{--                                if (inner.length <= 0) return inner;--}}
        {{--    --}}{{--                                var el = $.parseHTML(inner);--}}
        {{--    --}}{{--                                var result = '';--}}
        {{--    --}}{{--                                $.each(el, function (index, item) {--}}
        {{--    --}}{{--                                    if (item.classList !== undefined && item.classList.contains('user-name')) {--}}
        {{--    --}}{{--                                        result = result + item.lastChild.firstChild.textContent;--}}
        {{--    --}}{{--                                    } else if (item.innerText === undefined) {--}}
        {{--    --}}{{--                                        result = result + item.textContent;--}}
        {{--    --}}{{--                                    } else result = result + item.innerText;--}}
        {{--    --}}{{--                                });--}}
        {{--    --}}{{--                                return result;--}}
        {{--    --}}{{--                            }--}}
        {{--    --}}{{--                        }--}}
        {{--    --}}{{--                    },--}}
        {{--    --}}{{--                    customize: function (win) {--}}
        {{--    --}}{{--                        //customize print view for dark--}}
        {{--    --}}{{--                        $(win.document.body)--}}
        {{--    --}}{{--                            .css('color', headingColor)--}}
        {{--    --}}{{--                            .css('border-color', borderColor)--}}
        {{--    --}}{{--                            .css('background-color', bodyBg);--}}
        {{--    --}}{{--                        $(win.document.body)--}}
        {{--    --}}{{--                            .find('table')--}}
        {{--    --}}{{--                            .addClass('compact')--}}
        {{--    --}}{{--                            .css('color', 'inherit')--}}
        {{--    --}}{{--                            .css('border-color', 'inherit')--}}
        {{--    --}}{{--                            .css('background-color', 'inherit');--}}
        {{--    --}}{{--                    }--}}
        {{--    --}}{{--                },--}}
        {{--    --}}{{--                {--}}
        {{--    --}}{{--                    extend: 'csv',--}}
        {{--    --}}{{--                    text: '<i class="ti ti-file-text me-2" ></i>Csv',--}}
        {{--    --}}{{--                    className: 'dropdown-item',--}}
        {{--    --}}{{--                    exportOptions: {--}}
        {{--    --}}{{--                        format: {--}}
        {{--    --}}{{--                            body: function (inner, coldex, rowdex) {--}}
        {{--    --}}{{--                                if (inner.length <= 0) return inner;--}}
        {{--    --}}{{--                                var el = $.parseHTML(inner);--}}
        {{--    --}}{{--                                var result = '';--}}
        {{--    --}}{{--                                $.each(el, function (index, item) {--}}
        {{--    --}}{{--                                    if (item.classList !== undefined && item.classList.contains('user-name')) {--}}
        {{--    --}}{{--                                        result = result + item.lastChild.firstChild.textContent;--}}
        {{--    --}}{{--                                    } else if (item.innerText === undefined) {--}}
        {{--    --}}{{--                                        result = result + item.textContent;--}}
        {{--    --}}{{--                                    } else result = result + item.innerText;--}}
        {{--    --}}{{--                                });--}}
        {{--    --}}{{--                                return result;--}}
        {{--    --}}{{--                            }--}}
        {{--    --}}{{--                        }--}}
        {{--    --}}{{--                    }--}}
        {{--    --}}{{--                },--}}
        {{--    --}}{{--                {--}}
        {{--    --}}{{--                    extend: 'excel',--}}
        {{--    --}}{{--                    text: '<i class="ti ti-file-spreadsheet me-2"></i>Excel',--}}
        {{--    --}}{{--                    className: 'dropdown-item',--}}
        {{--    --}}{{--                    exportOptions: {--}}
        {{--    --}}{{--                        format: {--}}
        {{--    --}}{{--                            body: function (inner, coldex, rowdex) {--}}
        {{--    --}}{{--                                if (inner.length <= 0) return inner;--}}
        {{--    --}}{{--                                var el = $.parseHTML(inner);--}}
        {{--    --}}{{--                                var result = '';--}}
        {{--    --}}{{--                                $.each(el, function (index, item) {--}}
        {{--    --}}{{--                                    if (item.classList !== undefined && item.classList.contains('user-name')) {--}}
        {{--    --}}{{--                                        result = result + item.lastChild.firstChild.textContent;--}}
        {{--    --}}{{--                                    } else if (item.innerText === undefined) {--}}
        {{--    --}}{{--                                        result = result + item.textContent;--}}
        {{--    --}}{{--                                    } else result = result + item.innerText;--}}
        {{--    --}}{{--                                });--}}
        {{--    --}}{{--                                return result;--}}
        {{--    --}}{{--                            }--}}
        {{--    --}}{{--                        }--}}
        {{--    --}}{{--                    }--}}
        {{--    --}}{{--                },--}}
        {{--    --}}{{--                {--}}
        {{--    --}}{{--                    extend: 'pdf',--}}
        {{--    --}}{{--                    text: '<i class="ti ti-file-code-2 me-2"></i>Pdf',--}}
        {{--    --}}{{--                    className: 'dropdown-item',--}}
        {{--    --}}{{--                    exportOptions: {--}}
        {{--    --}}{{--                        format: {--}}
        {{--    --}}{{--                            body: function (inner, coldex, rowdex) {--}}
        {{--    --}}{{--                                if (inner.length <= 0) return inner;--}}
        {{--    --}}{{--                                var el = $.parseHTML(inner);--}}
        {{--    --}}{{--                                var result = '';--}}
        {{--    --}}{{--                                $.each(el, function (index, item) {--}}
        {{--    --}}{{--                                    if (item.classList !== undefined && item.classList.contains('user-name')) {--}}
        {{--    --}}{{--                                        result = result + item.lastChild.firstChild.textContent;--}}
        {{--    --}}{{--                                    } else if (item.innerText === undefined) {--}}
        {{--    --}}{{--                                        result = result + item.textContent;--}}
        {{--    --}}{{--                                    } else result = result + item.innerText;--}}
        {{--    --}}{{--                                });--}}
        {{--    --}}{{--                                return result;--}}
        {{--    --}}{{--                            }--}}
        {{--    --}}{{--                        }--}}
        {{--    --}}{{--                    }--}}
        {{--    --}}{{--                },--}}
        {{--    --}}{{--                {--}}
        {{--    --}}{{--                    extend: 'copy',--}}
        {{--    --}}{{--                    text: '<i class="ti ti-copy me-2" ></i>Copy',--}}
        {{--    --}}{{--                    className: 'dropdown-item',--}}
        {{--    --}}{{--                    exportOptions: {--}}
        {{--    --}}{{--                        format: {--}}
        {{--    --}}{{--                            body: function (inner, coldex, rowdex) {--}}
        {{--    --}}{{--                                if (inner.length <= 0) return inner;--}}
        {{--    --}}{{--                                var el = $.parseHTML(inner);--}}
        {{--    --}}{{--                                var result = '';--}}
        {{--    --}}{{--                                $.each(el, function (index, item) {--}}
        {{--    --}}{{--                                    if (item.classList !== undefined && item.classList.contains('user-name')) {--}}
        {{--    --}}{{--                                        result = result + item.lastChild.firstChild.textContent;--}}
        {{--    --}}{{--                                    } else if (item.innerText === undefined) {--}}
        {{--    --}}{{--                                        result = result + item.textContent;--}}
        {{--    --}}{{--                                    } else result = result + item.innerText;--}}
        {{--    --}}{{--                                });--}}
        {{--    --}}{{--                                return result;--}}
        {{--    --}}{{--                            }--}}
        {{--    --}}{{--                        }--}}
        {{--    --}}{{--                    }--}}
        {{--    --}}{{--                }--}}
        {{--    --}}{{--            ]--}}
        {{--    --}}{{--        },--}}
        {{--    --}}{{--        {--}}
        {{--    --}}{{--            text: '<i class="ti ti-filter me-md-1"></i><span class="d-md-inline-block d-none"></span>',--}}
        {{--    --}}{{--            className: 'btn btn-primary',--}}
        {{--    --}}{{--            action: function (e, dt, button, config) {--}}
        {{--    --}}{{--                $('#filter-search').toggleClass('d-none');--}}
        {{--    --}}{{--            }--}}
        {{--    --}}{{--        }--}}
        {{--    --}}{{--    ],--}}
        {{--    --}}{{--});--}}

        {{--}--}}

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
