@extends('layouts/layoutMaster')

@section('title', 'Add-Product')

@section('vendor-style')

    <style>
        .fade-in {
            animation: fadeIn 0.8s ease-in-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endsection


@section('content')

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <nav aria-label="breadcrumb" style="font-size: 20px">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/master') }}">Master</a>
                </li>
                <li class="breadcrumb-item active">Product</li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </nav>
        <div class="flex-grow-1">
            <div class="app-ecommerce">
                <!-- Add Product -->

                <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div
                        class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
                        <div class="d-flex flex-column justify-content-center">
                            <h4 class="mb-1 mt-3">Add a new Product</h4>
                        </div>
                        <div class="d-flex align-content-center flex-wrap gap-3">
                            {{--                            <button type="button" class="btn btn-primary">import Products</button>--}}
                            <button type="submit" class="btn btn-primary">Save Product</button>

                        </div>

                    </div>
                    <div class="row">
                        <!-- First column-->
                        <div class="col-12 col-lg-8">
                            <div class="text-white rounded-top bg-primary p-2">
                                Product information
                            </div>
                            <!-- Product Information -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">


                                        <div class="mb-3 col-md-8">
                                            <label class="form-label" for="product_name">Name</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="product_name"
                                                placeholder="Product title"
                                                name="product_name"
                                                aria-label="Product title" required/>
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label class="form-label" for="productSizeCm">Size(CM)</label>
                                            <input
                                                type="text"
                                                id="productSizeCm"
                                                name="size_cm"
                                                class="form-control"
                                                placeholder="Size"/>
                                        </div>
                                    </div>
                                    <div class="row mb-3 col-md-12">
                                        <div class="col-md-4 mt-1">
                                            <label class="form-label" for="product_code">Product Code</label>
                                            <input
                                                type="number"
                                                class="form-control"
                                                id="product_code"
                                                placeholder="Product Code"
                                                name="product_code"
                                                aria-label="productCode" required/>
                                        </div>
                                        <div class="col-md-4 mt-1">
                                            <label class="form-label" for="hsn_code">HSN Code</label>
                                            <input
                                                type="number"
                                                class="form-control"
                                                id="hsn_code"
                                                placeholder="Product HSN Code"
                                                name="hsn_code"
                                                aria-label="productHSNCode" required/>
                                        </div>
                                        <div class="col-md-4 mt-1">
                                            <label class="form-label" for="material">Material</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="material"
                                                placeholder="Material Name"
                                                name="material"
                                                aria-label="Product title" required/>
                                        </div>

                                    </div>
                                    <!-- Description -->
                                    <div class="col-12">
                                        <div class="col-12">
                                            <label class="form-label" for="bootstrap-maxlength-example2">Product
                                                Description</label>
                                            <textarea name="product_description"
                                                      id="bootstrap-maxlength-example2"
                                                      class="form-control bootstrap-maxlength-example"
                                                      rows="3"
                                                      maxlength="255"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Product Information -->

                            <!-- Variants -->

                            <div class="card mb-4">
                                <div class="text-white rounded-top bg-primary p-2">
                                    Variants
                                </div>
                                <div class="card-body">
                                    <div id="productSKU0">
                                        <div class="row">
                                            <div class="mb-3 col-3">
                                                <label class="form-label" for="productSKU">Color</label>
                                                {{--                                                <input type="text" name="productColor[0][color]" id="color0"--}}
                                                {{--                                                       placeholder="Color"--}}
                                                {{--                                                       class="form-control">--}}

                                                <select class="select2 form-select" id="color0"
                                                        data-placeholder="Select Color" name="productColor[0][color]"
                                                        required>
                                                    <option value="">Select Category</option>
                                                    @foreach($colors as $color)
                                                        <option value="{{$color->id}}">{{$color->color}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3 col-6">
                                                <label class="form-label" for="productSKU">Media</label>
                                                <input type="file" name="productColor[0][media]" id="media0"
                                                       placeholder="Color"
                                                       class="form-control">
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="mb-3 col-md-3">
                                                <label class="form-label" for="productSKU">Size</label>
                                                <input type="text" name="optionValueSize[0][0][size]" id="size0"
                                                       placeholder="Size"
                                                       class="form-control">
                                            </div>

                                            <div class="mb-3 col-md-4">
                                                <label class="form-label" for="productSKU">SKU</label>
                                                <input
                                                    type="text"
                                                    id="productSKU"
                                                    name="optionValueSize[0][0][sku]"
                                                    class="form-control"
                                                    placeholder="SKU"/>
                                            </div>

                                            <div class="mb-3 col-md-4">
                                                <label class="form-label" for="productBarcode">Barcode</label>
                                                <input
                                                    type="text"
                                                    id="productBarcode"
                                                    name="optionValueSize[0][0][barcode]"
                                                    class="form-control"
                                                    placeholder="Barcode"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-primary" onclick="addAnotherSize(0)">Add
                                            another Size
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="colorVariant">
                            </div>
                            <div class="m-4">
                                <button type="button" class="btn btn-warning" onclick="addAnotherColor()">Add another
                                    Color
                                </button>
                            </div>

                            <!-- /Variants -->
                            <div class="card mb-4">
                                <div class="text-white rounded-top bg-primary p-2">
                                    Price
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        {{--Cost Price--}}
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="ecommerce-product-price">Cost Price</label>
                                            <input
                                                type="number"
                                                class="form-control"
                                                id="ecommerce-cost_price"
                                                placeholder="Price"
                                                name="cost_price"
                                                aria-label="Product price" required/>
                                        </div>
                                        <!-- Discounted Price -->
                                        <div class=" col-md-4 mb-3">
                                            <label class="form-label" for="ecommerce-product-selling-price">Selling
                                                Price</label>
                                            <input
                                                type="number"
                                                class="form-control"
                                                id="ecommerce-sell_price"
                                                placeholder="Discounted Price"
                                                name="sell_price"
                                                aria-label="Product discounted price" required/>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="ecommerce-product-mrp-price">MRP
                                            </label>
                                            <input
                                                type="number"
                                                class="form-control"
                                                id="product_mrp"
                                                placeholder="Mrp Price"
                                                name="product_mrp"
                                                aria-label="Product mrp price" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Second column -->

                        <!-- Second column -->
                        <div class="col-12 col-lg-4">
                            <!-- Pricing Card -->
                            <div class="card mb-4">
                                <div class="text-white rounded-top bg-primary p-2">
                                    Status
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <select name="status" class="select2 form-select" required>
                                            <option value="">select umo</option>
                                            <option value="0">Active</option>
                                            <option value="1">Deactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Organize Card -->
                            <div class="card mb-4">
                                <div class="text-white rounded-top bg-primary p-2">
                                    Organize
                                </div>
                                <div class="card-body">
                                    <!-- Category -->
                                    <div class="mb-3 col ecommerce-select2-dropdown">
                                        <label class="form-label mb-1" for="productCategory">Category</label>
                                        <select onchange="getSubCategoriesData()"
                                                class="select2 form-select" id="productCategory"
                                                data-placeholder="Select Category" name="cat_id" required>
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Sub Category -->
                                    <div class="mb-3 col ecommerce-select2-dropdown">
                                        <label class="form-label mb-1" for="sub_cat_id">Sub Category </label>
                                        <select id="subCategory" name="sub_cat_id" onchange="getSleeveFit()"
                                                class="select2 form-select"
                                                data-placeholder="Sub Category" required>
                                            <option value="">Collection</option>
                                        </select>
                                    </div>
                                    <!-- Tags -->
                                    <div class="mb-3">
                                        <label for="ecommerce-product-tags" class="form-label mb-1">Tags</label>
                                        <select name="tag_id[]" class="select2 form-select" id="tag_id" multiple>
                                            <option value="">select Tag</option>
                                            @foreach($tags as $tag)
                                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--Season--}}
                                    <div class="mb-3">
                                        <label for="select2Multiple" class="form-label">Season</label>
                                        <select name="season_id" id="season_id" class="select2 form-select">
                                            <option value="">select Season</option>
                                            @foreach($seasons as $season)
                                                <option value="{{$season->id}}">{{$season->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--Brand--}}
                                    <div class="mb-3">
                                        <label for="select2Multiple" class="form-label">Brand</label>
                                        <select name="brand_id" id="brand_id" class="select2 form-select">
                                            <option value="">select Brand</option>
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--                                    Fit--}}
                                    <div class="mb-3">
                                        <label for="select2Multiple" class="form-label">Fit</label>
                                        <select name="fit_id" id="fit_id" class="select2 form-select">
                                            <option value="">select Fit</option>
                                            @foreach($fits as $fit)
                                                <option value="{{$fit->id}}">{{$fit->fit_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--                                    Sleeve--}}
                                    <div class="mb-3">
                                        <label for="select2Multiple" class="form-label">Sleeve</label>
                                        <select name="sleeve_id" id="sleeve_id" class="select2 form-select">
                                            <option value="">select Sleeve</option>
                                            @foreach($sleeves as $sleeve)
                                                <option value="{{$sleeve->id}}">{{$sleeve->sleeve_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="select2Multiple" class="form-label">Fashion</label>
                                        <input type="text" name="fashion_id" id="fashion_id" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="select2Multiple" class="form-label">Pattern</label>
                                        <input type="text" name="pattern_id" id="pattern_id" class="form-control">

                                    </div>
                                </div>
                            </div>
                            <!-- /Organize Card -->


                        </div>
                        <input type="hidden" id="sizeVariantStart0" value="0">
                        <!-- /Second column -->
                    </div>
                </form>

            </div>
        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
@endsection

@section('page-script')

    <script>
        var counter1 = 0;

        function addAnotherSize(colorVariantStart) {
            let productSKU = document.querySelector(`#productSKU${colorVariantStart}`);
            var sizeVariantStart = document.getElementById(`sizeVariantStart${colorVariantStart}`).value;
            sizeVariantStart++;
            let newIndex = sizeVariantStart;


            var newDiv = document.createElement("div");
            newDiv.className = "row";
            newDiv.id = "sizeItem_" + colorVariantStart + sizeVariantStart;
            newDiv.innerHTML = `
          <div class="mb-3 col-md-3">
              <label class="form-label" for="optionValueSize_${colorVariantStart}">Size</label>
              <input type="text" name="optionValueSize[${colorVariantStart}][${newIndex}][size]" id="size_${colorVariantStart}" placeholder="Size" class="form-control">
          </div>
          <div class="mb-3 col-md-4">
              <label class="form-label" for="optionValueSize_${colorVariantStart}">SKU</label>
              <input type="text" id="optionValueSize_${colorVariantStart}" name="optionValueSize[${colorVariantStart}][${newIndex}][sku]" class="form-control" placeholder="SKU" />
          </div>
          <div class="mb-3 col-md-4">
            <label class="form-label" for="productBarcode_${colorVariantStart}">Barcode</label>
            <input type="text" id="productBarcode_${colorVariantStart}" name="optionValueSize[${colorVariantStart}][${newIndex}][barcode]" class="form-control" placeholder="Barcode"/> </div>
          <div class="col-1 mt-4">
              <button type="button" onclick="removeSize(${colorVariantStart},${newIndex})" class="btn rounded-pill btn-icon btn-label-danger waves-effect">
                  <span class="ti ti-trash"></span>
              </button>
          </div>
      `;

            // document.querySelector(`#productSKU${colorVariantStart}`)

            document.getElementById(`productSKU${colorVariantStart}`).appendChild(newDiv)

            document.getElementById(`sizeVariantStart${colorVariantStart}`).value = sizeVariantStart;
        }

        function removeSize(colorId, sizeId) {
            var elementToRemove = document.getElementById("sizeItem_" + colorId + sizeId);

            if (elementToRemove) {
                elementToRemove.remove();
            }
        }

        var counter2 = 0;

        function addAnotherColor() {
            counter1++;

            var colors = `@foreach($colors as $color)
            <option value="{{$color->id}}">{{$color->color}}</option>
                                                    @endforeach`;
            // Create a new div element with the specified HTML code
            var newDiv = document.createElement("div");
            newDiv.className = "row fade-in";
            newDiv.id = "item_" + counter1;
            newDiv.innerHTML = `
<div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Variants</h5>
                            </div>
                            <div class="card-body">
                                <div id="productSKU${counter1}">
                                    <div class="row">
                                        <div class="mb-3 col-3">
                                            <label class="form-label" for="productSKU">Color</label>
                                            <select class="select2 form-select" id="color${counter1}"
                                                        data-placeholder="Select Color" name="productColor[${counter1}][color]" required>
                                                    <option value="">Select Color</option>
                                                    ${colors}
                                            </select>
                                        </div>

                                        <div class="mb-3 col-6">
                                            <label class="form-label" for="productSKU">Media</label>
                                            <input type="file" name="productColor[${counter1}][media]" id="media" placeholder="Color"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="mb-3 col-md-3">
                                            <label class="form-label" for="productSKU">Size</label>
                                            <input type="text" name="optionValueSize[${counter1}][0][size]" id="size" placeholder="Size"
                                                   class="form-control">
                                        </div>
                                        <input type="hidden" id="sizeVariantStart${counter1}" value="0">
                                        <div class="mb-3 col-md-4">
                                            <label class="form-label" for="productSKU">SKU</label>
                                            <input
                                                type="text"
                                                name="optionValueSize[${counter1}][0][sku]"
                                                id="productSKU"
                                                class="form-control"
                                                placeholder="SKU"/>
                                        </div>
                                        <div class="mb-3 col-md-4">
                                                <label class="form-label" for="productBarcode">Barcode</label>
                                                <input
                                                    type="text"
                                                    id="productBarcode"
                                                    name="optionValueSize[${counter1}][0][barcode]"
                                                    class="form-control"
                                                    placeholder="Barcode"/>
                                            </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-primary" onclick="addAnotherSize(${counter1})">Add another Size
                                    </button>
                                    <button type="button" onclick="removeItem(${counter1})" class="btn rounded-pill btn-icon btn-label-danger waves-effect mx-2">
                                          <span class="ti ti-trash"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
      `;

            // Append the new div to the container
            document.getElementById("colorVariant").appendChild(newDiv);

            $('.select2').select2();


            // Set focus to the input field
            newDiv.querySelector("input").focus();

            // Remove the animation class after the animation ends
            newDiv.addEventListener('animationend', () => {
                newDiv.classList.remove('fade-in');
            });

        }

        function removeItem(counter1) {
            var elementToRemove = document.getElementById("item_" + counter1);
            if (elementToRemove) {
                elementToRemove.remove();
            }
        }

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
                                .name + '</option>');
                        });
                    }
                });
            } else {
                $('#subCategory').empty().append('<option value="">Select Sub Category</option>');
            }
        }

        function getSleeveFit() {
            var categoryId = document.getElementById('productCategory').value;
            var subCategoryId = document.getElementById('subCategory').value;

            if (subCategoryId && categoryId) {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('getSleeveFit') }}',
                    data: {
                        categoryId: categoryId,
                        subCategoryId: subCategoryId,
                        '_token': "{{ csrf_token() }}",
                    },
                    dataType: 'json',
                    success: function (response) {

                        $('#fit_id').empty().append(
                            '<option value="">Select Sub Category</option>');

                        $('#sleeve_id').empty().append(
                            '<option value="">Select Sub Category</option>');

                        $.each(response.fit, function (key, value) {
                            $('#fit_id').append('<option value="' + value.id + '">' + value
                                .fit_name + '</option>');
                        });

                        $.each(response.sleeve, function (key, value) {
                            $('#sleeve_id').append('<option value="' + value.id + '">' + value
                                .sleeve_name + '</option>');
                        });
                    }
                });
            } else {
                $('#subCategory').empty().append('<option value="">Select Sub Category</option>');
            }
        }
    </script>
@endsection
