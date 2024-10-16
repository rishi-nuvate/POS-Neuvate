@extends('layouts/layoutMaster')

@section('title', 'Create-Shelf ')

@section('page-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light float-left">Central Warehouse/ Shelf /</span> Create
    </h4>
    <!-- Invoice List Widget -->


    <div class="card">
        <div class="card-body">
            <div class="content">


                <div class="content-header mb-4">
                    <h3 class="mb-1">Create Shelf</h3>
                </div>
                <form method="post" action="{{route('shelfManage.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        {{-- Example --}}
                        {{-- {{!! textInputField('div.class', 'label', 'inputType', 'name', 'id', 'placeholder', 'star', 'defaultValue', 'required','readonly')}} --}}


                        <div class="col-md-3 mt-3">
                            <label class="form-label" for="category">Warehouse</label>
                            <select required id="category_id" name="warehouse_id"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select Company">
                                <option value="">Select</option>
                                @foreach($warehouses as $warehouse)
                                    <option value="{{$warehouse->id}}">{{$warehouse->warehouse_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        {!! textInputField('col-md-3 mt-3', 'Row No.', 'text', 'row_num', 'row_num', 'Row Number','',old('row_num'), '','') !!}
                        {!! textInputField('col-md-3 mt-3', 'No. of Column' , 'text', 'column_num', 'column_num', 'number of columns', '', old('column_num'), '','') !!}

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
