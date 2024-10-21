@extends('layouts/layoutMaster')

@section('title', 'Create-P.O.')

@section('content')
    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/supplyChain') }}">Supply Chain</a>
            </li>
            <li class="breadcrumb-item active"> P.O.</li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </nav>

    <!-- Invoice List Widget -->
    <form method="post" action="{{ route('po.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="text-white rounded-top bg-primary p-2">
                Create P.O.
            </div>
            <div class="card-body">
                <div class="content">

                    <div class="row">

                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="company">Company</label>
                            <select required id="company_id" name="company"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select Company" onchange="getAllDetails()">
                                <option value="">Select</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="shippingAddress">Shipping Address</label>
                            <select required id="shippingAddress" name="shippingAddress"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select Address" onchange="getShippingAddress()">
                                <option value="">Select</option>
                            </select>
                        </div>

                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="poNumber">Po No</label>
                            <input type="text" id="poNumber" name="poNumber" class="form-control"
                                   placeholder="Add Purchase Order Number"/>
                        </div>

                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="po_date">Po Date</label>
                            <input type="date" id="po_date" name="po_date" class="form-control"
                                   placeholder="Add Purchase Order Date" value="{{now()->toDateString()}}"/>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4 my-4 mx-1" id="compAdd">

                        </div>
                        <div class="col-md-4 my-4" id="shipAdd">

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="vendor">Vendor</label>
                            <select required id="vendor" name="vendor"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select Company" onchange="getVendorAddress()">
                                <option value="">Select</option>
                                @foreach($vendors as $vendor)
                                    <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 my-4 mx-1" id="vendorAdd">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="card mt-3" >
            <div class="text-white rounded-top bg-primary p-2">
                Products
            </div>
            <div class="card-body">
                <div class="content">
                    <div class="row" id="po_table">

                        <div class="row" id="row_0">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Product</label>
                                <select id="product_id[0]" name="product_id[0]"
                                        class="select2 select21 form-select" data-allow-clear="true"
                                        data-placeholder="Select Product" onchange="getSkuByProduct(0);">
                                    <option value="">Select</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3 mt-3">
                                <label class="form-label" for="description[0]">Description</label>
                                <input type="text" id="description[0]" name="description[0]" class="form-control"
                                       placeholder="Add Description"/>
                            </div>

                            <div class="col-md-3 mt-3">
                                <label class="form-label" for="unitPrice[0]">Unit Price</label>
                                <input type="number" id="unitPrice[0]" onchange="calculateTotal(0)" name="unitPrice[0]"
                                       class="form-control"
                                       placeholder="Unit Price"/>
                            </div>

                            <div class="col-md-3 mt-3">
                                <label class="form-label" for="tax[0]">Tax</label>
                                <input type="number" id="tax[0]" name="tax[0]" onchange="calculateTotal(0)"
                                       class="form-control"
                                       placeholder="Tax"/>
                            </div>


                            <div class="col-4 col-md-4 mt-3">
                                <label class="form-label" for="TotalQty0">Total Qty</label>
                                <div class="input-group">
                                    <input required type="number" id="TotalQty0" name="TotalQty[0]"
                                           class="form-control" placeholder="Total Qty" readonly/>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary waves-effect"
                                                data-bs-toggle="modal" data-bs-target="#addQty0" type="button"
                                                onclick="getProductVariant(0)">
                                            <i class="fa fa-plus"></i> Add Sku Wise
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4 col-md-4 mt-3">
                                <label class="form-label" for="NetAmount0">Net Amount Of Total Qty</label>
                                <div class="input-group">
                                    <input required type="number" id="NetAmount0" name="NetAmount0"
                                           class="form-control bg-light" placeholder="Net Amount" readonly/>
                                </div>
                            </div>

                            <div class="col-4 mt-4">
                                <div id="collapseButtonDiv[0]" hidden>
                                    <button id="toggleCollapseButton"
                                            class="btn btn-primary mt-3 waves-effect waves-light collapsed"
                                            type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTable"
                                            aria-expanded="true"
                                            aria-controls="collapseExample">
                                        <i class="fas fa-angle-double-down me-2"></i>View Parameters
                                    </button>
                                </div>
                            </div>


                            <div class="col-md-2 mt-3">
                                <button type="button" class="btn rounded-pill btn-icon btn-label-danger waves-effect"
                                        onclick="removeItem(0)"><span class="ti ti-trash"></span></button>
                            </div>

                            <div class="col-12 mt-3" id="collapseTable">
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-bordered" id="selection-table[0]">
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-0 mt-3 row">
                        <div class="col-lg-2 col-md-12 col-sm-12">
                            <button type="button" class="btn btn-outline-primary d-grid w-100 waves-effect"
                                    onclick="addItem()">Add another
                            </button>
                        </div>

                        <div class="col-lg-2 col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-primary d-grid w-100">Save</button>
                        </div>
                    </div>


                    <div class="modal fade ValidateModelForTotalQty" id="addQty0" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-simple modal-edit-user modal-dialog-scrollable">

                            <div class="modal-content p-1 p-md-0" style="min-height: 60vh;">
                                <div class="modal-header text-white rounded-top bg-primary p-2">
                                    Parameter Information
                                </div>
                                <div class="modal-body">
                                    <div class="row g-3">
                                        <div class="col-md-12">

                                            <label class="form-label" for="sku_code0">Select SKUs</label>
                                            <select id="sku_code0" name="sku_code0" multiple
                                                    class="select2 select21 form-select" data-allow-clear="true"
                                                    data-placeholder="Select Product SKU">
                                                <option value="">Select</option>
                                            </select>
                                            <div id="table-container0"></div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-12 m-4">
                                    <button type="button" class="btn btn-label-success ml-3"
                                            data-bs-dismiss="modal"
                                            aria-label="Close" onclick="displaySelectionInTable(0)">
                                        Done
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </form>

