@extends('layouts/layoutMaster')

@section('title', 'Pending-List-Pick ')


@section('content')
    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/centralWarehouseMaster') }}">Central Warehouse</a>
            </li>
            <li class="breadcrumb-item active">Picking Pending List</li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </nav>
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
                    @php $num = 1; @endphp

                    @foreach($stockAllocation as $allocation)
                        <tr>
                            <td>{{$num}}</td>
                            <td>{{$allocation->created_at->format('Y-m-d')}}</td>
                            <td>
                                {{$allocation->order_id}}
                            </td>
                            <td>
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="d-flex flex-column">
                                    <span class="fw-medium">
                                        <ul>
                                            <li>
                                                {{$allocation->store->store_name}}
                                            </li>
                                        </ul>
                                    </span>
                                    </div>
                                </div>
                            </td>
                            <td>{{$allocation->total_qty}}</td>
                            <td>
                                <div class="mb-3">
                                    @if($allocation->picker_id == null)
                                        <select name="picker_{{$allocation->id}}" id="picker_{{$allocation->id}}"
                                                class="select2 form-select" onchange="selectPicker({{$allocation->id}})"
                                                required>
                                            <option value="">select picker</option>
                                            @foreach($employees as $employee)
                                                <option value="{{$employee->id}}">{{$employee->emp_name}}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <button type="button" class="m-2 btn btn-md btn-outline-primary round waves-effect">{{$allocation->picker->emp_name}}</button>
                                    @endif


                                </div>
                            </td>
                            <td>
                                <a @if($allocation->picker_id != null) href="{{route('create-pick', $allocation->picker_id)}}" @endif type="button"
                                   class="btn btn-outline-success waves-effect" @if($allocation->picker_id == null) onclick="return false;" @endif >
                                    <span class="ti-xs ti ti-note me-1"></span>Create
                                </a>
                            </td>
                        </tr>
                        @php $num++; @endphp
                    @endforeach

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


        function selectPicker(id) {
            // var VendorName = document.getElementById('VendorName').value;
            // var VendorName = document.querySelector('#VendorName').value;

            var pickerId = document.getElementById('picker_' + id).value;


            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: false,
                confirmButtonText: 'Yes, Approve it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#overlay').fadeIn(100);
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('setPicker') }}',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            stockId: id,
                            pickerId: pickerId,
                            '_token': "{{ csrf_token() }}"
                        },
                        success: function (resultData) {
                            Swal.fire('Done', 'Successfully! Done', 'success').then(() => {
                                location.reload();
                                $('#overlay').fadeOut(100);
                            });
                        }
                    });
                }
            });
        }

    </script>

@endsection
