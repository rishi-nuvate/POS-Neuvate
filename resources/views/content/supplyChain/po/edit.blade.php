@extends('layouts/layoutMaster')

@section('title', 'Edit-P.O.')

@section('content')
    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/supplyChain') }}">Supply Chain</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{route('po.index')}}">
                    P.O.
                </a>
            </li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
    <!-- Invoice List Widget -->

    <div class="card">
        <div class="text-white rounded-top bg-primary p-2">
            Edit P.O.
        </div>
        <div class="card-body">
            <div class="content">
                <form method="post" action="{{ route('po.update', ['po' => $Po->id]) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="row">
                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="company">Company</label>
                            <select required id="company_id" name="company"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select Company" onchange="getAllDetails()">
                                <option value="">Select</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}"
                                        {{ $Po->Company->id == $company->id ? 'selected' : '' }}>
                                        {{ $company->company_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="shippingAddress">Shipping Address</label>
                            <select required id="shippingAddress" name="shippingAddress"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select Address" onchange="getShippingAddress()">
                                <option value="">Select</option>
                                @foreach($shipAddresses as $shipAddress)
                                    <option value="{{ $shipAddress->id }}"
                                        {{ $Po->ShipAddress->id == $shipAddress->id ? 'selected' : '' }}>
                                        {{ $shipAddress->ShipAddLine1 }}
                                    </option>
                                @endforeach
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
                                    data-placeholder="Select Vendor" onchange="getVendorAddress()">
                                <option value="">Select</option>
                                @foreach($vendors as $vendor)
                                    <option value="{{ $vendor->id }}"
                                        {{ $Po->Vendor->id == $vendor->id ? 'selected' : '' }}>
                                        {{ $vendor->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 my-4 mx-1" id="vendorAdd">

                        </div>
                    </div>

                    <div class="col-md-3 mt-3">
                        <label class="form-label" for="poNumber">Po No</label>
                        <input type="text" id="poNumber" name="poNumber" class="form-control"
                               placeholder="Add Purchase Order Number" value="{{ $Po->po_no }}"/>
                    </div>

                    <input type="hidden" value="{{ $Po->id }}" name="purchaseOrderId">
                    @php
                        $num = 0
                    @endphp
                    <div class="row" id="po_table">
                        @foreach($Po->PurchaseOrderItem as $PoItem)

                            <input type="hidden" value="{{ $PoItem->id }}" name="poItemId[{{ $num }}]"
                                   id="poItemId{{ $num }}">
                            <div class="row" id="row_{{ $num }}">
                                <hr class="mt-5">
                                <div class="col-md-3 mt-3">
                                    <label class="form-label">Product</label>
                                    <select id="product_id[{{ $num }}]" name="product_id[{{ $num }}]"
                                            class="select2 select21 form-select" data-allow-clear="true"
                                            data-placeholder="Select Product" onchange="getSkuByProduct({{ $num }});">
                                        <option value="">Select</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}"
                                                {{ $PoItem->product->id == $product->id ? 'selected' : '' }}>
                                                {{ $product->product_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3 mt-3">
                                    <label class="form-label" for="description[{{ $num }}]">Description</label>
                                    <input type="text" id="description[{{ $num }}]" name="description[{{ $num }}]"
                                           class="form-control"
                                           placeholder="Add Description" value="{{ $PoItem->product_description }}"/>
                                </div>

                                <div class="col-md-3 mt-3">
                                    <label class="form-label" for="unitPrice[{{ $num }}]">Unit Price</label>
                                    <input type="number" id="unitPrice[{{ $num }}]" name="unitPrice[{{ $num }}]"
                                           class="form-control"
                                           placeholder="Unit Price" value="{{ $PoItem->unit_price }}"/>
                                </div>

                                <div class="col-md-3 mt-3">
                                    <label class="form-label" for="tax[{{ $num }}]">Tax</label>
                                    <input type="number" id="tax[{{ $num }}]" name="tax[{{ $num }}]"
                                           class="form-control"
                                           placeholder="Tax" value="{{ $PoItem->tax_amount }}"/>
                                </div>

                                <input type="hidden" value="{{ $PoItem->po_id ?? $Po->id }}" id="po_id{{ $num }}">

                                @foreach($PoItem->purchaseOrderItemParameter as $Parameter)
                                    <input type="hidden" value="{{ $Parameter->po_item_id}}" id="po_item_id{{ $num }}">
                                @endforeach

                                <div class="col-4 col-md-4 mt-3">
                                    <label class="form-label" for="TotalQty{{ $num }}">Total Qty</label>
                                    <div class="input-group">
                                        <input required type="number" id="TotalQty{{ $num }}"
                                               name="TotalQty[{{ $num }}]"
                                               class="form-control" placeholder="Total Qty"
                                               value="{{ $PoItem->total_quantity }}" readonly/>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary waves-effect"
                                                    data-bs-toggle="modal" data-bs-target="#addQty{{ $num }}"
                                                    type="button" onclick="getSelectedParameters({{ $num }});">
                                                <i class="fa fa-plus"></i> Add Sku Wise
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4 col-md-4 mt-3">
                                    <label class="form-label" for="NetAmount{{ $num }}">Net Amount Of Total Qty</label>
                                    <div class="input-group">
                                        <input required type="number" id="NetAmount{{ $num }}"
                                               name="NetAmount{{ $num }}"
                                               class="form-control bg-light" placeholder="Net Amount" readonly/>
                                    </div>
                                </div>

                                <div class="col-4 mt-4">
                                    <div id="collapseButtonDiv[{{ $num }}]" hidden>
                                        <button id="toggleCollapseButton"
                                                class="btn btn-primary mt-3 waves-effect waves-light collapsed"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#collapseTable"
                                                aria-expanded="true" aria-controls="collapseExample">
                                            <i class="fas fa-angle-double-down me-2"></i>View Parameters
                                        </button>
                                    </div>
                                </div>

                                <div class="col-md-2 mt-3">
                                    <button type="button"
                                            class="btn rounded-pill btn-icon btn-label-danger waves-effect"
                                            onclick="confirmAction({{ $PoItem->id }})"><span class="ti ti-trash"></span>
                                    </button>
                                </div>

                                <div class="col-12 mt-3" id="collapseTable">
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-bordered" id="selection-table[{{ $num }}]">
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade ValidateModelForTotalQty" id="addQty{{ $num }}" tabindex="-1"
                                 aria-hidden="true">
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

                                                    <label class="form-label" for="sku_code{{ $num }}">Select
                                                        SKUs</label>
                                                    <select id="sku_code{{ $num }}" name="sku_code{{ $num }}" multiple
                                                            class="select2 select21 form-select" data-allow-clear="true"
                                                            data-placeholder="Select Product SKU">
                                                        <option value="">Select</option>
                                                        @if($Po->purchaseOrderItem)
                                                            @foreach($Po->purchaseOrderItem as $PoItem)
                                                                @if($PoItem->purchaseOrderItemParameters)
                                                                    @foreach($PoItem->purchaseOrderItemParameters as $PoParameter)
                                                                        <option value="{{ $PoParameter->id }}" selected>
                                                                            {{ $PoParameter->item_sku }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    <div id="table-container{{ $num }}"></div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-12 m-4">
                                            <button type="button" class="btn btn-label-success ml-3"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close" onclick="displaySelectionInTable({{ $num }})">
                                                Done
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            @php
                                $num++
                            @endphp
                        @endforeach
                    </div>
                    <div class="px-0 mt-3 row">
                        <div class="col-lg-2 col-md-12 col-sm-12">
                            <button type="button" class="btn btn-outline-primary d-grid w-100 waves-effect"
                                    onclick="addItem()">Add another
                            </button>
                        </div>

                        <div class="col-lg-2 col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-primary d-grid w-100">Update</button>
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
        $(document).ready(function () {
            getAllDetails();
            getCompanyAddress();
            getShippingAddress();
            getVendorAddress();
        });
        var products = @json($products);
        var counter = {{ $num }};


        var currentRowId = 0;

        function addItem() {
            counter++;
            console.log(counter);
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
                                                data-bs-toggle="modal" data-bs-target="#addQty${counter}" type="button" onclick="getProductVariant(${counter});">
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

            $(`#po_table`).append(htmlContent);

        }

        function removeItem(rowId) {
            $('#row_' + rowId).remove();
            counter = counter - 1;
        }

        function getProductVariant(rowId) {
            currentRowId = rowId;

            $(`#sku_code${currentRowId}`).val(null).trigger('change');
            $(`#table-container${currentRowId}`).empty();
            var product_id = document.getElementById(`product_id[${currentRowId}]`).value;
            console.log(product_id);
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
                        const skuSelect = document.getElementById(`sku_code${currentRowId}`);
                        skuSelect.innerHTML = '';

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
                                displaySkuTable(selectedIndexes, skus, colors, sizes, qtys = 0, currentRowId);
                            } else {
                                $(`#table-container${currentRowId}`).empty();
                            }
                        });
                    }
                });
            } else {
                $(`#table-container${currentRowId}`).empty();
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
                $(`#table-container${counter}`).empty();
            }

            setTimeout(function () {
                $('#overlay').fadeOut(100);
            }, 1000);
        }

        function displaySkuTable(selectedIndexes, skus, colors, sizes, qtys, rowId) {
            const tableContainer = document.getElementById(`table-container${rowId}`);
            tableContainer.innerHTML = '';

            // Create a new table
            const table = document.createElement('table');
            table.setAttribute('id', `dynamicTable${rowId}`);
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
                const qty = qtys[selectedIndex] !== undefined ? qtys[selectedIndex] : '';

                // Create a row for the selected SKU
                const row = document.createElement('tr');

                // SKU Cell
                const skuCell = document.createElement('td');
                skuCell.innerText = sku;
                const skuInput = document.createElement('input');
                skuInput.type = 'hidden';
                skuInput.name = `sku[${rowId}][${selectedIndex}]`;
                skuInput.value = sku;
                skuCell.appendChild(skuInput);
                row.appendChild(skuCell);

                // Product Color Cell
                const colorCell = document.createElement('td');
                colorCell.innerText = color;
                const colorInput = document.createElement('input');
                colorInput.type = 'hidden';
                colorInput.value = color;
                colorInput.name = `color[${rowId}][${selectedIndex}]`;
                colorCell.appendChild(colorInput);
                row.appendChild(colorCell);

                // Product Size Cell
                const sizeCell = document.createElement('td');
                sizeCell.innerText = size;
                const sizeInput = document.createElement('input');
                sizeInput.type = 'hidden';
                sizeInput.name = `size[${rowId}][${selectedIndex}]`;
                sizeInput.value = size;
                sizeCell.appendChild(sizeInput);
                row.appendChild(sizeCell);

                // Quantity Cell
                const qtyCell = document.createElement('td');
                const qtyInput = document.createElement('input');
                qtyInput.type = 'number';
                qtyInput.name = `quantity[${rowId}][${selectedIndex}]`;
                qtyInput.placeholder = 'Enter Qty';
                qtyInput.className = 'form-control';
                qtyInput.min = '0';
                qtyInput.required = true;
                qtyInput.value = qty;
                qtyInput.addEventListener('input', function () {
                    updateTotalQty(rowId);
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
            document.getElementById(`table-container${rowId}`).appendChild(table);
        }

        function displaySelectionInTable(rowId) {

            const selectionTable = document.getElementById(`selection-table[${rowId}]`);
            selectionTable.innerHTML = '';

            const dynamicTable = document.getElementById(`dynamicTable${rowId}`);
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

            rows.forEach(row => {
                const sku = row.querySelector('input[name^="sku"]').value;
                const color = row.querySelector('input[name^="color"]').value;
                const size = row.querySelector('input[name^="size"]').value;
                const qty = row.querySelector('input[name^="quantity"]').value;

                if (!qty) {
                    alert("Quantity is required");
                    row.querySelector('input[name^="quantity"]').focus;
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
            });

            const collapseButtonDiv = document.getElementById(`collapseButtonDiv[${rowId}]`);
            collapseButtonDiv.removeAttribute('hidden');

            calculateTotal(currentRowId);
        }

        function updateTotalQty(rowId) {
            let totalQty = 0;
            const qtyInputs = document.querySelectorAll(`.form-control[name^="quantity[${rowId}]"]`);

            qtyInputs.forEach(input => {
                const qty = parseInt(input.value) || 0;
                totalQty += qty;
            });

            // Update the Total Qty input field
            document.getElementById(`TotalQty${rowId}`).value = totalQty;
        }

        function calculateTotal(rowId) {

            let unitPrice = parseFloat(document.getElementById(`unitPrice[${rowId}]`).value) || 0;
            let tax = parseFloat(document.getElementById(`tax[${rowId}]`).value) || 0;
            let totalQty = parseFloat(document.getElementById(`TotalQty${rowId}`).value) || 0;

            let unitPriceWithTax = unitPrice + (unitPrice * (tax / 100));

            let totalNetAmount = unitPriceWithTax * totalQty;

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

        function getSelectedParameters(rowId) {
            currentRowId = rowId;
            $(`#sku_code${rowId}`).val(null).trigger('change');
            $('#table-container').empty(); // Clear previous table
            let product_id = document.getElementById(`product_id[${rowId}]`).value;
            let po_id = document.getElementById(`po_id${rowId}`).value;
            let po_item_id = document.getElementById(`po_item_id${rowId}`).value;
            if (product_id) {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('getSelectedParameters') }}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        product_id: product_id,
                        po_id: po_id,
                        po_item_id: po_item_id,
                        '_token': "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: function (response) {
                        let colors = response.productColors;
                        let sizes = response.productSize;
                        let skus = response.productSkus;
                        var qtys = response.productQty;

                        $('#overlay').fadeOut(100);

                        const skuSelect = document.getElementById(`sku_code${rowId}`);
                        skuSelect.innerHTML = '';

                        // Add options for each SKU
                        skus.forEach((sku, index) => {
                            const option = document.createElement('option');
                            option.value = index;
                            option.text = sku + ' ' + colors[index];
                            option.setAttribute('data-color', colors[index]);
                            option.setAttribute('data-size', sizes[index]);
                            option.selected = true;

                            skuSelect.appendChild(option);
                        });


                        displaySkuTable(skus.map((_, index) => index), skus, colors, sizes, qtys, currentRowId);
                    }
                });
            } else {
                $(`#table-container${rowId}`).empty();
            }

            setTimeout(function () {
                $('#overlay').fadeOut(100);
            }, 1000);
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
                            '<p class="mb-0">' + response.AddLine1 + ' ' + response.AddLine2 + '</p>' +
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

        function confirmAction(poItemId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You can proceed with the action.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, proceed!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // $('#row_' + num).remove();
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('deletePurchaseOrderItemRow') }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            poItemId: poItemId,
                            "_token": "{{ csrf_token() }}"
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
