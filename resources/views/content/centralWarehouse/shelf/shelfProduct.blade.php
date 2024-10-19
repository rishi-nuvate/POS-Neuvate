@extends('layouts/layoutMaster')

@section('title', 'Create-Shelf ')


@section('content')
    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{url('/centralWarehouseMaster')}}">Central Warehouse</a>
            </li>
            <li class="breadcrumb-item active">Shelf</li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </nav>
    <!-- Invoice List Widget -->


    <div class="card">
        <div class="card-body">
            <div class="content">


                <div class="content-header mb-4">
                    <h3 class="mb-1">Add Product in Shelf</h3>
                </div>
                <form method="post" action="{{route('shelfProductStore')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        {{-- Example --}}
                        {{-- {{!! textInputField('div.class', 'label', 'inputType', 'name', 'id', 'placeholder', 'star', 'defaultValue', 'required','readonly')}} --}}

                        {!! textInputField('col-md-3 mt-3', 'Warehouse', 'text', 'warehouse', 'warehouse', '','','',$warehouse,'', 'readonly') !!}

                    </div>


                    <div class="row">
                        @php $num =0 @endphp

                        @foreach($shelves as $shelf)
                            <div class="col-md-3 mt-3">
                                <label class="form-label" for="category">
                                    Row:
                                    <button type="button"
                                            class="m-2 btn btn-sm btn-outline-primary round waves-effect">{{$shelf->row_num}}</button>
                                    Column:
                                    <button type="button" class="m-2 btn btn-sm btn-outline-primary round waves-effect">
                                        {{$shelf->column_num}}</button>
                                    Rack:
                                    <button type="button" class="m-2 btn btn-sm btn-outline-primary round waves-effect">
                                        {{$shelf->column_name}}</button>
                                </label>
                                <input type="hidden" name="shelf_id[{{$num}}]" value="{{$shelf->id}}">

                                <select id="products_id_{{$num}}" name="products_id[{{$num}}][]"
                                        class="products-select select2 select21 form-select" data-allow-clear="true"
                                        data-placeholder="Select Company" multiple>
                                    <option value="">Select</option>
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->product_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @php $num++ @endphp
                        @endforeach


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
        {{--function productData() {--}}
        {{--    $.ajax({--}}
        {{--        type: 'POST',--}}
        {{--        url: '{{ route('productData') }}',--}}
        {{--        data: {--}}
        {{--            '_token': "{{ csrf_token() }}",--}}
        {{--        },--}}
        {{--        dataType: 'json',--}}
        {{--        success: function (response) {--}}

        {{--            $('.products-select').each(function () {--}}
        {{--                $(this).empty(); // Clear existing options--}}
        {{--                $(this).append('<option value="">Select</option>');--}}
        {{--                $.each(response, function (key, value) {--}}
        {{--                    console.log(value);--}}
        {{--                    $(this).append('<option value="' + value.id + '">' + value.product_name + '</option>');--}}
        {{--                }.bind(this));--}}
        {{--            });--}}

        {{--            // $('#products_id').empty();--}}
        {{--            // $.each(response, function (key, value) {--}}
        {{--            //     $('#products_id').append('<option value="' + value.id + '">' + value--}}
        {{--            //         .product_name + '</option>');--}}
        {{--            // });--}}
        {{--        }--}}
        {{--    });--}}
        {{--}--}}

        {{--productData();--}}
    </script>
@endsection
