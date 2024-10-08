@extends('layouts/layoutMaster')

@section('title', 'Create-Barcode ')


@section('page-style')
    <!-- Page -->

    <style>
        b {
            /*text-align: center !important;*/
            text-align: start !important;
        }

        p {
            text-align: start;
        }
    </style>
@endsection


@section('content')

    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/supplyChain') }}">Supply Chain</a>
            </li>
            <li class="breadcrumb-item active">Barcode</li>
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
                <form method="post" action="{{route('barcode.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-2">
                            <p>S</p>
                            <p class="mb-2">
                                <img style="border-radius: 0px !important;width: 135px;height: 25px;"
                                     src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPYAAAAeCAQAAAC1DCusAAAAIGNIUk0AAHomAACAhAAA+gAAAIDoAAB1MAAA6mAAADqYAAAXcJy6UTwAAAACYktHRAD/h4/MvwAAAJxJREFUaN7t0TsOwzAQxNBR7n/nTZFUA62TnnyNDX1sCTyZfJwk832m3lNjU+O3PVNzWdac5bvbf/pcvbfnsoz3nqe73c51u+ftf/Pnd7a1v870dN+60yvCMDaIsUGMDWJsEGODGBvE2CDGBjE2iLFBjA1ibBBjgxgbxNggxgYxNoixQYwNYmwQY4MYG8TYIMYGMTaIsUGMDWJskDcrryI7VuRp+gAAAABJRU5ErkJggg=="
                                     style="height:0.8cm; width:3.8cm;"></p>
                            <p class="mb-2" style=" margin: 0;padding: 0;">4567291</p>

                            <table>
                                <tr>
                                    <td>SKU :</td>
                                    <td>sk3456-S</td>
                                </tr>
                                <tr>
                                    <td>Product :</td>
                                    <td>Name</td>
                                </tr>
                                <tr>
                                    <td>Color :</td>
                                    <td>Blue</td>
                                </tr>
                                <tr>
                                    <td>Size :</td>
                                    <td>S</td>
                                </tr>

                            </table>
                            {{--                            <p style=" margin: 0;padding: 0;"> - </p>--}}

                            {{--                            <p style="margin: 0;padding: 0;">--}}
                            {{--                                : </p>--}}
                            {{--                            <p style="margin: 0;padding: 0;">Color--}}
                            {{--                                : blue</p>--}}
                            {{--                            <p style="margin: 0;padding: 0;">Size--}}
                            {{--                                : S</p>--}}
                            {{--                            <p style="margin: 0;padding: 0;">Product--}}
                            {{--                                : blue</p>--}}
                            <p style="margin: 0;padding: 0;font-weight: bold">MRP :
                                <img src="https://labelfy.finserveinfotech.com/images/rupee-indian.png"
                                     height="12px"
                                     width="12px"><b>540.00</b>
                            </p>
                            <p class="mt-1" style="margin: 0;padding: 0;font-weight: bold;font-size: small">PKD
                                : October-2024</p>
                            <p style="margin: 0;padding: 0;font-weight: bold; font-size: small">Net Qty :
                                1N</p>
                            <p class="mt-2" style="margin: 0;padding: 0;font-weight: bold">Inclusive
                                of all Taxes</p>
                            <p class="mt-2" style="margin: 0;padding: 0; font-size: small">Manufactured
                                by : </p>
                            <p style="margin: 0;padding: 0; font-size: small">SINCE99 APPAREL PVT LTD</p>

                            <p style="margin: 0;padding: 0; font-weight: bold;font-size: small ">Block No. 756,Plot No
                                109-110,Devraj Industrial
                                Park,Ahmedabad,GJ</p>
                            <p class="mt-1" style="margin: 0;padding: 0;font-size: small">For Customer Complains :</p>
                            <!--<p style="font-size: 12px;margin: 0;padding: 0;"></p>
                            <p style="font-size: 12px;margin: 0;padding: 0;">Email
                                : </p>-->
                            <p style="margin: 0;padding: 0;font-weight: bold;font-size: small">Tel no
                                : 07969066900</p>
                            <p style="margin: 0;padding: 0;font-weight: bold;font-size: small">Email
                                : example@gmail.com</p>


                        </div>
                    </div>

                    <table style="height:auto ;width:322px;" cellspacing="0" cellpadding="0">

                        <tr>

                            <td style="padding:5px 6px" height="322px">

                            </td>
                        </tr>
                    </table>

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

                    $('#products').empty();
                    $.each(response, function (key, value) {
                        $('#products').append('<option value="' + value.id + '">' + value
                            .product_name + '</option>');
                    });
                }
            });
        }

        function productVariantBarcode() {

            const productId = document.getElementById('products').value;
            $.ajax({
                type: 'POST',
                url: '{{ route('productVariantBarcode') }}',
                data: {
                    'productId': productId,
                    'barcodeId': '',
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
                                '<input type="text" id="sku_quantity" name="sku_quantity[]" class="form-control" placeholder="enter quantity" value="" > ' +
                                '</div> </div>');
                        });
                    });


                }
            });
        }
    </script>
@endsection
