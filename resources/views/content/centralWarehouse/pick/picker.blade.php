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
                        <button type="button" class="m-2 btn btn-lg btn-success round waves-effect">kurti</button>
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

