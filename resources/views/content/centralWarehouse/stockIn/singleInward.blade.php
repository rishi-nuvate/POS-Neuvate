@extends('layouts/layoutMaster')

@section('title', 'Create-singleInward ')

@section('page-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>
@endsection

@section('content')
    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/centralWarehouseMaster') }}">Central Warehouse</a>
            </li>
            <li class="breadcrumb-item active"> Single Inward</li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </nav>
    <!-- Invoice List Widget -->


    <div class="card">
        <div class="card-body">
            <div class="content">


                <div class="content-header mb-4">
                    <h3 class="mb-1">Create Single Inward</h3>
                </div>
                <form method="post" action="{{route('WarehouseInventory.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        {{-- Example --}}
                        {{-- {{!! textInputField('div.class', 'label', 'inputType', 'name', 'id', 'placeholder', 'star', 'defaultValue', 'required')}} --}}


                        <div class="col-md-3">
                            <label for="Scan">Scan</label>
                            <div class="input-group">
                                <input type="text" name="barcode_number" class="form-control" placeholder="Item Barcode scan"
                                       aria-label="Item" aria-describedby="button-addon2" />
                                <button class="btn btn-outline-primary" type="button" id="button-addon2"><i
                                        class="ti ti-scan mx-2 ti-sm"></i></button>
                            </div>
                        </div>

                    </div>

                    <div class="px-0 mt-3">
                        <div class="col-lg-2 col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-primary d-grid w-100">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
