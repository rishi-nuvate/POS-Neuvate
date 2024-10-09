@extends('layouts/layoutMaster')

@section('title', 'Create-Pick ')


@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light float-left">Central Warehouse/ Pick /</span> Create
    </h4>
    <!-- Invoice List Widget -->

    <div class="card mb-3">
        <div class="card-body">
            <div class="content">
                <div class="col-md-12 col-sm-12">
                    <div class="row gy-sm-2">
                        <div class="col-sm-6 col-lg-3">
                            <div
                                class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-2 pb-sm-0">
                                <div>
                                    <p class="mb-0  font-weight-bold">Date</p>
                                </div>
                                <span class="me-sm-4 btn-sm btn btn-outline-info">2024-07-30</span>
                            </div>
                            <hr class="d-none d-sm-block d-lg-none me-4">
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div
                                class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-2 pb-sm-0">
                                <div>
                                    <p class="mb-0  font-weight-bold">Sales Order No.</p>

                                </div>
                                <span class="me-sm-4 btn-sm btn btn-outline-primary">#4567</span>

                            </div>
                            <hr class="d-none d-sm-block d-lg-none me-4">
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div
                                class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-2 pb-sm-0">
                                <div>
                                    <p class="mb-0  font-weight-bold">Total Quantity</p>

                                </div>
                                <span class="me-sm-4 btn-sm btn btn-outline-info">300</span>

                            </div>
                            <hr class="d-none d-sm-block d-lg-none me-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">

        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table" id="datatable-list">
                <thead>
                <tr>
                    <th>SR No.</th>
                    <th>Shop Name</th>
                    <th>Remaining Quantity</th>
                    <th>Alloted Quantity</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <tr class="odd">
                    <td> 1</td>
                    <td>
                        <div class="d-flex justify-content-start align-items-center user-name">
                            <div class="d-flex flex-column"><span
                                    class="emp_name text-truncate">Science City</span><small
                                    class="emp_post text-truncate text-muted">500</small></div>
                        </div>
                    </td>
                    <td>100</td>
                    <td>0</td>
                    <td>
                        <button type="button" data-bs-target="#edit"
                                class="btn btn-outline-success waves-effect">
                            <span class="ti ti-pencil ti-md"></span>Edit
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>

            {{--            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">--}}
            {{--                <table class="datatables-basic table dataTable no-footer dtr-column" id="DataTables_Table_0"--}}
            {{--                       aria-describedby="DataTables_Table_0_info" style="width: 1395px;">--}}
            {{--                    <thead>--}}
            {{--                    <tr>--}}
            {{--                        <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1"--}}
            {{--                            style="width: 0px; display: none;" aria-label=""></th>--}}
            {{--                        <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1"--}}
            {{--                            style="width: 18px;" data-col="1" aria-label=""><input type="checkbox"--}}
            {{--                                                                                   class="form-check-input"></th>--}}
            {{--                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"--}}
            {{--                            style="width: 323px;" aria-label="Name: activate to sort column ascending">Shop Name--}}
            {{--                        </th>--}}
            {{--                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"--}}
            {{--                            style="width: 304px;" aria-label="Email: activate to sort column ascending">Remaining--}}
            {{--                            Quantity--}}
            {{--                        </th>--}}
            {{--                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"--}}
            {{--                            style="width: 108px;" aria-label="Date: activate to sort column ascending">Allotted Quantity--}}
            {{--                        </th>--}}
            {{--                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 102px;" aria-label="Actions">--}}
            {{--                            Edit--}}
            {{--                        </th>--}}
            {{--                    </tr>--}}
            {{--                    </thead>--}}
            {{--                    <tbody>--}}
            {{--                    <tr class="odd">--}}
            {{--                        <td class="  control" tabindex="0" style="display: none;"></td>--}}
            {{--                        <td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input">--}}
            {{--                        </td>--}}
            {{--                        <td>--}}
            {{--                            <div class="d-flex justify-content-start align-items-center user-name">--}}
            {{--                                <div class="d-flex flex-column"><span--}}
            {{--                                        class="emp_name text-truncate">Science City</span><small--}}
            {{--                                        class="emp_post text-truncate text-muted">500</small></div>--}}
            {{--                            </div>--}}
            {{--                        </td>--}}
            {{--                        <td>100</td>--}}
            {{--                        <td>0</td>--}}
            {{--                        <td>--}}
            {{--                            <button type="button" data-bs-target="#edit"--}}
            {{--                                    class="btn btn-outline-success waves-effect">--}}
            {{--                                <span class="ti ti-pencil ti-md"></span>Edit--}}
            {{--                            </button>--}}
            {{--                        </td>--}}
            {{--                    </tr>--}}



            {{--                    </tbody>--}}
            {{--                </table>--}}
            {{--                <div class="row">--}}
            {{--                    <div class="col-sm-12 col-md-6">--}}
            {{--                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">--}}
            {{--                            <ul class="pagination">--}}
            {{--                                <li class="paginate_button page-item active"><a href="#"--}}
            {{--                                                                                aria-controls="DataTables_Table_0"--}}
            {{--                                                                                role="link" aria-current="page"--}}
            {{--                                                                                data-dt-idx="0" tabindex="0"--}}
            {{--                                                                                class="page-link">1</a></li>--}}
            {{--                            </ul>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}

            {{--                <div class="row">--}}
            {{--                    <div class="px-0 mt-3">--}}
            {{--                        <div class="col-lg-2 col-md-3 col-sm-3">--}}
            {{--                            <button type="submit" class="btn btn-primary d-grid w-100">Submit</button>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}

            {{--                </div>--}}
            {{--            </div>--}}
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

