@extends('layouts/layoutMaster')

@section('title', 'Pending-List-Pick ')


@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light float-left">Central Warehouse/ </span> Pending List
    </h4>
    <!-- Invoice List Widget -->




    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <div id="datatable-list_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                <table class="datatables-basic table dataTable no-footer" id="datatable-list"
                       aria-describedby="datatable-list_info">
                    <thead>
                    <tr>
                        <th class="sorting" tabindex="0" aria-controls="datatable-list" rowspan="1" colspan="1"
                            aria-label="SR No.: activate to sort column ascending" style="width: 48.8438px;">SR No.
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="datatable-list" rowspan="1" colspan="1"
                            aria-label="Date: activate to sort column ascending" style="width: 38.9688px;">Date
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="datatable-list" rowspan="1" colspan="1"
                            aria-label="Customer / Buyer Name: activate to sort column ascending"
                            style="width: 189.891px;">Sales Order No.
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="datatable-list" rowspan="1" colspan="1"
                            aria-label="Merchandiser: activate to sort column ascending" style="width: 117.422px;">
                            Shop Name
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="datatable-list" rowspan="1" colspan="1"
                            aria-label="Brand / Season: activate to sort column ascending" style="width: 125.031px;">
                            Total Quantity
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="datatable-list" rowspan="1" colspan="1"
                            aria-label="Action: activate to sort column ascending" style="width: 115.078px;">Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr class="odd">
                        <td>29</td>
                        <td>2024-07-30</td>
                        <td>
                            #4567
                        </td>
                        <td>
                            <div class="d-flex justify-content-start align-items-center">
                                <div class="d-flex flex-column">
                                    <span class="fw-medium">
                                        <ul>
                                            <li>
                                                500-Sciencecity
                                            </li>
                                        </ul>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>300</td>
                        <td>
                            <a href="{{route('create-pick')}}" type="button"
                               class="btn btn-outline-success waves-effect">
                                <span class="ti-xs ti ti-note me-1"></span>Create
                            </a>
                        </td>
                    </tr>

                    <tr class="even">
                        <td>29</td>
                        <td>2024-07-30</td>
                        <td>
                            #8436
                        </td>
                        <td>
                            <div class="d-flex justify-content-start align-items-center">
                                <div class="d-flex flex-column">
                                    <span class="fw-medium">
                                        <ul>
                                            <li>
                                                342-Naranpura
                                            </li>
                                        </ul>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>300</td>
                        <td>
                            <a href="#" type="button"
                               class="btn btn-outline-success waves-effect">
                                <span class="ti-xs ti ti-note me-1"></span>Create
                            </a>

                        </td>
                    </tr>

                    <tr class="odd">
                        <td>29</td>
                        <td>2024-07-30</td>
                        <td>
                            #2567
                        </td>
                        <td>
                            <div class="d-flex justify-content-start align-items-center">
                                <div class="d-flex flex-column">
                                    <span class="fw-medium">
                                        <ul>
                                            <li>
                                                342-Navrangpura
                                            </li>
                                        </ul>


                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>500</td>
                        <td>
                            <a href="#" type="button"
                               class="btn btn-outline-success waves-effect">
                                <span class="ti-xs ti ti-note me-1"></span>Create
                            </a>

                        </td>
                    </tr>

                    <tr class="even">
                        <td>29</td>
                        <td>2024-07-30</td>
                        <td>
                            #8956
                        </td>
                        <td>
                            <div class="d-flex justify-content-start align-items-center">
                                <div class="d-flex flex-column">
                                    <span class="fw-medium">
                                        <ul>
                                            <li>
                                                342-Prahladnagar
                                            </li>
                                        </ul>


                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>1000</td>
                        <td>
                            <a href="#" type="button"
                               class="btn btn-outline-success waves-effect">
                                <span class="ti-xs ti ti-note me-1"></span>Create
                            </a>

                        </td>
                    </tr>

                    </tbody>
                </table>
                <div class="row mx-2">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_info" id="datatable-list_info" role="status" aria-live="polite">Showing 1
                            to 10 of 29 entries
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_paginate paging_simple_numbers" id="datatable-list_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="datatable-list_previous"><a
                                        aria-controls="datatable-list" aria-disabled="true" aria-role="link"
                                        data-dt-idx="previous" tabindex="0" class="page-link">Previous</a></li>
                                <li class="paginate_button page-item active"><a href="#" aria-controls="datatable-list"
                                                                                aria-role="link" aria-current="page"
                                                                                data-dt-idx="0" tabindex="0"
                                                                                class="page-link">1</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="datatable-list"
                                                                          aria-role="link" data-dt-idx="1" tabindex="0"
                                                                          class="page-link">2</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="datatable-list"
                                                                          aria-role="link" data-dt-idx="2" tabindex="0"
                                                                          class="page-link">3</a></li>
                                <li class="paginate_button page-item next" id="datatable-list_next"><a href="#"
                                                                                                       aria-controls="datatable-list"
                                                                                                       aria-role="link"
                                                                                                       data-dt-idx="next"
                                                                                                       tabindex="0"
                                                                                                       class="page-link">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
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
