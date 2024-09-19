@extends('layouts.layoutMaster')

@section('title', 'List-Brands')

@section('content')

    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/master') }}">Master</a>
            </li>
            <li class="breadcrumb-item active">Brand</li>
            <li class="breadcrumb-item active">View</li>
        </ol>
    </nav>
{{--    --}}
{{--    <h4 class="py-3 mb-4">--}}
{{--        <span class="text-muted fw-light float-left">Master / Brands /</span> View--}}
{{--    </h4>--}}
    <!-- Master Brands List -->


    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table" id="datatable-list">
                <thead>
                <tr>
                    <th>SR No.</th>
                    <th>Brand Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $num=1 @endphp
                @foreach($brands as $brand)
                    <tr>
                        <td class="text-bold">{{$num}}</td>
                        <td>{{$brand->name}}</td>
                        <td>
                            <a class="btn btn-icon btn-label-primary mx-2"
                               href="{{route('brand.edit',['brand' => $brand->id])}}"><i
                                    class="ti ti-edit mx-2 ti-sm"></i></a>
                            <button type="button" class="btn btn-icon btn-label-danger mx-2"
                                    onclick="deleteBlog({{$brand->id}})"><i
                                    class="ti ti-trash mx-2 ti-sm"></i></button>
                        </td>
                    </tr>
                    @php $num++ @endphp
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <script>
        function deleteBlog(blogId) {
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
                        url: '/brands/' + blogId,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            blogId: blogId,
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
    </script>
@endsection
