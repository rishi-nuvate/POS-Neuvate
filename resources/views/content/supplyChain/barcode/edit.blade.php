@extends('layouts/layoutMaster')

@section('title', 'Create-Barcode ')


@section('content')
    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/supplyChain') }}">Supply Chain</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{route('barcode.index')}}">
                    Barcode
                </a>
            </li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </nav>
    <!-- Invoice List Widget -->


    <div class="card">
        <div class="card-body">
            <div class="content">


                <div class="content-header mb-4">
                    <h3 class="mb-1">Create Barcode</h3>
                </div>
                <form method="post" action="{{route('barcode.update',['barcode'=>$barcode->id])}}"
                      enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="row">
                        {{-- <div class="col-md-3">
                            <label class="form-label" for="employeeName">Employee Name</label>
                            <input type="text" id="employeeName" name="employeeName" class="form-control"
                                value="{{ old('employeeName') }}" placeholder="Employee Name" />
                        </div> --}}

                        {{-- Example --}}
                        {{-- {{!! textInputField('div.class', 'label', 'inputType', 'name', 'id', 'placeholder', 'star', 'defaultValue', 'required','readOnly')}} --}}

                        {!! textInputField('col-md-3 mt-3', 'Pack on Date', 'date', 'pack_date', 'pack_date', 'Description', '', '', $barcode->packing_date,'',' readonly') !!}


                        <div class="col-md-3 mt-3" id="po_number">
                            <label class="form-label" for="po_id">P.O. Number</label>
                            <select required id="po_id" name="po_id"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select Company">
                                <option value="dd">Select</option>
                                <option value="dd">Admin</option>
                            </select>
                        </div>

                        <input type="hidden" name="barcode_id" id="barcode_id" value="{{$barcode->id}}">

                        <div class="col-md-6 mt-3">
                            <label class="form-label" for="Document">Select Method</label><br>
                            <input type="radio" value="with_po" name="Document" id="Document" class=""
                                   onchange="productData(this)" {{$barcode->po_id != null ? 'checked' : ''}} disabled/>
                            With P.O.
                            <input type="radio" value="without_po" name="Document" id="Document" class="mx-2"
                                   onchange="productData(this)" {{$barcode->po_id == null ? 'checked' : ''}} /> Without
                            P.O.
                        </div>

                    </div>
                    <hr>
                    <div class="row" id="with_po">


                        {{-- SKU --}}
                        {!! textInputField('col-md-4 mt-3', 'SKU Code', 'text', 'sku', 'date', '3453543', '', '', '','readonly') !!}

                        {{--                       Remaining Quantity--}}

                        {!! textInputField('col-md-4 mt-3', 'Remaining QTY', 'text', 'productName', 'productName', '50', '', '', 'required') !!}

                        {{--                        Barcode QTY--}}
                        {!! textInputField('col-md-4 mt-3', 'Barcode QTY', 'text', 'color', 'color', '5', '', '', '', 'readonly') !!}

                        {{-- SKU --}}
                        {!! textInputField('col-md-4 mt-3', 'SKU Code', 'text', 'sku', 'date', '3453543', '', '', '','readonly') !!}

                        {{--                       Remaining Quantity--}}

                        {!! textInputField('col-md-4 mt-3', 'Remaining QTY', 'text', 'productName', 'productName', '50', '', '', 'required') !!}

                        {{--                        Barcode QTY--}}
                        {!! textInputField('col-md-4 mt-3', 'Barcode QTY', 'text', 'color', 'color', '5', '', '', '', 'readonly') !!}


                        {{-- SKU --}}
                        {!! textInputField('col-md-4 mt-3', 'SKU Code', 'text', 'sku', 'date', '3453543', '', '', '','readonly') !!}

                        {{--                       Remaining Quantity--}}

                        {!! textInputField('col-md-4 mt-3', 'Remaining QTY', 'text', 'productName', 'productName', '50', '', '', 'required') !!}

                        {{--                        Barcode QTY--}}
                        {!! textInputField('col-md-4 mt-3', 'Barcode QTY', 'text', 'color', 'color', '5', '', '', '', 'readonly') !!}


                        {{-- SKU --}}
                        {!! textInputField('col-md-4 mt-3', 'SKU Code', 'text', 'sku', 'date', '3453543', '', '', '','readonly') !!}

                        {{--                       Remaining Quantity--}}

                        {!! textInputField('col-md-4 mt-3', 'Remaining QTY', 'text', 'productName', 'productName', '50', '', '', 'required') !!}

                        {{--                        Barcode QTY--}}
                        {!! textInputField('col-md-4 mt-3', 'Barcode QTY', 'text', 'color', 'color', '5', '', '', '', 'readonly') !!}

                    </div>

                    <div class="row" id="without_po" style="display: none">
                        <div class="col-md-6 mb-3">
                            <label for="select2Multiple" class="form-label">Product</label>
                            <select name="products" id="products" class="select2 form-select" disabled>
                                <option value="">select Product</option>

                            </select>
                        </div>
                        <div class="row" id="product_variant">

                        </div>
                    </div>

                    <div class="px-0 mt-3">
                        <div class="col-lg-2 col-md-12 col-sm-12">
                            <button type="submit" id="btnSave"
                                    class="btn btn-primary button-prevent-multiple-submits d-grid w-100 d-flex align-items-center justify-content-center waves-effect waves-light">
                                <i class="fas fa-angle-double-up me-2"></i>
                                Save
                            </button>
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


        window.onload = function () {
            const selectedRadio = document.querySelector('input[name="Document"]:checked');

            if (selectedRadio) {
                productData(selectedRadio);
            }
        }


        function productData(element) {

            console.log(element.value);
            if (element.value == 'with_po') {
                $('#with_po').css('display', 'block');
                $('#po_number').css('display', 'block');
                $('#without_po').css('display', 'none');
            } else {
                $('#with_po').css('display', 'none');
                $('#po_number').css('display', 'none');
                $('#without_po').css('display', 'block');
            }

            $.ajax({
                type: 'POST',
                url: '{{ route('productData') }}',
                data: {
                    '_token': "{{ csrf_token() }}",
                },
                dataType: 'json',
                success: function (response) {

                    var selectedProductId = {{$barcode->product->id}};

                    $('#products').empty();
                    $.each(response, function (key, value) {
                        $('#products').append('<option value="' + value.id + '" ' + (selectedProductId === value.id ? 'selected' : ' ') + '  >' + value.product_name + '</option>');
                    });

                    productVariantBarcode();
                }
            });
        }


        function productVariantBarcode() {

            const productId = document.getElementById('products').value;
            const barcode_id = document.getElementById('barcode_id').value;
            $.ajax({
                type: 'POST',
                url: '{{ route('productVariantBarcode') }}',
                data: {
                    'productId': productId,
                    'barcodeId': barcode_id,
                    '_token': "{{ csrf_token() }}",
                },
                dataType: 'json',
                success: function (response) {

                    $('#product_variant').empty();

                    $.each(response, function (key, value) {
                        $('#product_variant').append('<p class = "my-4"> ' + key + '</p>');
                        $.each(value, function (key, value1) {
                            $('#product_variant').append(' <div class="row"> <div class="col-md-4 mt-3"> ' +
                                '<label class="form-label" for="date">SKU Code</label> ' +
                                '<input type="text" id="date" name="sku[]" class="form-control" value="' + value1.sku + '" readonly> ' +
                                '<input type="hidden" id="date" name="sku_id[]" class="form-control" value="' + value1.id + '"> ' +
                                '</div> <div class="col-md-4 mt-3"> ' +
                                '<label class="form-label" for="sku_quantity">Quantity</label> ' +
                                '<input type="text" id="sku_quantity" name="sku_quantity[]" class="form-control" placeholder="enter quantity" value="' + value1.sku_quantity + '" > ' +
                                '</div> </div>');

                        });
                    });
                }
            });
        }
    </script>
@endsection
