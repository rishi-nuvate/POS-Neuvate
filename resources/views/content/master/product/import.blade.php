@extends('layouts/layoutMaster')

@section('title', 'product-import')

@section('page-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>
@endsection

@section('content')
    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/master') }}">Master</a>
            </li>
            <li class="breadcrumb-item active">Product</li>
            <li class="breadcrumb-item active">Import</li>
        </ol>
    </nav>
    <!-- Invoice List Widget -->


    <div class="card">
        <div class="text-white rounded-top bg-primary p-2">
            Import Products
        </div>
        <div class="card-body">
            <div class="content">
                <form method="post" action="{{route('productImportStore')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        {{-- Example --}}
                        {{-- {{!! textInputField('div.class', 'label', 'inputType', 'name', 'id', 'placeholder', 'star', 'defaultValue', 'required','readonly')}} --}}


                        {!! textInputField('col-md-3 mt-3', 'Import Products', 'File', 'products', 'products', 'Import Products','',old('products'), '','') !!}

                        <div class="col-md-3 mt-4 ">
                            <div class="align-item-center">
                                <a type="button" href="{{ \URL::to('samples/product_test.csv') }}"
                                   class="m-2 btn btn-md btn-outline-primary round waves-effect"><i
                                        class="fa-solid fa-file-arrow-down mx-2"></i> Download Sample csv
                                </a>
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
