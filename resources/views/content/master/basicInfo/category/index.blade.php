@extends('layouts.layoutMaster')

@section('title', 'Add-Product')

{{--@section('vendor-style')--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}"/>--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}"/>--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/toastr/toastr.css') }}"/>--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/typography.css') }}"/>--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/katex.css') }}"/>--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/editor.css') }}"/>--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}"/>--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}"/>--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.css') }}"/>--}}
{{--    <link rel="stylesheet" href="../../assets/vendor/fonts/tabler-icons.css"/>--}}

{{--    <style>--}}
{{--        .fade-in {--}}
{{--            animation: fadeIn 0.8s ease-in-out forwards;--}}
{{--        }--}}

{{--        @keyframes fadeIn {--}}
{{--            from {--}}
{{--                opacity: 0;--}}
{{--                transform: translateY(-10px);--}}
{{--            }--}}
{{--            to {--}}
{{--                opacity: 1;--}}
{{--                transform: translateY(0);--}}
{{--            }--}}
{{--        }--}}
{{--    </style>--}}
{{--@endsection--}}

{{--@section('page-script')--}}
{{--    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/js/app-ecommerce-product-add.js') }}"></script>--}}
{{--@endsection--}}

{{--@section('vendor-script')--}}
{{--    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/vendor/libs/toastr/toastr.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/vendor/libs/quill/katex.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/vendor/libs/quill/quill.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>--}}
{{--@endsection--}}

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
            <table class="datatables-basic table">
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

{{--    <div class="card">--}}
{{--        <h5 class="card-header">Ajax Sourced Server-side</h5>--}}
{{--        <div class="card-datatable text-nowrap">--}}
{{--            <table class="datatables-ajax table">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th>Full name</th>--}}
{{--                    <th>Email</th>--}}
{{--                    <th>Position</th>--}}
{{--                    <th>Office</th>--}}
{{--                    <th>Start date</th>--}}
{{--                    <th>Salary</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--            </table>--}}
{{--        </div>--}}
{{--    </div>--}}

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
    </script>
    <script src="{{ asset('assets/js/tables-datatables-basic.js') }}"></script>
@endsection
