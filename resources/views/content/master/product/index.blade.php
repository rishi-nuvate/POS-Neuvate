@extends('layouts/layoutMaster')

@section('title', 'List-SKU')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/toastr/toastr.css') }}"/>
@endsection

@section('page-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/toastr/toastr.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light float-left">Master / SKU /</span> View
    </h4>
    <!-- Master Tags List -->


    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table" id="datatable-list">
                <thead>
                <tr>
                    <th>SR No.</th>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Tags</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                {{--                <tbody>--}}
                {{--                        <tr>--}}
                {{--                            <td class="text-bold"><a href="">1</a></td>--}}
                {{--                            <td>Jeans</td>--}}
                {{--                            <td>#98765</td>--}}
                {{--                            <td>Black</td>--}}
                {{--                            <td>--}}
                {{--                                <a class="btn btn-icon btn-label-primary mx-2" href=""><i--}}
                {{--                                        class="ti ti-edit mx-2 ti-sm"></i></a>--}}
                {{--                                <button type="button" class="btn btn-icon btn-label-danger mx-2"><i--}}
                {{--                                        class="ti ti-trash mx-2 ti-sm"></i></button>--}}
                {{--                            </td>--}}
                {{--                        </tr>--}}
                {{--                </tbody>--}}
            </table>
        </div>
    </div>

@endsection

{{--@section('page-script')--}}
    <script>
        window.onload = function () {
            getProduct();
        }

        function getProduct() {
            $("#overlay").fadeIn(100);
            $('#datatable-list').DataTable({
                autoWidth: false,
                lengthMenu: [
                    [10, 20, 100, 500],
                    [10, 20, 100, "All"]
                ],

                order: [
                    [0, 'asc']
                ],
                "ajax": {
                    "url": "{{ route('getProduct') }}",
                    "type": "POST",
                    "headers": "{ 'X-CSRF-TOKEN': $('meta[name='csrf-token']').attr('content') }",
                    "data": {
                        "_token": "{{ csrf_token() }}"
                    },
                },

                "initComplete": function (setting, json) {
                    $("#overlay").fadeOut(100);
                },
                bDestroy: true
            });
        }
    </script>
{{--@endsection--}}
