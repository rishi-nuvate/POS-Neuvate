@extends('layouts/layoutMaster')

@section('title', 'Add-Brand')


@section('content')
    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/master') }}">Master</a>
            </li>
            <li class="breadcrumb-item active">Store Generate</li>
            <li class="breadcrumb-item active">Base Stock Plan</li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>

    <!-- Invoice List Widget -->

    <div class="card">
        <div class="card-body">
            <div class="content">

                <div class="content-header mb-4">
                    <h3 class="mb-1">Create Base Stock Plan</h3>
                </div>
                <form method="post" action="{{route('brand.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        {{-- Example --}}
                        {{--  textInputField(class, label, inputType, name, id, placeholder, star, inputClass, defaultValue , required, $readonly)  --}}
                        @foreach($categories as $category)
                            <div class="col-md-6 p-3 border">
                                <div class="row">

                                    {!! textInputField('col-md-6 mt-3', 'Category Name', 'text', 'cat_id[]', 'cat_id', 'Category', '', '',$category->name ,'','readonly') !!}
                                    {!! textInputField('col-md-6 mt-3', 'Category Quantity', 'number', 'cat_qty[]', 'cat_qty', 'Quantity', '', '','' ,'','') !!}
                                    @foreach($category->subCategory as $subCat)
                                        {!! textInputField('col-md-6 mt-3', 'Category Name', 'text', 'cat_id[]', 'cat_id', 'Category', '', '',$subCat->name ,'','readonly') !!}
                                        {!! textInputField('col-md-6 mt-3', 'Category Quantity', 'number', 'cat_qty[]', 'cat_qty', 'Quantity', '', '','' ,'','') !!}
                                    @endforeach

                                </div>

                            </div>

                        @endforeach

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
