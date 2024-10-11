@extends('layouts.layoutMaster')

@section('title', 'List-Company')

@section('content')

    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/master') }}">Master</a>
            </li>
            <li class="breadcrumb-item active">Company</li>
            <li class="breadcrumb-item active">List</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table" id="datatable-list">
                <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Company Name</th>
                    <th>Billing Name</th>
                    <th>Billing Email</th>
                    <th>Billing Address</th>
                    <th>Action </th>
                </tr>
                </thead>
                <tbody>
                @php $num=1 @endphp
                @foreach($companies as $company)
                    <tr>
                        <td class="text-bold">{{$num}}</td>
                        <td>{{$company->company_name}}</td>
                        <td>
                            <div class="d-flex justify-content-start align-items-center">
                                <div class="avatar-wrapper">
                                    <div class="avatar me-2"><span
                                            class="avatar-initial rounded-circle bg-label-info">{{ substr($company->billing_name, 0, 2) }}</span>
                                    </div>
                                </div>
                                <div class="d-flex flex-column"><span
                                        class="fw-medium">{{ $company->billing_name }}</span><small
                                        class="text-truncate text-muted">{{ $company->billing_mobile_no }}</small></div>
                            </div>
                        </td>
                        <td>
                            {{$company->billing_email}}
                        </td>
                        <td><?= $company->add_line1 . '<br>' . $company->AddLine2 . '<br>' . $company->City . '<br>' . $company->State . '<br>' . $company->PinCode ?></td>
                        <td>
                            <a class="btn btn-icon btn-label-primary mx-2"
                               href="{{route('company.edit',['company' => $company->id])}}"
                            ><i
                                    class="ti ti-edit mx-2 ti-sm"></i></a>
                            <button type="button" class="btn btn-icon btn-label-danger mx-2"
                                    onclick="daleteCompany({{$company->id}})"
                            ><i
                                    class="ti ti-trash mx-2 ti-sm"></i></button>
                        </td>
                    </tr>
                    @php $num++ @endphp
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('page-script')

    <script>
        function daleteCompany(compId) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: false,
                confirmButtonText: "Yes, Approve it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#overlay").fadeIn(100);
                    $.ajax({
                        type: 'POST',
                        url: '/company/' + compId,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            compId: compId,
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function (resultData) {
                            Swal.fire('Done', 'Successfully! Done', 'success').then(() => {
                                location.reload();
                                $("#overlay").fadeOut(100);
                            });
                        }
                    });
                }
            });
        }

        $(document).ready(function () {
            $('#datatable-list').DataTable({
                order: [
                    [0, 'asc']
                ],
            });
        });
    </script>
@endsection
