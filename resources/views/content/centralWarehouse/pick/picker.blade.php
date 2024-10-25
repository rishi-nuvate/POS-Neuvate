@extends('layouts/layoutMaster')

@section('title', 'Create-Pick ')


@section('content')
    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/centralWarehouseMaster') }}">Central Warehouse</a>
            </li>
            <li class="breadcrumb-item active">Picker</li>
            <li class="breadcrumb-item active">Picking</li>
        </ol>
    </nav>
    <div class="card">

        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table" id="datatable-list">
                <thead>
                <tr>
                    <th>SR No.</th>
                    <th>Products</th>
                </tr>
                </thead>
                <tbody>
                <tr class="odd">
                    <td> 1</td>
                    <td>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#addQty" class="m-2 btn btn-lg btn-success round waves-effect">kurti</button>
                        <button type="button" class="m-2 btn btn-lg btn-success round waves-effect">Dress</button>
                    </td>
                </tr>
                <tr class="odd">
                    <td> 2</td>
                    <td>
                        <button type="button" class="m-2 btn btn-lg btn-success round waves-effect">Jeans</button>
                        <button type="button" class="m-2 btn btn-lg btn-success round waves-effect">Denim</button>
                    </td>
                </tr>
                <tr class="odd">
                    <td> 5</td>
                    <td>
                        <button type="button" class="m-2 btn btn-lg btn-success round waves-effect">Shirt</button>
                        <button type="button" class="m-2 btn btn-lg btn-success round waves-effect">Sleeveless</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade ValidateModelForTotalQty" id="addQty" tabindex="-1"
         aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">

            <div class="modal-content p-1 p-md-0">
                <div class="modal-header text-white rounded-top bg-primary p-2">
                    Parameter Information
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-12 mt-0 justify-content-center d-flex fs-5">
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">Full</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">Half</label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-12 mb-3 justify-content-center d-flex">
                    <button type="button" class="btn btn-label-success ml-3"
                            data-bs-dismiss="modal"
                            aria-label="Close" onclick="">
                        Done
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('page-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>

    <script>

        $('#datatable-list').DataTable({
            autoWidth: false,
            lengthMenu: [
                [10, 20, 100, 500],
                [10, 20, 100, "All"]
            ],

            order: [
                [0, 'asc']
            ]
        });
    </script>
@endsection