@endsection


@section('page-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>

    <script>
        var products = @json($products);
        var counter = 0;
        var currentRowId = 0;

        function addItem() {
            counter++;
            $(`#table-container${counter}`).empty();
            var options = '';
            products.forEach(product => {
                options += `<option value="${product.id}">${product.product_name}</option>`;
            });
            var htmlContent = `
                <div class="row" id="row_${counter}">
                    <hr class="mt-3">
                    <div class="col-md-3 mt-3">
                        <label class="form-label" >Product</label>
                        <select id="product_id[${counter}]" name="product_id[${counter}]"
                                class="select2 select21 form-select" data-allow-clear="true"
                                data-placeholder="Select Product" onchange="getSkuByProduct(${counter});">
                            <option value="">Select</option>
                            ${options}
                        </select>
                    </div>
                    <div class="col-md-3 mt-3">
                        <label class="form-label" for="description[${counter}]">Description</label>
                        <input type="text" id="description[${counter}]" name="description[${counter}]" class="form-control"
                          placeholder="Add Description" />
                    </div>
                    <div class="col-md-3 mt-3">
                            <label class="form-label" for="unitPrice[${counter}]">Unit Price</label>
                            <input type="number" id="unitPrice[${counter}]" onchange="calculateTotal(${counter})" name="unitPrice[${counter}]" class="form-control"
                                    placeholder="Unit Price" />
                        </div>

                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="tax[${counter}]">Tax</label>
                            <input type="number" id="tax[${counter}]" onchange="calculateTotal(${counter})" name="tax[${counter}]" class="form-control"
                                    placeholder="Tax" />
                        </div>

                    <div class="col-4 col-md-4 mt-3">
                                <label class="form-label" for="TotalQty${counter}">Total Qty</label>
                                <div class="input-group">
                                    <input required type="number" id="TotalQty${counter}" name="TotalQty[${counter}]"
                                           class="form-control" placeholder="Total Qty" readonly />
                                    <div class="input-group-append">
                                        <button class="btn btn-primary waves-effect"
                                                data-bs-toggle="modal" data-bs-target="#addQty${counter}" type="button" onclick="getProductVariant(${counter})">
                                            <i class="fa fa-plus"></i> Add Sku Wise
                                        </button>

                                    </div>
                                </div>
                    </div>
                    <div class="col-4 col-md-4 mt-3">
                                <label class="form-label" for="NetAmount${counter}">Net Amount Of Total Qty</label>
                                <div class="input-group">
                                    <input required type="number" id="NetAmount${counter}" name="NetAmount${counter}"
                                           class="form-control bg-light" placeholder="Net Amount" readonly />
                                </div>
                     </div>
                    <div class="col-4 mt-4">
                        <div id="collapseButtonDiv[${counter}]" hidden>
                                <button id="toggleCollapseButton" class="btn btn-primary mt-3 waves-effect waves-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTable-${counter}" aria-expanded="true" aria-controls="collapseExample">
                                     <i class="fas fa-angle-double-down me-2"></i>View Parameters
                                </button>
                        </div>
                    </div>

                    <div class="col-md-2 mt-3">
                    <button type="button" class="btn rounded-pill btn-icon btn-label-danger waves-effect" onclick="removeItem(${counter})"><span class="ti ti-trash"></span></button>
                    </div>
                    <div class="col-12 mt-3" id="collapseTable-${counter}">
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-bordered" id="selection-table[${counter}]">
                                    </table>
                    </div>
                    </div>

                    <div class="modal fade ValidateModelForTotalQty" id="addQty${counter}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-simple modal-edit-user modal-dialog-scrollable">

                            <div class="modal-content p-1 p-md-0" style="min-height: 60vh;">
                                <div class="modal-header text-white rounded-top bg-primary p-2">
                                    Parameter Information
                                </div>
                                <div class="modal-body">
                                    <div class="row g-3">
                                        <div class="form-text">
                                            <b>Note</b> : All Quantity should be in comma separated
                                        </div>
                                        <div class="col-md-12">

                                            <label class="form-label" for="sku_code${counter}">Select SKUs</label>
                                            <select id="sku_code${counter}" name="sku_code${counter}" multiple
                                                    class="select2 select21 form-select" data-allow-clear="true"
                                                    data-placeholder="Select Product SKU">
                                                <option value="">Select</option>
                                            </select>
                                            <div id="table-container${counter}"></div>
                                        </div>

                                    </div>
                                </div>
                                    <div class="col-md-12 m-4">
                                        <button type="button" class="btn btn-label-success ml-3"
                                                data-bs-dismiss="modal"
                                                aria-label="Close" onclick="displaySelectionInTable(${counter})">
                                            Done
                                        </button>
                                    </div>
                            </div>
                        </div>
                    </div>

                </div>`;

            // Append the content to the table body
            $('#po_table').append(htmlContent);
            $('.select2').select2();

        }

        function removeItem(rowId) {
            $('#row_' + rowId).remove();
            counter = counter - 1;
        }

        function setCurrentRow(rowId) {
            currentRowId = rowId;
            $(`#sku_code${currentRowId}`).val(null).trigger('change');
            $(`#table-container${rowId}`).empty();
        }

        function getProductVariant(rowId) {
            currentRowId = rowId;

            $(`#sku_code${rowId}`).val(null).trigger('change');
            // $('#table-container').empty(); // Clear previous table
            var product_id = document.getElementById(`product_id[${rowId}]`).value;
            if (product_id) {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('getProductVariant') }}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {product_id: product_id, '_token': "{{ csrf_token() }}"},
                    dataType: 'json',
                    success: function (response) {
                        var colors = response.productColors;
                        var sizes = response.productSize;
                        var skus = response.productSkus;

                        $('#overlay').fadeOut(100);

                        // Create a new table
                        const skuSelect = document.getElementById(`sku_code${rowId}`);
                        skuSelect.innerHTML = '';// Clear existing options

                        // Add options for each SKU
                        skus.forEach((sku, index) => {
                            const option = document.createElement('option');
                            option.value = index; // Use index as the value to reference colors/sizes
                            option.text = sku + ' ' + colors[index];
                            option.setAttribute('data-color', colors[index]); // Store the color and size in attributes
                            option.setAttribute('data-size', sizes[index]);
                            skuSelect.appendChild(option);
                        });

                        // Event listener for SKU selection
                        $(skuSelect).on('change', function () {
                            var selectedIndexes = $(this).val(); // Array of selected indices

                            console.log(selectedIndexes);
                            if (selectedIndexes && selectedIndexes.length > 0) {
                                // Rebuild the table based on current selections
                                displaySkuTable(selectedIndexes, skus, colors, sizes);
                            } else {
                                $('#table-container').empty(); // Clear the table if no SKU is selected
                            }
                        });
                    }
                });
            } else {
                $(`#table-container${counter}`).empty();
            }
        }

        function getSkuByProduct(rowId) {
            $('#overlay').fadeIn(100);
            var product_id = document.getElementById(`product_id[${rowId}]`).value;
            if (product_id) {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('getSkuByProduct') }}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {product_id: product_id, '_token': "{{ csrf_token() }}"},
                    dataType: 'json',
                    success: function (response) {
                        var product_costPrice = response.productRow;

                        $('#overlay').fadeOut(100);

                        const unitPrice = document.getElementById(`unitPrice[${rowId}]`);
                        unitPrice.value = product_costPrice;

                    }
                });
            } else {
                $('#table-container').empty();
            }

            setTimeout(function () {
                $('#overlay').fadeOut(100);
            }, 1000);
        }


        function displaySkuTable(selectedIndexes, skus, colors, sizes) {
            document.getElementById(`table-container${counter}`).innerHTML = '';

            // Create a new table
            const table = document.createElement('table');
            table.setAttribute('id', 'dynamicTable');
            table.className = 'table table-bordered';

            // Create table header
            const thead = document.createElement('thead');
            const headerRow = document.createElement('tr');
            const headers = ['SKU', 'Product Color', 'Product Size', 'Qty', 'Action'];

            headers.forEach(header => {
                const th = document.createElement('th');
                th.innerText = header;
                headerRow.appendChild(th);
            });

            thead.appendChild(headerRow);
            table.appendChild(thead);

            // Create table body
            const tbody = document.createElement('tbody');

            selectedIndexes.forEach((selectedIndex) => {
                const sku = skus[selectedIndex];
                const color = colors[selectedIndex];
                const size = sizes[selectedIndex];

                const row = document.createElement('tr');

                const skuCell = document.createElement('td');
                skuCell.innerText = sku;
                const skuInput = document.createElement('input');
                skuInput.type = 'hidden';
                skuInput.name = `sku[${counter}][${selectedIndex}]`;
                skuInput.value = sku;
                skuCell.appendChild(skuInput);
                row.appendChild(skuCell);

                const colorCell = document.createElement('td');
                colorCell.innerText = color;
                const colorInput = document.createElement('input');
                colorInput.type = 'hidden';
                colorInput.value = color;
                colorInput.name = `color[${counter}][${selectedIndex}]`;
                colorCell.appendChild(colorInput);
                row.appendChild(colorCell);

                const sizeCell = document.createElement('td');
                sizeCell.innerText = size;
                const sizeInput = document.createElement('input');
                sizeInput.type = 'hidden';
                sizeInput.name = `size[${counter}][${selectedIndex}]`;
                sizeInput.value = size;
                sizeCell.appendChild(sizeInput);
                row.appendChild(sizeCell);

                const qtyCell = document.createElement('td');
                const qtyInput = document.createElement('input');
                qtyInput.type = 'number';
                qtyInput.name = `quantity[${counter}][${selectedIndex}]`;
                qtyInput.placeholder = 'Enter Qty';
                qtyInput.className = 'form-control';
                qtyInput.min = '0';
                qtyInput.required = true;
                qtyInput.addEventListener('input', function () {
                    updateTotalQty(counter);
                });
                qtyCell.appendChild(qtyInput);
                row.appendChild(qtyCell);

                const deleteCell = document.createElement('td');
                deleteCell.innerHTML = `
            <button type="button" class="btn rounded-pill btn-icon btn-label-danger waves-effect" onclick="removeRowInModel(${selectedIndex})">
                <span class="ti ti-trash"></span>
            </button>
            `;
                row.appendChild(deleteCell);

                tbody.appendChild(row);
            });

            table.appendChild(tbody);
            document.getElementById(`table-container${counter}`).appendChild(table);
        }

        function displaySelectionInTable(rowId) {

            const selectionTable = document.getElementById(`selection-table[${rowId}]`);
            selectionTable.innerHTML = '';

            const dynamicTable = document.getElementById('dynamicTable');
            const rows = dynamicTable.querySelectorAll('tbody tr');

            const headerRow = document.createElement('tr');
            const headers = ['SKU', 'Product Color', 'Product Size', 'Qty'];

            headers.forEach(header => {
                const th = document.createElement('th');
                th.innerText = header;
                headerRow.appendChild(th);
            });

            selectionTable.appendChild(headerRow);

            rows.forEach(row => {
                const sku = row.querySelector('input[name^="sku"]').value;
                const color = row.querySelector('input[name^="color"]').value;
                const size = row.querySelector('input[name^="size"]').value;
                const qty = row.querySelector('input[name^="quantity"]').value;

                if (!qty) {
                    alert("Quantity is required");
                    row.querySelector('input[name^="quantity"]').focus;
                    return false;
                }
                const newRow = document.createElement('tr');

                newRow.innerHTML = `
            <td>${sku}</td>
            <td>${color}</td>
            <td>${size}</td>
            <td>${qty}</td>
        `;
                selectionTable.appendChild(newRow);
            });
            calculateTotal(rowId);

            const collapseButtonDiv = document.getElementById(`collapseButtonDiv[${rowId}}]`);
            collapseButtonDiv.removeAttribute('hidden');

        }

        function updateTotalQty(rowId) {
            let totalQty = 0;

            const qtyInputs = document.querySelectorAll(`.form-control[name^="quantity[${rowId}]"]`);

            qtyInputs.forEach(input => {
                const qty = parseInt(input.value) || 0;
                totalQty += qty;
            });

            document.getElementById(`TotalQty${rowId}`).value = totalQty;
        }

        function calculateTotal(rowId) {
            console.log("function called");
            let unitPrice = parseFloat(document.getElementById(`unitPrice[${rowId}]`).value) || 0;
            let tax = parseFloat(document.getElementById(`tax[${rowId}]`).value) || 0;
            let totalQty = parseFloat(document.getElementById(`TotalQty${rowId}`).value) || 0;

            let unitPriceWithTax = unitPrice + (unitPrice * (tax / 100));

            let totalNetAmount = unitPriceWithTax * totalQty;

            document.getElementById(`NetAmount${rowId}`).value = totalNetAmount.toFixed(2);
        }

        function removeRowInModel(selectedIndex) {
            const skuSelect = $(`#sku_code${counter}`);
            let selectedValues = skuSelect.val();

            if (selectedValues) {
                if (!Array.isArray(selectedValues)) {
                    selectedValues = [selectedValues];
                }

                selectedValues = selectedValues.filter(value => value !== String(selectedIndex));

                // Update the select element
                skuSelect.val(selectedValues).trigger('change');
            }
        }

        function getAllDetails() {
            getCompanyAddress();
            shipAddressByCompany();
        }

        function getCompanyAddress() {

            var company_id = document.getElementById('company_id').value;

            if (company_id) {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('getCompanyAddress') }}",
                    // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        company_id: company_id,
                        '_token': "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: function (response) {
                        $('#compAdd').empty().append('<h5>Company address :</h5>' +
                            '<p>' + response.company_name + '</p> ' +
                            '<p class="mb-0">' + response.add_line1 + ' ' + response.AddLine2 + '</p>' +
                            '<p class="mb-2">' + response.City + ', ' + response.State + ', ' + response.PinCode + '</p>' +
                            '<p class="mb-0">' + response.billing_mobile_no + '</p>' +
                            '<p class="mb-2">' + response.billing_email + ' </p>' +
                            '<p class="mb-2">GST No. : ' + response.gst_no + ' </p>');
                        $('#shipAdd').empty();
                    }
                });
            } else {
                $('#compAdd').empty();
            }
        }

        function shipAddressByCompany() {
            $('#overlay').fadeIn(100);

            var company_id = document.getElementById('company_id').value;

            if (company_id) {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('shipAddressByCompany') }}",
                    // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        company_id: company_id,
                        '_token': "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: function (response) {

                        $('#shippingAddress').empty().append('<option value="">Select Shipping Address Category</option>');
                        $.each(response, function (key, value) {
                            $('#shippingAddress').append('<option value="' + value.id + '">' + value
                                .ShipCompName + '</option>');
                        });
                        $('#overlay').fadeOut(100);
                    }
                });
            } else {
                $('#shippingAddress').empty();
            }

            setTimeout(function () {
                $('#overlay').fadeOut(100);
            }, 1000);
        }

        function getShippingAddress() {
            var ship_id = document.getElementById('shippingAddress').value;

            if (ship_id) {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('getShippingAddress') }}",
                    // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        ship_id: ship_id,
                        '_token': "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: function (response) {
                        $('#shipAdd').empty().append('<h5>Company address :</h5>' +
                            '<p>' + response.ShipCompName + '</p> ' +
                            '<p class="mb-0">' + response.ShipAddLine1 + ' ' + response.ShipAddLine2 + '</p>' +
                            '<p class="mb-2">' + response.ShipCity + ', ' + response.ShipState + ', ' + response.ShipPinCode + '</p>' +
                            '<p class="mb-0">' + response.ShipPersonNo + '</p>' +
                            '<p class="mb-2">' + response.ShipPersonEmail + ' </p>' +
                            '<p class="mb-2">GST No. : ' + response.ShipGstNo + ' </p>');
                    }
                });
            } else {
                $('#shipAdd').empty();
            }
        }

        function getVendorAddress() {
            const vendorId = document.getElementById('vendor').value;
            if (vendorId) {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('getVendorAddress') }}",
                    // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        vendorId: vendorId,
                        '_token': "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: function (response) {
                        $('#vendorAdd').empty().append('<h5>Company address :</h5>' +
                            '<p>' + response.name + '</p> ' +
                            '<p class="mb-0">' + response.user_address.b_address1 + ' ' + response.user_address.b_address2 + '</p>' +
                            '<p class="mb-2">' + response.user_address.b_city + ', ' + response.user_address.b_state + ', ' + response.user_address.b_pincode + '</p>' +
                            '<p class="mb-0">' + response.mobile_number + '</p>' +
                            '<p class="mb-2">' + response.email + ' </p>' +
                            '<p class="mb-2">PAN Card No. : ' + response.pancard_no + ' </p>');
                    }
                });
            } else {
                $('#vendorAdd').empty();
            }

        }

    </script>
@endsection
