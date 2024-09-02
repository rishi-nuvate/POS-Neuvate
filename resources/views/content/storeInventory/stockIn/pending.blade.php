@extends('layouts/layoutMaster')

@section('title', 'Pending-Stock-In ')

@section('page-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light float-left">Store Inventory/ Stock In </span> / Pending
    </h4>
    <!-- Invoice List Widget -->




    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <div id="datatable-list_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="row me-2">
                    <div class="col-md-2">
                        <div class="me-3">
                            <div class="dataTables_length" id="datatable-list_length"><label><select
                                        name="datatable-list_length" aria-controls="datatable-list" class="form-select">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select></label></div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div
                            class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
                            <div id="datatable-list_filter" class="dataTables_filter"><label><input type="search"
                                                                                                    class="form-control"
                                                                                                    placeholder="Search.."
                                                                                                    aria-controls="datatable-list"></label>
                            </div>
                            <div class="dt-buttons btn-group flex-wrap">
                                <div class="btn-group">
                                    <button
                                        class="btn btn-secondary buttons-collection dropdown-toggle btn-label-primary mx-3"
                                        tabindex="0" aria-controls="datatable-list" type="button" aria-haspopup="dialog"
                                        aria-expanded="false"><span><i class="ti ti-screen-share me-1 ti-xs"></i>Export</span><span
                                            class="dt-down-arrow"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="datatables-basic table dataTable no-footer" id="datatable-list"
                       aria-describedby="datatable-list_info">
                    <thead>
                    <tr>
                        <th class="sorting" tabindex="0" aria-controls="datatable-list" rowspan="1" colspan="1"
                            aria-label="SR No.: activate to sort column ascending" style="width: 48.8438px;">SR No.
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="datatable-list" rowspan="1" colspan="1"
                            aria-label="Date: activate to sort column ascending" style="width: 38.9688px;">Outward Date
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="datatable-list" rowspan="1" colspan="1"
                            aria-label="Customer / Buyer Name: activate to sort column ascending"
                            style="width: 189.891px;">Sales Order No.
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

                        <td>300</td>
                        <td>
                            <a href="{{route('create-stock-in')}}" type="button"
                               class="btn btn-outline-success waves-effect">
                                <span class="ti-xs ti ti-note me-1"></span>Receive
                            </a>
                        </td>
                    </tr>

                    <tr class="even">
                        <td>29</td>
                        <td>2024-07-30</td>
                        <td>
                            #4567
                        </td>
                        <td>300</td>
                        <td>
                            <a href="#" type="button"
                               class="btn btn-outline-success waves-effect">
                                <span class="ti-xs ti ti-note me-1"></span>Receive
                            </a>

                        </td>
                    </tr>

                    <tr class="odd">
                        <td>29</td>
                        <td>2024-07-30</td>
                        <td>
                            #4567
                        </td>
                        <td>500</td>
                        <td>
                            <a href="#" type="button"
                               class="btn btn-outline-success waves-effect">
                                <span class="ti-xs ti ti-note me-1"></span>Receive
                            </a>

                        </td>
                    </tr>

                    <tr class="even">
                        <td>29</td>
                        <td>2024-07-30</td>
                        <td>
                            #4567
                        </td>
                        <td>1000</td>
                        <td>
                            <a href="#" type="button"
                               class="btn btn-outline-success waves-effect">
                                <span class="ti-xs ti ti-note me-1"></span>Receive
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
