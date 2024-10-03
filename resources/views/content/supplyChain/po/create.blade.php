@extends('layouts/layoutMaster')

@section('title', 'Create-P.O.')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light float-left">Supply Chain/ P.O. /</span> Add
    </h4>
    <!-- Invoice List Widget -->

    <div class="card">
        <div class="card-body">
            <div class="content">
                <div class="content-header mb-4">
                    <h3 class="mb-1">Create P.O.</h3>
                </div>
                <form method="post" action="{{ route('po.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="company">Company</label>
                            <select required id="company_id" name="company"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select Company" onchange="getAllDetails()">
                                <option value="">Select</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->CompanyName }}</option>
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
                    <div class="row" id="po_table">
                        <div class="row" id="row_0">
                            <hr class="mt-5">
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
                                <input type="number" id="unitPrice[0]" onchange="calculateTotal(0)" name="unitPrice[0]" class="form-control"
                                       placeholder="Unit Price"/>
                            </div>

                            <div class="col-md-3 mt-3">
                                <label class="form-label" for="tax[0]">Tax</label>
                                <input type="number" id="tax[0]" name="tax[0]" onchange="calculateTotal(0)" class="form-control"
                                       placeholder="Tax"/>
                            </div>


                            <div class="col-4 col-md-4 mt-3">
                                <label class="form-label" for="TotalQty0">Total Qty</label>
                                <div class="input-group">
                                    <input required type="number" id="TotalQty0" name="TotalQty[0]"
                                           class="form-control" placeholder="Total Qty" readonly/>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary waves-effect"
                                                data-bs-toggle="modal" data-bs-target="#addQty" type="button"
                                                onclick="getProductVariant(0)">
                                            <i class="fa fa-plus"></i> Add Sku Wise
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 mt-3" id="collapseButtonDiv[0]" hidden>
                                <button id="toggleCollapseButton"
                                        class="btn btn-primary me-1 waves-effect waves-light collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTable" aria-expanded="true"
                                        aria-controls="collapseExample">
                                    Toggle Selected Parameters
                                </button>
                            </div>

                            <div class="col-3 col-md-3 mt-3">
                                <label class="form-label" for="NetAmount0">Net Amount Of Total Qty</label>
                                <div class="input-group">
                                    <input required type="number" id="NetAmount0" name="NetAmount0"
                                           class="form-control" placeholder="Net Amount" readonly/>
                                </div>
                            </div>

                            <div class="col-md-2 mt-4">
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


                    <div class="modal fade ValidateModelForTotalQty" id="addQty" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-simple modal-edit-user modal-dialog-scrollable">

                            <div class="modal-content p-1 p-md-0">
                                <div class="modal-header text-white rounded-top bg-primary p-2">
                                    Parameter Information
                                </div>
                                <div class="modal-body">
                                    <div class="row g-3">
                                        <div class="form-text">
                                            <b>Note</b> : All Quantity should be in comma separated
                                        </div>
                                        <div class="col-md-12">

                                            <label class="form-label" for="sku_code">Select SKUs</label>
                                            <select id="sku_code" name="sku_code" multiple
                                                    class="select2 select21 form-select" data-allow-clear="true"
                                                    data-placeholder="Select Product SKU">
                                                <option value="">Select</option>
                                            </select>
                                            <div id="table-container"></div>
                                        </div>
                                        <div class="row pt-4">
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-label-success ml-3"
                                                        data-bs-dismiss="modal"
                                                        aria-label="Close" onclick="displaySelectionInTable()">
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
            </div>
        </div>
    </div>

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
            $('#table-container').empty();
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
                                                data-bs-toggle="modal" data-bs-target="#addQty" type="button" onclick="getProductVariant(${counter})">
                                            <i class="fa fa-plus"></i> Add Sku Wise
                                        </button>

                                    </div>
                                </div>
                    </div>
                    <div class="col-4 mt-5" id="collapseButtonDiv[${counter}]" hidden>
                                <button id="toggleCollapseButton" class="btn btn-primary me-1 waves-effect waves-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTable-${counter}" aria-expanded="true" aria-controls="collapseExample">
                                     Toggle Selected Parameters
                                </button>
                    </div>
                     <div class="col-4 col-md-4 mt-3">
                                <label class="form-label" for="NetAmount${counter}">Net Amount Of Total Qty</label>
                                <div class="input-group">
                                    <input required type="number" id="NetAmount${counter}" name="NetAmount${counter}"
                                           class="form-control" placeholder="Net Amount" readonly />
                                </div>
                     </div>
                    <div class="col-md-2 mt-5">
                    <button type="button" class="btn rounded-pill btn-icon btn-label-danger waves-effect" onclick="removeItem(${counter})"><span class="ti ti-trash"></span></button>
                    </div>
                    <div class="col-12 mt-3" id="collapseTable-${counter}">
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-bordered" id="selection-table[${counter}]">
                                    </table>
                    </div>
                    </div>

                </div>`;

            // Append the content to the table body
            $('#po_table').append(htmlContent);


        }

        function removeItem(rowId) {
            // Remove the row with the given rowId
            $('#row_' + rowId).remove();
        }

        function getProductVariant(rowId) {
            currentRowId = rowId;
            // Optionally, you can reset the modal fields here if needed
            $('#sku_code').val(null).trigger('change'); // Reset SKU selection
            $('#table-container').empty(); // Clear previous table
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
                        const skuSelect = document.getElementById('sku_code');
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
                $('#table-container').empty();
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

                        // Create a new table
                        // const skuSelect = document.getElementById('sku_code');
                        // skuSelect.innerHTML = '';// Clear existing options
                        //
                        // // Add options for each SKU
                        // skus.forEach((sku, index) => {
                        //     const option = document.createElement('option');
                        //     option.value = index; // Use index as the value to reference colors/sizes
                        //     option.text = sku +' '+colors[index];
                        //     option.setAttribute('data-color', colors[index]); // Store the color and size in attributes
                        //     option.setAttribute('data-size', sizes[index]);
                        //     skuSelect.appendChild(option);
                        // });
                        //
                        // // Event listener for SKU selection
                        // $(skuSelect).on('change', function() {
                        //     var selectedIndexes = $(this).val(); // Array of selected indices
                        //
                        //     if (selectedIndexes && selectedIndexes.length > 0) {
                        //         // Rebuild the table based on current selections
                        //         displaySkuTable(selectedIndexes, skus, colors, sizes);
                        //     } else {
                        //         $('#table-container').empty(); // Clear the table if no SKU is selected
                        //     }
                        // });
                    }
                });
            } else {
                $('#table-container').empty();
            }

            setTimeout(function () {
                $('#overlay').fadeOut(100);
            }, 1000);
        }


        // Function to dynamically display the table for the selected SKU

        function displaySkuTable(selectedIndexes, skus, colors, sizes) {
            document.getElementById('table-container').innerHTML = '';

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

                // Create a row for the selected SKU
                const row = document.createElement('tr');

                // SKU Cell
                const skuCell = document.createElement('td');
                skuCell.innerText = sku;
                const skuInput = document.createElement('input');
                skuInput.type = 'hidden';
                skuInput.name = `sku[${selectedIndex}]`;
                skuInput.value = sku;
                skuCell.appendChild(skuInput);
                row.appendChild(skuCell);

                // Product Color Cell
                const colorCell = document.createElement('td');
                colorCell.innerText = color;
                const colorInput = document.createElement('input');
                colorInput.type = 'hidden';
                colorInput.value = color;
                colorInput.name = `color[${selectedIndex}]`;
                colorCell.appendChild(colorInput);
                row.appendChild(colorCell);

                // Product Size Cell
                const sizeCell = document.createElement('td');
                sizeCell.innerText = size;
                const sizeInput = document.createElement('input');
                sizeInput.type = 'hidden';
                sizeInput.name = `size[${selectedIndex}]`;
                sizeInput.value = size;
                sizeCell.appendChild(sizeInput);
                row.appendChild(sizeCell);

                // Quantity Cell
                const qtyCell = document.createElement('td');
                const qtyInput = document.createElement('input');
                qtyInput.type = 'number';
                qtyInput.name = `quantity[${selectedIndex}]`; // Map quantity to SKU index
                qtyInput.placeholder = 'Enter Qty';
                qtyInput.className = 'form-control';
                qtyInput.min = '0'; // Optional: Set minimum value
                qtyInput.required = true;
                qtyInput.addEventListener('input', function () {
                    updateTotalQty(currentRowId);
                });
                qtyCell.appendChild(qtyInput);
                row.appendChild(qtyCell);

                // Action (Delete) Cell
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
            document.getElementById('table-container').appendChild(table);
        }

        function displaySelectionInTable() {


            const selectionTable = document.getElementById(`selection-table[${currentRowId}]`);
            selectionTable.innerHTML = ''; // Clear the current table

            // Fetch data from the dynamic table
            const dynamicTable = document.getElementById('dynamicTable');
            const rows = dynamicTable.querySelectorAll('tbody tr');

            // Create table headers for the selection table
            const headerRow = document.createElement('tr');
            const headers = ['SKU', 'Product Color', 'Product Size', 'Qty'];

            headers.forEach(header => {
                const th = document.createElement('th');
                th.innerText = header;
                headerRow.appendChild(th);
            });

            selectionTable.appendChild(headerRow);

            // Append each row from dynamic table to the selection table
            rows.forEach(row => {
                const sku = row.querySelector('input[name^="sku"]').value;
                const color = row.querySelector('input[name^="color"]').value;
                const size = row.querySelector('input[name^="size"]').value;
                const qty = row.querySelector('input[name^="quantity"]').value;

                if (!qty) {
                    // If qty is empty, show an error or prevent form submission
                    alert("Quantity is required");
                    row.querySelector('input[name^="quantity"]').focus;  // Focus the input field
                    return false;  // Prevent further actions
                }
                const newRow = document.createElement('tr');

                newRow.innerHTML = `
            <td>${sku}</td>
            <td>${color}</td>
            <td>${size}</td>
            <td>${qty}</td>
        `;

                selectionTable.appendChild(newRow);
                // }
            });

            const collapseButtonDiv = document.getElementById(`collapseButtonDiv[${currentRowId}]`);
            collapseButtonDiv.removeAttribute('hidden');

            calculateTotal(currentRowId);
        }

        function updateTotalQty(rowId) {
            let totalQty = 0;

            // Get all the quantity input fields
            const qtyInputs = document.querySelectorAll('.form-control[name^="quantity"]');

            qtyInputs.forEach(input => {
                const qty = parseInt(input.value) || 0; // Get the quantity value or 0 if empty
                totalQty += qty; // Add to the total
            });

            // Update the Total Qty input field
            document.getElementById(`TotalQty${rowId}`).value = totalQty;
        }

        function calculateTotal(rowId) {
            // Get the values
            let unitPrice = parseFloat(document.getElementById(`unitPrice[${rowId}]`).value) || 0;
            let tax = parseFloat(document.getElementById(`tax[${rowId}]`).value) || 0;
            let totalQty = parseFloat(document.getElementById(`TotalQty${rowId}`).value) || 0;

            // Calculate unit price with tax
            let unitPriceWithTax = unitPrice + (unitPrice * (tax / 100));

            // Calculate total amount
            let totalNetAmount = unitPriceWithTax * totalQty;

            // Display the total amount
            document.getElementById(`NetAmount${rowId}`).value = totalNetAmount.toFixed(2);
        }

        function removeRowInModel(selectedIndex) {
            const skuSelect = $('#sku_code');
            let selectedValues = skuSelect.val(); // Array of selected indices

            if (selectedValues) {
                // Convert to an array if it's not
                if (!Array.isArray(selectedValues)) {
                    selectedValues = [selectedValues];
                }

                // Remove the selectedIndex from the array
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
                            '<p>' + response.CompanyName + '</p> ' +
                            '<p class="mb-0">' + response.AddLine1 + ' ' + response.AddLine2 + '</p>' +
                            '<p class="mb-2">' + response.City + ', ' + response.State + ', ' + response.PinCode + '</p>' +
                            '<p class="mb-0">' + response.BillingMobileNo + '</p>' +
                            '<p class="mb-2">' + response.BillingEmail + ' </p>' +
                            '<p class="mb-2">GST No. : ' + response.PanGstNo + ' </p>');
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
