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
            <li class="breadcrumb-item active">Import Inventory</li>
        </ol>
    </nav>
    <!-- Invoice List Widget -->


    <div class="card">
        <div class="card-body">
            <div class="content">


                <div class="content-header mb-4">
                    <h3 class="mb-1">Create Shelf</h3>
                </div>
                <form method="post" action="{{route('importInventoryStore')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        {{-- Example --}}
                        {{-- {{!! textInputField('div.class', 'label', 'inputType', 'name', 'id', 'placeholder', 'star', 'defaultValue', 'required','readonly')}} --}}


                        {!! textInputField('col-md-3 mt-3', 'Import Inventory', 'File', 'inventory', 'inventory', 'Import Inventory','',old('inventory'), '','') !!}

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
