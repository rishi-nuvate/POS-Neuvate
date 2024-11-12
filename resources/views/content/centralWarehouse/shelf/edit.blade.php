@extends('layouts/layoutMaster')

@section('title', 'Create-Shelf ')

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
            <li class="breadcrumb-item active">Shelf</li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </nav>
    <!-- Invoice List Widget -->


    <div class="card">
        <div class="text-white rounded-top bg-primary p-2">
            Shelf Create
        </div>
        <div class="card-body">
            <div class="content">
                <form method="post" action="{{route('shelf.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        {{-- Example --}}
                        {{-- {{!! textInputField('div.class', 'label', 'inputType', 'name', 'id', 'placeholder', 'star', 'defaultValue', 'required','readonly')}} --}}


                        <input type="hidden" name="warehouse_id" value="{{$warehouseId}}">

                        {!! textInputField('col-md-3', 'Warehouse', 'text', 'warehouse_name', 'warehouse_name', 'Warehouse Name','','',$warehouse, '','readonly') !!}
                        {!! textInputField('col-md-3', 'Row No.', 'text', 'row_num', 'row_num', 'Row Number','','',$row_num, '','readonly') !!}
                        {!! textInputField('col-md-3', 'No. of Column' , 'text', 'column_num', 'column_num', 'number of columns', '', '',$shelves->count() , '','') !!}

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
