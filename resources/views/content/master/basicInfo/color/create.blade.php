@extends('layouts/layoutMaster')

@section('title', 'Add-Color')


@section('content')
    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/master') }}">Master</a>
            </li>
            <li class="breadcrumb-item active">Color</li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </nav>

    <!-- Invoice List Widget -->

    <div class="card">
        <div class="text-white rounded-top bg-primary p-2">
            Create Color
        </div>
        <div class="card-body">
            <div class="content">
                <form method="post" action="{{route('color.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        {{-- Example --}}
                        {{-- {{!! textInputField('div.class', 'label', 'inputType', 'name', 'id', 'placeholder', 'star','inputClass', 'defaultValue', 'required','readonly')}} --}}

                        {!! textInputField('col-md-6', 'Color Name', 'text', 'color', 'color', 'Color Name', '', '',old('color') ,'','') !!}

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
