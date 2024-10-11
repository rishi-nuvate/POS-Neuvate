@extends('layouts/layoutMaster')

@section('title', 'Create-Sales-Order')


@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light float-left">Order Requisition/ Sales Order /</span> Create
    </h4>
    <!-- Invoice List Widget -->



    <form method="post" action="" enctype="multipart/form-data">
        @csrf
        <div class="card">

            <div class="card-body">
                <div class="content">

                    <div class="content-header mb-4">
                        <h3 class="mb-1">Create Sales Order</h3>
                    </div>


                    <div class="row">
                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="store_id">Store</label>
                            <select required id="store_id" name="store_id"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select Company">
                                <option value="">Select</option>
                                @foreach($companies as $company)
                                    <option value="{{$company->id}}">{{$company->CompanyName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">

                        {{-- Product --}}
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

                        <div class="col-4 col-md-3 mt-3">
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

                        {{--Unit Price--}}
                        <div class="col-md-2 mt-3">
                            <label class="form-label" for="unitPrice[0]">Unit Price</label>
                            <input type="number" id="unitPrice[0]" onchange="calculateTotal(0)" name="unitPrice[0]"
                                   class="form-control"
                                   placeholder="Unit Price"/>
                        </div>


                        {{--Tax--}}
                        <div class="col-md-2 mt-3">
                            <label class="form-label" for="tax[0]">Tax</label>
                            <input type="number" id="tax[0]" name="tax[0]" onchange="calculateTotal(0)"
                                   class="form-control"
                                   placeholder="Tax"/>
                        </div>

                        <div class="col-3 col-md-2 mt-3">
                            <label class="form-label" for="NetAmount0">Net Amount Of Total Qty</label>
                            <div class="input-group">
                                <input required type="number" id="NetAmount0" name="NetAmount0"
                                       class="form-control bg-light" placeholder="Net Amount" readonly/>
                            </div>
                        </div>

                    </div>
                    <div id="po_table">

                    </div>

                </div>
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
                            <div class="form-text">
                                <b>Note</b> : All Quantity should be in comma separated
                            </div>
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

        <div class="card mt-3">
            <div class="card-body">
                <div class="content">
                    <div class="row">

                        <div class="col-md-2">
                            <button type="button" class="btn btn-label-warning" onclick="addItem()">
                                Add more products
                            </button>
                        </div>

                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection


@section('page-script')
    {{--    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>--}}
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>

    <script>

        var products = @json($products);
        var counter = 0;
        var currentRowId = 0;

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

        function displaySelectionInTable(rowId) {

            //     const selectionTable = document.getElementById(`selection-table[${rowId}]`);
            //     selectionTable.innerHTML = '';
            //
            //     const dynamicTable = document.getElementById('dynamicTable');
            //     const rows = dynamicTable.querySelectorAll('tbody tr');
            //
            //     const headerRow = document.createElement('tr');
            //     const headers = ['SKU', 'Product Color', 'Product Size', 'Qty'];
            //
            //     headers.forEach(header => {
            //         const th = document.createElement('th');
            //         th.innerText = header;
            //         headerRow.appendChild(th);
            //     });
            //
            //     selectionTable.appendChild(headerRow);
            //
            //     rows.forEach(row => {
            //         const sku = row.querySelector('input[name^="sku"]').value;
            //         const color = row.querySelector('input[name^="color"]').value;
            //         const size = row.querySelector('input[name^="size"]').value;
            //         const qty = row.querySelector('input[name^="quantity"]').value;
            //
            //         if (!qty) {
            //             alert("Quantity is required");
            //             row.querySelector('input[name^="quantity"]').focus;
            //             return false;
            //         }
            //         const newRow = document.createElement('tr');
            //
            //         newRow.innerHTML = `
            //     <td>${sku}</td>
            //     <td>${color}</td>
            //     <td>${size}</td>
            //     <td>${qty}</td>
            // `;
            //         selectionTable.appendChild(newRow);
            //     });
            calculateTotal(rowId);

            // const collapseButtonDiv = document.getElementById(`collapseButtonDiv[${rowId}}]`);
            // collapseButtonDiv.removeAttribute('hidden');

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

        function addItem() {
            counter++;
            // $(`#table-container${counter}`).empty();
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
                   <div class="col-3 col-md-3 mt-3">
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
                    <div class="col-md-2 mt-3">
                            <label class="form-label" for="unitPrice[${counter}]">Unit Price</label>
                            <input type="number" id="unitPrice[${counter}]" onchange="calculateTotal(${counter})" name="unitPrice[${counter}]" class="form-control"
                                    placeholder="Unit Price" />
                        </div>

                        <div class="col-md-2 mt-3">
                            <label class="form-label" for="tax[${counter}]">Tax</label>
                            <input type="number" id="tax[${counter}]" onchange="calculateTotal(${counter})" name="tax[${counter}]" class="form-control"
                                    placeholder="Tax" />
                        </div>


                    <div class="col-2 col-md-2 mt-3">
                                <label class="form-label" for="NetAmount${counter}">Net Amount Of Total Qty</label>
                                <div class="input-group">
                                    <input required type="number" id="NetAmount${counter}" name="NetAmount${counter}"
                                           class="form-control bg-light" placeholder="Net Amount" readonly />
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

    </script>


@endsection
