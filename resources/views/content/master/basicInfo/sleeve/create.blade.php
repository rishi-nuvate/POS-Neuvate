@extends('layouts.layoutMaster')

@section('title', 'Add-Sleeve')


@section('content')
    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/master') }}">Master</a>
            </li>
            <li class="breadcrumb-item active">Sleeve</li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </nav>

    <!-- Invoice List Widget -->

    <div class="card">
        <div class="card-body">
            <div class="content">
                <div class="content-header mb-4">
                    <h3 class="mb-1">Add Sleeve</h3>
                </div>
                <form method="post" action="{{route('sleeve.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        {{-- Example --}}
                        {{-- {{!! textInputField('div.class', 'label', 'inputType', 'name', 'id', 'placeholder', 'star','inputClass', 'defaultValue', 'required','readonly')}} --}}

                        <div class="mb-3 col-md-4 ecommerce-select2-dropdown">
                            <label class="form-label mb-1" for="productCategory">Category</label>
                            <select onchange="getSubCategoriesData()"
                                    class="select2 form-select" id="productCategory"
                                    data-placeholder="Select Category" name="cat_id">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->Name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 col-md-4 ecommerce-select2-dropdown">
                            <label class="form-label mb-1" for="sub_cat_id">Sub Category </label>
                            <select id="subCategory" name="sub_cat_id" class="select2 form-select"
                                    data-placeholder="Sub Category">
                                <option value="">Collection</option>
                            </select>
                        </div>

                        {!! textInputField('col-md-4', 'Sleeve Name', 'text', 'sleeve_name', 'sleeve_name', 'Sleeve Name', '', '',old('sleeve_name') ,'','') !!}

                    </div>
                    <br>
                    <div class="row px-0 mt-3">
                        <div class="col-lg-2 col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-primary d-grid w-100">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('page-script')
    <script>
        function getSubCategoriesData() {
            var categoryId = document.getElementById('productCategory').value;
            if (categoryId) {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('getSubCategories') }}',
                    data: {
                        categoryId: categoryId,
                        '_token': "{{ csrf_token() }}",
                    },
                    dataType: 'json',
                    success: function (response) {
                        $('#subCategory').empty().append(
                            '<option value="">Select Sub Category</option>');
                        $.each(response, function (key, value) {
                            $('#subCategory').append('<option value="' + value.id + '">' + value
                                .Name + '</option>');
                        });
                    }
                });
            } else {
                $('#subCategory').empty().append('<option value="">Select Sub Category</option>');
            }
        }
    </script>
@endsection
