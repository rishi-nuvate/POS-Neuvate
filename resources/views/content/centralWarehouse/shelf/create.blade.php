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
                <form method="post" action="" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        {{-- Example --}}
                        {{-- {{!! textInputField('div.class', 'label', 'inputType', 'name', 'id', 'placeholder', 'star', 'defaultValue', 'required','readonly')}} --}}


{{--                        <div class="col-md-3 mt-3">--}}
{{--                            <label class="form-label" for="category">Warehouse</label>--}}
{{--                            <select required id="category" name="warehouse"--}}
{{--                                    class="select2 select21 form-select" data-allow-clear="true"--}}
{{--                                    data-placeholder="Select Company">--}}
{{--                                <option value="dd">Select</option>--}}
{{--                                <option value="dd">Admin</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}

                        {!! selectField('col-md-3 mt-3', 'Warehouse', 'warehouse', 'warehouse','select2 select21 form-select', [10 => 'Ten',20 => 'Twenty',30 => 'Thirty',], '', '', '', '') !!}

                        {!! textInputField('col-md-3 mt-3', 'Row No.', 'text', 'date', 'date', 'Description','','', '','') !!}
                        {!! textInputField('col-md-3 mt-3', 'Column No.', 'text', 'date', 'date', 'Description', '', '', '','') !!}
                        {!! textInputField('col-md-3 mt-3', 'No. of Rack', 'text', 'date', 'date', 'Description', '', '', '','') !!}

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
