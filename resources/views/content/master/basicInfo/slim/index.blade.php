@extends('layouts.layoutMaster')

@section('title', 'List-Slim')

@section('content')

    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/master') }}">Master</a>
            </li>
            <li class="breadcrumb-item active">Slim</li>
            <li class="breadcrumb-item active">View</li>
        </ol>
    </nav>


    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table" id="datatable-list">
                <thead>
                <tr>
                    <th>SR No.</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Slim Name</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection

@section('page-script')
    <script>

        function deleteSlim(slimId) {
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
                        url: '/slimDelete/' + slimId,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            slimId: slimId,
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

        window.onload = function () {
            getSlimData();
        }

        function getSlimData() {
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
                    "url": "{{ route('getSlimData') }}",
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
@endsection