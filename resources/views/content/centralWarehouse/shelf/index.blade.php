@extends('layouts.layoutMaster')

@section('title', 'List-Shelf')

@section('content')

    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Central Warehouse</a>
            </li>
            <li class="breadcrumb-item active">Shelf</li>
            <li class="breadcrumb-item active">View</li>
        </ol>
    </nav>


    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table" id="datatable-list">
                <thead>
                <tr>
                    <th>SR No.</th>
                    <th>Warehouse Name</th>
                    <th>Row</th>
                    <th>No. of Columns </th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection

@section('page-script')
    <script>

        window.onload = function () {
            getBrandData();
        }

        function getBrandData() {
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
                    "url": "{{ route('getShelfData') }}",
                    "type": "POST",
                    "headers": "{ 'X-CSRF-TOKEN': $('meta[name='csrf-token']').attr('content') }",
                    "data": {
                        "_token": "{{ csrf_token() }}"
                    },
                },

                "initComplete": function (setting, json) {
                    $("#overlay").fadeOut(100);
                },
                bDestroy: true,
                columnDefs: [
                    { targets: 0, visible: false }  // Hide the column used for grouping
                ],
                drawCallback: function (settings) {
                    var api = this.api();
                    var rows = api.rows({page: 'current'}).nodes();
                    var last = null;

                    api
                        .column(0, {page: 'current'})
                        .data()
                        .each(function (group, i) {
                            if (last !== group) {
                                $(rows)
                                    .eq(i)
                                    .before('<tr class="group"><td colspan="8">' + group + '</td></tr>');

                                last = group;
                            }
                        });
                },
            });

        }
    </script>
@endsection
