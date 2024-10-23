@extends('layouts/layoutMaster')

@section('title', 'Products-shelf-add')

@section('content')
    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{url('/centralWarehouseMaster')}}">Central Warehouse</a>
            </li>
            <li class="breadcrumb-item active">Add Products</li>
            <li class="breadcrumb-item active">Shelf</li>
        </ol>
    </nav>
    <!-- Invoice List Widget -->


    <div class="card">
        <div class="text-white rounded-top bg-primary p-2">
            Shelf Inward Product
        </div>
        <div class="card-body">
            <div class="content">
                <form method="post" action="{{route('productStore')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        {{--                        shelf Column--}}
                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="shelf_id">Shelf</label>
                            <select required id="shelf_id" name="shelf_id"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select Shelf">
                                <option value="">Select</option>
                                @foreach($shelves as $shelf)
                                    <option value="{{$shelf->id}}">{{$shelf->column_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        {{--                        Product--}}
                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="product_id">Product</label>
                            <select required id="product_id" name="product_id"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select Shelf" onchange="getProduct()">
                                <option value="">Select</option>
                                @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->product_name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div id="productDetails" style="display: none">
                        <div class="row mt-3">
                            <div class="col-md-5">
                                hgfkjl
                            </div>
                            <div class="col-md-7 border-start">

                                <div class="row g-3">

                                    <div class="col-md-4">
                                        <div class="mb-4 row">
                                            <label for="html5-text-input" class="col-md-6 col-form-label text-start">Product
                                                Name :</label>
                                            <div class="col-md-6" id="product_name">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-4 row">
                                            <label for="html5-text-input" class="col-md-6 col-form-label text-start">Product
                                                Code :</label>
                                            <div class="col-md-6" id="product_code">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3">

                                    <div class="col-md-4">
                                        <div class="mb-4 row">
                                            <label for="html5-text-input" class="col-md-6 col-form-label text-start">Category
                                                :</label>
                                            <div class="col-md-6" id="category">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-4 row">
                                            <label for="html5-text-input" class="col-md-6 col-form-label text-start">Sub
                                                Category :</label>
                                            <div class="col-md-6" id="sub_category">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="mb-4 row">
                                            <label for="html5-text-input" class="col-md-2 col-form-label text-start">Variants
                                                :</label>
                                            <div class="col-md-10" id="variants">
                                                <button type="button"
                                                        class="m-2 btn btn-sm btn-outline-primary round waves-effect">
                                                    Tag2
                                                </button>
                                                <button type="button"
                                                        class="m-2 btn btn-sm btn-outline-primary round waves-effect">
                                                    Tag2
                                                </button>
                                                <button type="button"
                                                        class="m-2 btn btn-sm btn-outline-primary round waves-effect">
                                                    Tag2
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="px-0 mt-3">
                        <div class="col-lg-2 col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-primary d-grid w-100">Save</button>
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
        function getProduct() {
            var product_id = document.getElementById('product_id').value;

            // console.log(product_id);
            $.ajax({
                type: 'POST',
                url: '{{ route('getProduct') }}',
                data: {
                    product_id: product_id,
                    '_token': "{{ csrf_token() }}",
                },
                dataType: 'json',
                success: function (response) {

                    $('#productDetails').css('display', 'flow');

                    console.log(response);

                    $('#product_name').empty().append(`<button type="button" class="m-2 btn btn-sm btn-outline-primary round waves-effect">${response.product_name} </button>`);
                    $('#product_code').empty().append(`<button type="button" class="m-2 btn btn-sm btn-outline-primary round waves-effect">${response.product_code} </button>`);
                    $('#category').empty().append(`<button type="button" class="m-2 btn btn-sm btn-outline-primary round waves-effect">${response.category.name} </button>`);
                    $('#sub_category').empty().append(`<button type="button" class="m-2 btn btn-sm btn-outline-primary round waves-effect">${response.sub_category.name} </button>`);

                    // $.each(response.fit, function (key, value) {
                    //     $('#fit_id').append('<option value="' + value.id + '">' + value
                    //         .fit_name + '</option>');
                    // });
                }
            });

        }

    </script>
@endsection
