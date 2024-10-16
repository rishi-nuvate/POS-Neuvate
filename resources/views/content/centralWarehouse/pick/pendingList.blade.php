@extends('layouts/layoutMaster')

@section('title', 'Pending-List-Pick ')


@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light float-left">Central Warehouse/ </span> Pick List
    </h4>
    <!-- Invoice List Widget -->




    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <div id="datatable-list_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                <table class="datatables-basic table dataTable no-footer" id="datatable-list"
                       aria-describedby="datatable-list_info">
                    <thead>
                    <tr>
                        <th>SR No.</th>
                        <th>Date</th>
                        <th>Sales Order No.</th>
                        <th>Shop Name</th>
                        <th>Total Quantity</th>
                        <th>Picker</th>
                        <th>Action</th>
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
                            <div class="mb-3">
                                <select name="status" class="select2 form-select" required>
                                    <option value="">select picker</option>
                                    <option value="0">Active</option>
                                    <option value="1">Deactive</option>
                                </select>
                            </div>
                        </td>
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
                        <td><div class="mb-3">
                                <select name="status" class="select2 form-select" required>
                                    <option value="">select picker</option>
                                    <option value="0">Active</option>
                                    <option value="1">Deactive</option>
                                </select>
                            </div></td>
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
                        <td><div class="mb-3">
                                <select name="status" class="select2 form-select" required>
                                    <option value="">select picker</option>
                                    <option value="0">Active</option>
                                    <option value="1">Deactive</option>
                                </select>
                            </div></td>
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
                        <td><div class="mb-3">
                                <select name="status" class="select2 form-select" required>
                                    <option value="">select picker</option>
                                    <option value="0">Active</option>
                                    <option value="1">Deactive</option>
                                </select>
                            </div></td>
                        <td>
                            <a href="#" type="button"
                               class="btn btn-outline-success waves-effect">
                                <span class="ti-xs ti ti-note me-1"></span>Create
                            </a>

                        </td>
                    </tr>

                    </tbody>
                </table>
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
