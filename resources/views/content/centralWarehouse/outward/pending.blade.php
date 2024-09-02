@extends('layouts/layoutMaster')

@section('title', 'Pending-Outward ')

@section('page-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light float-left">Central Warehouse/ </span> Outward Pending
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
                            <div class="d-flex justify-content-start align-items-center">
                                <div class="d-flex flex-column">
                                    <span class="fw-medium">
                                       500-Sciencecity
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>300</td>
                        <td>
                            <a href="#" type="button"
                               class="btn btn-outline-success waves-effect">
                                <span class="ti-xs ti ti-note me-1"></span>Outward
                            </a>
                        </td>
                    </tr>

                    <tr class="odd">
                        <td>29</td>
                        <td>2024-07-30</td>
                        <td>
                            <div class="d-flex justify-content-start align-items-center">
                                <div class="d-flex flex-column">
                                    <span class="fw-medium">
                                       500-Sciencecity
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>300</td>
                        <td>
                            <a href="#" type="button"
                               class="btn btn-outline-success waves-effect">
                                <span class="ti-xs ti ti-note me-1"></span>Outward
                            </a>
                        </td>
                    </tr>

                    <tr class="odd">
                        <td>29</td>
                        <td>2024-07-30</td>
                        <td>
                            <div class="d-flex justify-content-start align-items-center">
                                <div class="d-flex flex-column">
                                    <span class="fw-medium">
                                       500-Sciencecity
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>300</td>
                        <td>
                            <a href="#" type="button"
                               class="btn btn-outline-success waves-effect">
                                <span class="ti-xs ti ti-note me-1"></span>Outward
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
