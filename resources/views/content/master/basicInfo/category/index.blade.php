@extends('layouts.layoutMaster')

@section('title', 'List-Category')

@section('content')

    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/master') }}">Master</a>
            </li>
            <li class="breadcrumb-item active">Category</li>
            <li class="breadcrumb-item active">List</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table" id="datatable-list">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>SubCategory</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $num=1 @endphp
                @foreach($categories as $category)
                    <tr>
                        <td class="text-bold">{{$num}}</td>
                        <td>{{$category->Name}}</td>
                        <td>
                            <ul>

                                @foreach($category->subCategory as $subCategory)
                                    <li>
                                        {{$subCategory->Name}}
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <a class="btn btn-icon btn-label-primary mx-2"
                               href="{{route('category.edit',['category' => $category->id])}}"><i
                                    class="ti ti-edit mx-2 ti-sm"></i></a>
                            <button type="button" class="btn btn-icon btn-label-danger mx-2"
                                    onclick="deleteCategory({{$category->id}})"><i
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
        function deleteCategory(catId) {
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
                        url: '/category/' + catId,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            catId: catId,
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
