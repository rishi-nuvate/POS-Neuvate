@extends('layouts/layoutMaster')

@section('title', 'Add-Product')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/toastr/toastr.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/typography.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/katex.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/editor.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.css') }}"/>

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

@section('page-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>
    <script src="{{ asset('assets/js/app-ecommerce-product-add.js') }}"></script>
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/toastr/toastr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/quill/katex.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/quill/quill.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>
@endsection

@section('content')

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <h4 class="ml-4">
            <span class="text-muted fw-light float-left">Master / Product /</span> Add
        </h4>
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
                            {{--                            <div class="d-flex gap-3">--}}
                            {{--                                <button class="btn btn-label-secondary">Discard</button>--}}
                            {{--                                <button class="btn btn-label-primary">Save draft</button>--}}
                            {{--                            </div>--}}
                            <button type="submit" class="btn btn-primary">Save Product</button>
                        </div>
                    </div>
                    <div class="row">
                        <!-- First column-->
                        <div class="col-12 col-lg-8">
                            <!-- Product Information -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-tile mb-0">Product information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="product_name">Name</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="product_name"
                                            placeholder="Product title"
                                            name="product_name"
                                            aria-label="Product title"/>
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
                                                aria-label="productCode"/>
                                        </div>
                                        <div class="col-md-4 mt-1">
                                            <label class="form-label" for="hsn_code">HSN Code</label>
                                            <input
                                                type="number"
                                                class="form-control"
                                                id="hsn_code"
                                                placeholder="Product HSN Code"
                                                name="hsn_code"
                                                aria-label="productHSNCode"/>
                                        </div>
                                        <div class="col-md-4 mt-1">
                                            <label class="form-label" for="material">Material</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="material"
                                                placeholder="Material Name"
                                                name="material"
                                                aria-label="Product title"/>
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
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Variants</h5>
                                </div>
                                <div class="card-body">
                                    <div id="productSKU0">
                                        <div class="row">
                                            <div class="mb-3 col-3">
                                                <label class="form-label" for="productSKU">Color</label>
                                                <input type="text" name="productColor[0][color]" id="color0"
                                                       placeholder="Color"
                                                       class="form-control">
                                            </div>

                                            <div class="mb-3 col-6">
                                                <label class="form-label" for="productSKU">Media</label>
                                                <input type="file" name="productColor[0][media]" id="media0"
                                                       placeholder="Color"
                                                       class="form-control">
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="mb-3 col-3">
                                                <label class="form-label" for="productSKU">Size</label>
                                                <input type="text" name="optionValueSize[0][0][size]" id="size0"
                                                       placeholder="Size"
                                                       class="form-control">
                                            </div>

                                            <div class="mb-3 col-6">
                                                <label class="form-label" for="productSKU">SKU</label>
                                                <input
                                                    type="text"
                                                    id="productSKU"
                                                    name="optionValueSize[0][0][sku]"
                                                    class="form-control"
                                                    placeholder="SKU"/>
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
                                <h5 class="card-header">Price</h5>
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
                                                aria-label="Product price"/>
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
                                                aria-label="Product discounted price"/>
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
                                                aria-label="Product mrp price"/>
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
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Status</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <select name="status" class="select2 form-select">
                                            <option value="">select umo</option>
                                            <option value="0">Active</option>
                                            <option value="1">Deactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Organize Card -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Organize</h5>
                                </div>
                                <div class="card-body">
                                    <!-- Category -->
                                    <div class="mb-3 col ecommerce-select2-dropdown">
                                        <label class="form-label mb-1" for="productCategory">Category</label>
                                        <select id="cat_id" class="select2 form-select"
                                                data-placeholder="Select Category" name="cat_id">
                                            <option value="">Select Category</option>

                                        </select>
                                    </div>
                                    <!-- Sub Category -->
                                    <div class="mb-3 col ecommerce-select2-dropdown">
                                        <label class="form-label mb-1" for="sub_cat_id">Sub Category </label>
                                        <select id="sub_cat_id" name="sub_cat_id" class="select2 form-select"
                                                data-placeholder="Sub Category">
                                            <option value="">Collection</option>
                                            <option value="2">Men's Clothing</option>
                                            <option value="3">Women's-clothing</option>
                                            <option value="4">Kid's-clothing</option>
                                        </select>
                                    </div>
                                    <!-- Tags -->
                                    <div class="mb-3">
                                        <label for="ecommerce-product-tags" class="form-label mb-1">Tags</label>
                                        <select name="tag_id[]" class="select2 form-select" id="tag_id" multiple>
                                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                                <option value="2">Jeans</option>
                                                <option value="3">Shirt</option>
                                                <option value="4">Kurtas</option>
                                                <option value="4">T-Shirt</option>
                                                <option value="5">Cargo</option>
                                                <option value="6">Joggers</option>
                                            </optgroup>

                                        </select>
                                    </div>
                                    {{--Season--}}
                                    <div class="mb-3">
                                        <label for="select2Multiple" class="form-label">Season</label>
                                        <select name="season_id" id="season_id" class="select2 form-select">
                                            <option value="">select umo</option>
                                            <option value="1">Winter</option>
                                            <option value="2">Summer</option>
                                        </select>
                                    </div>
                                    {{--Brand--}}
                                    <div class="mb-3">
                                        <label for="select2Multiple" class="form-label">Brand</label>
                                        <select name="brand_id" id="brand_id" class="select2 form-select">
                                            <option value="">select umo</option>
                                            <option value="4">NEW</option>
                                            <option value="5">REPEAT</option>
                                        </select>
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
          <div class="mb-3 col-3">
              <label class="form-label" for="optionValueSize_${colorVariantStart}">Size</label>
              <input type="text" name="optionValueSize[${colorVariantStart}][${newIndex}][size]" id="size_${colorVariantStart}" placeholder="Size" class="form-control">
          </div>
          <div class="mb-3 col-8">
              <label class="form-label" for="optionValueSize_${colorVariantStart}">SKU</label>
              <input type="text" id="optionValueSize_${colorVariantStart}" name="optionValueSize[${colorVariantStart}][${newIndex}][sku]" class="form-control" placeholder="SKU" />
          </div>
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
                                            <input type="text" name="productColor[${counter1}][color]" id="color${counter1}" placeholder="Color"
                                                   class="form-control">
                                        </div>

                                        <div class="mb-3 col-6">
                                            <label class="form-label" for="productSKU">Media</label>
                                            <input type="file" name="productColor[${counter1}][media]" id="media" placeholder="Color"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="mb-3 col-3">
                                            <label class="form-label" for="productSKU">Size</label>
                                            <input type="text" name="optionValueSize[${counter1}][0][size]" id="size" placeholder="Size"
                                                   class="form-control">
                                        </div>
                                        <input type="hidden" id="sizeVariantStart${counter1}" value="0">
                                        <div class="mb-3 col-6">
                                            <label class="form-label" for="productSKU">SKU</label>
                                            <input
                                                type="text"
                                                name="optionValueSize[${counter1}][0][sku]"
                                                id="productSKU"
                                                class="form-control"
                                                placeholder="SKU"/>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-primary" onclick="addAnotherSize(${counter1})">Add another Size
                                    </button>
                                </div>
                            </div>
                        </div>
      `;

            // Append the new div to the container
            document.getElementById("colorVariant").appendChild(newDiv);

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
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        window.onload = function() {
            console.log(1);
            $.ajax({
                type: 'POST',
                url: '{{ route('getCategory') }}',
                data: {
                    'X-CSRF-TOKEN': "{{ csrf_token()}}",
                },
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    $.each(response, function (key, value) {
                        $('#cat_id').append('<option value="' + value.id + '">' + value
                            .Name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.log(1);
                    console.error('Error:', xhr.responseText);
                    console.error('Status:', status);
                    console.error('Error:', error);
                }
            });
        };
    </script>
@endsection
