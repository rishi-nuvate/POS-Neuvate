@extends('layouts/layoutMaster')

@section('title', 'Add-Brand')


@section('content')

    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/master') }}">Master</a>
            </li>
            <li class="breadcrumb-item active"><a href="{{ route('brand.index') }}">Brand</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>

{{--    <h4 class="py-3 mb-4">--}}
{{--        <span class="text-muted fw-light float-left">Master / Brand /</span> Add--}}
{{--    </h4>--}}
    <!-- Invoice List Widget -->

    <div class="card">
        <div class="text-white rounded-top bg-primary p-2">
            Add Brand
        </div>
        <div class="card-body">
            <div class="content">
                <form method="post" action="{{route('brand.update',[$brands->id])}}" enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    <div class="row">
                        {{-- Example --}}
                        {{-- {{!! textInputField('div.class', 'label', 'inputType', 'name', 'id', 'placeholder', 'star','inputClass', 'defaultValue', 'required','readonly')}} --}}

                        {!! textInputField('col-md-6', 'Brand Name', 'text', 'name', 'brandName', 'Brand Name', '', '',$brands->name ,'','') !!}

                    </div>
                    <br>
                    <div class="row px-0 mt-3">
                        <div class="col-lg-2 col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-primary d-grid w-100">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
