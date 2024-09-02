@extends('layouts/layoutMaster')

@section('title', 'Create-Shelf ')

@section('page-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light float-left">Stock In/ </span> Create
    </h4>
    <!-- Invoice List Widget -->


    <div class="card">
        <div class="card-body">
            <div class="content">
                <div class="content-header mb-4">
                    <h3 class="mb-1">Stock In Create</h3>
                </div>
                <form method="post" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        {{-- Example --}}
                        {{-- {{!! textInputField('div.class', 'label', 'inputType', 'name', 'id', 'placeholder', 'star', 'defaultValue', 'required','readonly')}} --}}

                        {!! textInputField('col-md-3 mt-3', 'Scan Sales Order No.', 'text', 'date', 'date', 'Description','','', '','') !!}
                        {!! textInputField('col-md-3 mt-3', 'Scan Sales Order No.', 'text', 'date', 'date', 'Description','','', '','') !!}
                        {!! textInputField('col-md-3 mt-3', 'Pc. Scan', 'text', 'date', 'date', 'Description', '', '', '','') !!}

                        <div id="datatable-list_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer pt-3">
                            <table class="datatables-basic table dataTable no-footer" id="datatable-list"
                                   aria-describedby="datatable-list_info">
                                <thead>
                                <tr>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-list" rowspan="1"
                                        colspan="1"
                                        aria-label="SR No.: activate to sort column ascending"
                                        style="width: 48.8438px;">SR No.
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-list" rowspan="1"
                                        colspan="1"
                                        aria-label="Date: activate to sort column ascending" style="width: 38.9688px;">
                                        SKU
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-list" rowspan="1"
                                        colspan="1"
                                        aria-label="Customer / Buyer Name: activate to sort column ascending"
                                        style="width: 189.891px;">Remaining
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-list" rowspan="1"
                                        colspan="1"
                                        aria-label="Merchandiser: activate to sort column ascending"
                                        style="width: 117.422px;">
                                        Pack
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr class="odd">
                                    <td>29</td>
                                    <td>#456879</td>
                                    <td>
                                        50
                                    </td>
                                    <td>
                                        5
                                    </td>
                                </tr>

                                <tr class="even">
                                    <td>30</td>
                                    <td>#456879</td>
                                    <td>
                                        50
                                    </td>
                                    <td>
                                        5
                                    </td>
                                </tr>

                                <tr class="odd">
                                    <td>31</td>
                                    <td>#456879</td>
                                    <td>
                                        50
                                    </td>
                                    <td>
                                        5
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="px-0 mt-3">
                        <div class="col-lg-2 col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-danger d-grid w-100">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
