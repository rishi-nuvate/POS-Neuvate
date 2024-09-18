@extends('layouts/layoutMaster')

@section('title', 'Add-Season')


@section('content')
    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/master') }}">Master</a>
            </li>
            <li class="breadcrumb-item active"><a href="{{ route('tags.index') }}">Season</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>

    {{--    <h4 class="py-3 mb-4">--}}
    {{--        <span class="text-muted fw-light float-left">Master / Season /</span> Add--}}
    {{--    </h4>--}}
    <!-- Invoice List Widget -->

    <div class="card">
        {{-- <h5 class="card-header">Applicable Categories</h5> --}}
        <div class="card-body">
            <div class="content">


                <div class="content-header mb-4">
                    <h3 class="mb-1">Add Season</h3>
                </div>
                <form method="post" href="{{route('tabs.update')}}"  enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    <div class="row">

                        {{-- Example --}}
                        {{-- {{!! textInputField('div.class', 'label', 'inputType', 'name', 'id', 'placeholder', 'star','inputClass', 'defaultValue', 'required','readonly')}} --}}

                        {!! textInputField('col-md-6', 'Season Name', 'text', 'name', 'seasonName', 'Season Name', '*', '',$tag->name ,'required','') !!}

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
