@extends('layouts/layoutMaster')

@section('title', 'Create-bulkInward ')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light float-left">Central Warehouse/ Bulk Inward /</span> Create
    </h4>
    <!-- Invoice List Widget -->


    <div class="card">
        <div class="card-body">
            <div class="content">


                <div class="content-header mb-4">
                    <h3 class="mb-1">Create Bulk Inward</h3>
                </div>
                <div class="form-check form-check-primary mt-3 mb-3">
                    <input class="form-check-input" type="checkbox" name="WithOutPO"
                           onchange="toggleTableVisibility()" value="1" id="WithOutPO">
                    <label class="form-check-label" for="customCheckPrimary">Without PO</label>
                </div>
                <form method="post" action="" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        {{-- Example --}}
                        {{-- {{!! textInputField('div.class', 'label', 'inputType', 'name', 'id', 'placeholder', 'star', 'defaultValue', 'required')}} --}}

                        <div class="col-md-3 mt-3" id="poId">
                            <label class="form-label" for="po_id">P.O. Number</label>
                            <select required id="po_id" name="po_id"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select Company" onchange="getAllPOItem()">
                                <option value="dd">Select</option>
                                <option value="3">Admin</option>
                            </select>
                        </div>

                    </div>
                    <div class="row" id="withPoItem">

                        {!! textInputField('col-md-2 mt-3', 'SKU', 'text', 'text', 'text', '34567', '', '', '','readonly') !!}
                        {!! textInputField('col-md-2 mt-3', 'Po number', 'text', 'text', 'text', 'number', '', '', '','readonly') !!}
                        {!! textInputField('col-md-2 mt-3', 'Dispatched By Factory', 'text', 'text', 'text', '5', '', '', '','readonly') !!}

                        {!! textInputField('col-md-2 mt-3', 'SKU', 'text', 'text', 'text', '34567', '', '', '','readonly') !!}
                        {!! textInputField('col-md-2 mt-3', 'Po number', 'text', 'text', 'text', 'number', '', '', '','readonly') !!}
                        {!! textInputField('col-md-2 mt-3', 'Dispatched By Factory', 'text', 'text', 'text', '5', '', '', '','readonly') !!}

                        {!! textInputField('col-md-2 mt-3', 'SKU', 'text', 'text', 'text', '34567', '', '', '','readonly') !!}
                        {!! textInputField('col-md-2 mt-3', 'Po number', 'text', 'text', 'text', 'number', '', '', '','readonly') !!}
                        {!! textInputField('col-md-2 mt-3', 'Dispatched By Factory', 'text', 'text', 'text', '5', '', '', '','readonly') !!}

                        {!! textInputField('col-md-2 mt-3', 'SKU', 'text', 'text', 'text', '34567', '', '', '','readonly') !!}
                        {!! textInputField('col-md-2 mt-3', 'Po number', 'text', 'text', 'text', 'number', '', '', '','readonly') !!}
                        {!! textInputField('col-md-2 mt-3', 'Dispatched By Factory', 'text', 'text', 'text', '5', '', '', '','readonly') !!}

                        {!! textInputField('col-md-2 mt-3', 'SKU', 'text', 'text', 'text', '34567', '', '', '','readonly') !!}
                        {!! textInputField('col-md-2 mt-3', 'Po number', 'text', 'text', 'text', 'number', '', '', '','readonly') !!}
                        {!! textInputField('col-md-2 mt-3', 'Dispatched By Factory', 'text', 'text', 'text', '5', '', '', '','readonly') !!}

                    </div>

                    <div class="row" id="withoutPoItem" style="display: none">
                        <div id="productItemContainer">
                            <div class="row">
                                <div class="col-md-2 mt-3">
                                    <label class="form-label" for="productId0">Product</label>
                                    <select class="select2 form-select" id="productId0"
                                            data-placeholder="Select Product" name="product_id[]"
                                            onchange="getProductSku(0)">
                                        <option value="">Select Product</option>
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}">{{$product->product_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <input type="hidden" name="number" id="number" value="0">
                                <div class="col-md-2 mt-3">
                                    <label class="form-label" for="sku_id">Product Sku</label>
                                    <select class="select2 form-select" id="skuId0"
                                            data-placeholder="Select Product" name="sku_id[]">
                                        <option value="">Select Sku</option>
                                    </select>
                                </div>

                                <div class="col-md-2 mt-3">
                                    <label class="form-label" for="text">Inward</label>
                                    <span class="text-danger"><strong></strong></span>
                                    <input type="text" id="text" name="text" class="form-control  " placeholder="5"
                                           value=""/>
                                </div>


                            </div>
                        </div>

                    </div>

                    <div class="row" id="withoutPoAdd" style="display: none">
                        <div class="px-0 mt-3">
                            <div class="col-lg-2 col-md-12 col-sm-12">
                                <button type="button" class="btn btn-primary d-grid w-100" onclick="addProduct()">Add
                                    Another SKU
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="px-0 mt-3">
                            <div class="col-lg-2 col-md-12 col-sm-12">
                                <button type="submit" class="btn btn-primary d-grid w-100">Save</button>
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
        function getAllPOItem() {
            const poId = document.getElementById('po_id').value;
            $.ajax({
                type: 'POST',
                url: '{{ route('getAllPOItem') }}',
                data: {
                    'poId': poId,
                    '_token': "{{ csrf_token() }}",
                },
                dataType: 'json',
                success: function (response) {

                    $('#items').empty();
                    $.each(response, function (key, value) {
                        console.log(value);
                        $('#product_variant').append(' <div class="row"> <div class="col-md-4 mt-3"> ' +
                            '<label class="form-label" for="date">SKU Code</label> ' +
                            '<input type="text" id="date" name="sku[]" class="form-control" value="' + value.sku + '" readonly> ' +
                            '<input type="hidden" id="date" name="sku_id[]" class="form-control" value="' + value.id + '"> ' +
                            '</div> <div class="col-md-4 mt-3"> ' +
                            '<label class="form-label" for="sku_quantity">Quantity</label> ' +
                            '<input type="text" id="sku_quantity" name="sku_quantity[]" class="form-control" placeholder="enter quantity" value="" > ' +
                            '</div> </div>');
                    });
                }
            });
        }

        function toggleTableVisibility() {
            var withoutPoContainer = document.getElementById('withoutPoAdd');
            var withoutPoItem = document.getElementById('withoutPoItem');
            var withPoItem = document.getElementById('withPoItem');
            var poId = document.getElementById('poId');

            // var withoutPoContainer = document.getElementById('withoutPoContainer');

            var checkbox = document.getElementById('WithOutPO');
            if (checkbox.checked) {
                // withPo.style.display = 'None';
                withPoItem.style.display = 'None';
                poId.style.display = 'None';

                withoutPoContainer.style.display = 'Block';
                withoutPoItem.style.display = 'Block';
            } else {
                // withPo.style.display = 'Block';
                withPoItem.style.display = 'Block';
                poId.style.display = 'Block';

                withoutPoContainer.style.display = 'None';
                withoutPoItem.style.display = 'None';

            }
        }

        function addProduct() {
            var num = document.getElementById('number').value;
            num++;
            const productOptions = ` @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->product_name}}</option>
                                     @endforeach `;

            $('#productItemContainer').append('' +
                `<div class="row " id="productItem_${num}">
                <div class="col-md-2 mt-3"> <label class="form-label" for="productId${num}">Product</label>
                <select class="select2 form-select" id="productId${num}" data-placeholder="Select Product" name="product_id[${num}]" onchange="getProductSku(${num})"> <option value="">Select Product</option>
            ${productOptions}
                 </select>
                </div>
                <div class="col-md-2 mt-3">
                    <label class="form-label" for="sku_id">Product Sku</label>
                    <select class="select2 form-select" id="skuId${num}"
                            data-placeholder="Select Product" name="sku_id[${num}]">
                        <option value="">Select Sku</option>
                    </select>
                </div> <div class="col-md-2 mt-3"> <label class="form-label" for="text">Inward</label> <span class="text-danger"><strong></strong></span> <input type="text" id="text" name="text" class="form-control" placeholder="5" value="" /> </div>
                <div class="col-1 mt-4">
                 <button type="button" onclick="removeSize(${num})" class="btn rounded-pill btn-icon btn-label-danger waves-effect">
                    <span class="ti ti-trash"></span>
                 </button>
                    </div>
                </div>`
            );

            document.getElementById('number').value = num;
            $('.select2').select2();
        }

        function removeSize(Id) {
            var elementToRemove = document.getElementById("productItem_" + Id);

            if (elementToRemove) {
                elementToRemove.remove();
            }
        }

        function getProductSku(id) {
            const productId = document.getElementById('productId' + id).value;
            $.ajax({
                type: 'POST',
                url: '{{ route('getProductSku') }}',
                data: {
                    'productId': productId,
                    '_token': "{{ csrf_token() }}",
                },
                dataType: 'json',
                success: function (response) {
                    $('#skuId' + id).empty().append(' <option value=""> select </option>');
                    $.each(response, function (key, value) {
                        $('#skuId' + id).append(' <option value="' + value.sku + '"> ' + value.sku + '</option>');
                    });
                }
            });
        }

    </script>
@endsection
