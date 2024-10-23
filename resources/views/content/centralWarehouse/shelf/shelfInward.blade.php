@extends('layouts/layoutMaster')

@section('title', 'Products-shelf-add')

@section('page-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>
@endsection

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
        <div class="card-body">
            <div class="content">


                <div class="content-header mb-4">
                    <h3 class="mb-1">Shelf Inward Products</h3>
                </div>
                <form method="post" action="{{route('shelf.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        {{-- Example --}}
                        {{-- {{!! textInputField('div.class', 'label', 'inputType', 'name', 'id', 'placeholder', 'star', 'defaultValue', 'required','readonly')}} --}}


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

                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="product_id">Product</label>
                            <select required id="product_id" name="product_id"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select Shelf">
                                <option value="">Select</option>
                                @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->product_name}}</option>
                                @endforeach
                            </select>
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
