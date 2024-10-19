@extends('layouts/layoutMaster')

@section('title', 'Add-Base-Stock')


@section('content')
    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/master') }}">Master</a>
            </li>
            <li class="breadcrumb-item active">Base Stock</li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </nav>

    <!-- Invoice List Widget -->

    <div class="card">
        <div class="card-body">
            <div class="content">

                <div class="content-header mb-4">
                    <h3 class="mb-1">Add Base Stock</h3>
                </div>
                <form method="post" action="{{route('baseStock.update',['baseStock'=>$baseStock[0]->store_id])}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="row">
                        <div class="col-md-3 my-3">
                            <label class="form-label" for="store_id">Store</label>
                            <select id="store_id" name="store_id"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select Company" required>
                                <option value="">Select</option>
                                @foreach($stores as $store)
                                    <option
                                        value="{{$store->id}}" {{$baseStock[0]->store_id == $store->id ? 'selected' : '' }}>{{$store->store_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Example --}}
                        {{-- {{!! textInputField('div.class', 'label', 'inputType', 'name', 'id', 'placeholder', 'star','inputClass', 'defaultValue', 'required','readonly')}} --}}

                        @php $num = 1 @endphp
                        @foreach($baseStock as $category)

                            <div class="col-md-4">
                                <label class="form-label" for="franchise">Category</label>
                                <input
                                    type="hidden"
                                    id="category_id[{{$num}}]"
                                    name="category_id[{{$num}}]"
                                    class="form-control" value="{{$category->cat_id}}"/>
                                <input
                                    type="text"
                                    id="category[{{$num}}]"
                                    name="category[{{$num}}]"
                                    class="form-control"
                                    placeholder="Square Feet" value="{{$category->category->name}}" readonly/>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label" for="square_fit">Total Quantity</label>
                                <input
                                    type="number"
                                    id="category_qty[{{$num}}]"
                                    name="category_qty[{{$num}}]"
                                    class="form-control"
                                    placeholder="Total Quantity" value="{{$category->cat_qty}}"/>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group-append">
                                    <button class="btn btn-primary waves-effect"
                                            data-bs-toggle="modal" data-bs-target="#addQty{{$num}}" type="button"
                                            onclick="sizeQuantity({{$num}},{{$category->id}})">
                                        <i class="fa fa-plus"></i> Add Sku Wise
                                    </button>
                                </div>
                            </div>
                            @php $num++ @endphp
                        @endforeach

                    </div>
                    <br>
                    <div class="row px-0 mt-3">
                        <div class="col-lg-2 col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-primary d-grid w-100">Save</button>
                        </div>
                    </div>

                    @php $num = 1 @endphp
                    @foreach($baseStock as $category)
                        <div class="modal fade ValidateModelForTotalQty" id="addQty{{$num}}" tabindex="-1"
                             aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-simple modal-edit-user modal-dialog-scrollable">

                                <div class="modal-content p-1 p-md-0" style="min-height: 60vh;">
                                    <div class="modal-header text-white rounded-top bg-primary p-2">
                                        Parameter Information
                                    </div>
                                    <div class="modal-body">
                                        <div class="row g-3">
                                            <div class="form-text">
                                                <b>Note</b> : All sizes should be in comma separated
                                            </div>
                                            <div class="col-md-12">

                                                <label class="form-label" for="size">Enter Size</label>
                                                <input
                                                    type="text"
                                                    id="allSizes"
                                                    name="allSizes"
                                                    class="form-control"
                                                    placeholder="Total Quantity" onkeyup="allSize(this.value)"/>

                                                <div id="oldTable-container{{$category->cat_id}}"></div>

                                                <div id="newTable-container{{$category->cat_id}}"></div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12 m-4">
                                        <button type="button" class="btn btn-label-success ml-3"
                                                data-bs-dismiss="modal"
                                                aria-label="Close" onclick="">
                                            Done
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php $num++ @endphp
                    @endforeach

                </form>
            </div>
        </div>
    </div>

@endsection


@section('page-script')

    <script>

        var cat_id;

        function sizeQuantity(id, num) {
            cat_id = document.getElementById(`category_id[${id}]`).value

            if (num) {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('getBaseStockSize') }}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {Id: num, '_token': "{{ csrf_token() }}"},
                    dataType: 'json',
                    success: function (response) {
                        $('#oldTable-container' + cat_id).empty();
                        $.each(response, function (key, value) {
                            console.log(value);
                            $('#oldTable-container' + cat_id).append('' +
                                `<div class="row">
                                    <div class="col-md-4 mt-3">
                                    <label class="form-label" for="size">Size</label>
                                <input
                                    type="text"
                                    id="old_size[${value.id}]"
                                    name="old_size[${value.id}]"
                                    class="form-control"
                                    placeholder="Total Quantity" value="${value.size}"/>
                                </div>
                                <div class="col-md-4 mt-3">
                                   <label class="form-label" for="size">Size Quantity</label>
                                <input
                                    type="text"
                                    id="old_size_qty[${value.id}]"
                                    name="old_size_qty[${value.id}]"
                                    class="form-control"
                                    placeholder="Total Quantity" value="${value.qty}"/>
                                </div>
                                <div class="col-md-4 mt-3">
                                   <label class="form-label" for="size_ratio">Size Ratio</label>
                                <input
                                    type="text"
                                    id="old_size_ratio[${value.id}]"
                                    name="old_size_ratio[${value.id}]"
                                    class="form-control"
                                    placeholder="Total Quantity" value="${value.ratio}"/>
                                </div>
                            </div>`
                            )
                        });
                    }
                });
            } else {
                $(`#table-container${counter}`).empty();

            }

        }

        function allSize(input) {

            const numbers = input.split(',');
            $('#newTable-container' + cat_id).empty();
            $.each(numbers, function (key, value) {
                if (value !== '') {

                    $('#newTable-container' + cat_id).append('' +
                        `<div class="row">
                            <div class="col-md-4 mt-3">
                            <label class="form-label" for="size">Size</label>
                        <input
                            type="text"
                            id="size[${cat_id}][]"
                            name="size[${cat_id}][]"
                            class="form-control"
                            placeholder="Total Quantity" value="${value}"/>
                        </div>
                        <div class="col-md-4 mt-3">
                           <label class="form-label" for="size">Size Quantity</label>
                        <input
                            type="text"
                            id="size_qty[${cat_id}][]"
                            name="size_qty[${cat_id}][]"
                            class="form-control"
                            placeholder="Total Quantity"/>
                        </div>
                        <div class="col-md-4 mt-3">
                           <label class="form-label" for="size_ratio">Size Ratio</label>
                        <input
                            type="text"
                            id="size_ratio[${cat_id}][]"
                            name="size_ratio[${cat_id}][]"
                            class="form-control"
                            placeholder="Total Quantity"/>
                        </div>
                    </div>`
                    )
                }

            });
        }


    </script>

@endsection
