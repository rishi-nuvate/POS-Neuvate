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
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="app-ecommerce">
                <!-- Add Product -->
                <div
                    class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
                    <div class="d-flex flex-column justify-content-center">
                        <h4 class="mb-1 mt-3">Add a new Product</h4>
                    </div>
                    <div class="d-flex align-content-center flex-wrap gap-3">
                        <div class="d-flex gap-3">
                            <button class="btn btn-label-secondary">Discard</button>
                            <button class="btn btn-label-primary">Save draft</button>
                        </div>
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
                                    <label class="form-label" for="ecommerce-product-name">Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="ecommerce-product-name"
                                        placeholder="Product title"
                                        name="productTitle"
                                        aria-label="Product title"/>
                                </div>
                                <div class="row mb-3 col-md-12">
                                    <div class="col-md-4 mt-1">
                                        <label class="form-label" for="productCode">Product Code</label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="productCode"
                                            placeholder="Product Code"
                                            name="productCode"
                                            aria-label="productCode"/>
                                    </div>
                                    <div class="col-md-4 mt-1">
                                        <label class="form-label" for="productHSNCode">HSN Code</label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="productHSNCode"
                                            placeholder="Product HSN Code"
                                            name="productHSNCode"
                                            aria-label="productHSNCode"/>
                                    </div>
                                    <div class="col-md-4 mt-1">
                                        <label class="form-label" for="productHSNCode">Material</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="ecommerce-product-name"
                                            placeholder="Material Name"
                                            name="productTitle"
                                            aria-label="Product title"/>
                                    </div>

                                </div>
                                <!-- Description -->
                                <div class="col-12">
                                    <div class="col-12">
                                        <label class="form-label" for="bootstrap-maxlength-example2">Product
                                            Description</label>
                                        <textarea
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
                                <div id="productSKU">
                                    <div class="row">
                                        <div class="mb-3 col-3">
                                            <label class="form-label" for="productSKU">Color</label>
                                            <input type="text" name="color" id="color" placeholder="Color"
                                                   class="form-control">
                                        </div>

                                        <div class="mb-3 col-6">
                                            <label class="form-label" for="productSKU">Media</label>
                                            <input type="file" name="media" id="media" placeholder="Color"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="mb-3 col-3">
                                            <label class="form-label" for="productSKU">Size</label>
                                            <input type="text" name="size" id="size" placeholder="Size"
                                                   class="form-control">
                                        </div>

                                        <div class="mb-3 col-6">
                                            <label class="form-label" for="productSKU">SKU</label>
                                            <input
                                                type="text"
                                                id="productSKU"
                                                class="form-control"
                                                placeholder="SKU"/>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-primary" onclick="addAnotherSize()">Add another Size
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="colorVariant">
                        </div>
                        <div class="m-4">
                            <button class="btn btn-warning" onclick="addAnotherColor()">Add another Color
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
                                            id="ecommerce-product-price"
                                            placeholder="Price"
                                            name="productPrice"
                                            aria-label="Product price"/>
                                    </div>
                                    <!-- Discounted Price -->
                                    <div class=" col-md-4 mb-3">
                                        <label class="form-label" for="ecommerce-product-selling-price">Selling
                                            Price</label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="ecommerce-product-selling-price"
                                            placeholder="Discounted Price"
                                            name="productDiscountedPrice"
                                            aria-label="Product discounted price"/>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="ecommerce-product-mrp-price">MRP
                                        </label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="ecommerce-product-mrp-price"
                                            placeholder="Mrp Price"
                                            name="productMrpPrice"
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
                                    <select name="wefw" class="select2 form-select">
                                        <option value="">select umo</option>
                                        <option value="active">Active</option>
                                        <option value="deactive">Deactive</option>
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
                                    <select id="category-org" class="select2 form-select"
                                            data-placeholder="Select Category">
                                        <option value="">Select Category</option>
                                        <option value="Household">Household</option>
                                        <option value="Management">Management</option>
                                        <option value="Electronics">Electronics</option>
                                        <option value="Office">Office</option>
                                        <option value="Office">Office</option>
                                        <option value="Automotive">Automotive</option>
                                    </select>
                                </div>
                                <!-- Sub Category -->
                                <div class="mb-3 col ecommerce-select2-dropdown">
                                    <label class="form-label mb-1" for="collection">Sub Category </label>
                                    <select id="collection" class="select2 form-select" data-placeholder="Sub Category">
                                        <option value="">Collection</option>
                                        <option value="men-clothing">Men's Clothing</option>
                                        <option value="women-clothing">Women's-clothing</option>
                                        <option value="kid-clothing">Kid's-clothing</option>
                                    </select>
                                </div>
                                <!-- Tags -->
                                <div class="mb-3">
                                    <label for="ecommerce-product-tags" class="form-label mb-1">Tags</label>
                                    {{-- <select name="wefwe" class="select2 form-select" multiple>
                                      <optgroup label="Alaskan/Hawaiian Time Zone">
                                          <option value="AK">Jeans</option>
                                          <option value="HI">Shirt</option>
                                          <option value="CA">Kurtas</option>
                                          <option value="NV">T-Shirt</option>
                                          <option value="OR">Cargo</option>
                                          <option value="WA">Joggers</option>
                                      </optgroup>

                                  </select> --}}
                                    <select id="select2Multiple" class="select2 form-select" multiple>
                                        <optgroup label="#Tags">
                                            <option value="AK">Jeans</option>
                                            <option value="HI">Shirt</option>
                                            <option value="CA">Kurtas</option>
                                            <option value="NV">T-Shirt</option>
                                            <option value="OR">Cargo</option>
                                            <option value="WA">Joggers</option>
                                        </optgroup>

                                    </select>
                                </div>
                                {{--Season--}}
                                <div class="mb-3">
                                    <label for="select2Multiple" class="form-label">Season</label>
                                    <select name="wefw" class="select2 form-select">
                                        <option value="">select umo</option>
                                        <option value="MTRS">Winter</option>
                                        <option value="PIECES">Summer</option>
                                    </select>
                                </div>
                                {{--                                Brand--}}
                                <div class="mb-3">
                                    <label for="select2Multiple" class="form-label">Brand</label>
                                    <select name="wefw" class="select2 form-select">
                                        <option value="">select umo</option>
                                        <option value="MTRS">NEW</option>
                                        <option value="PIECES">REPEAT</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /Organize Card -->


                    </div>
                    <!-- /Second column -->
                </div>
            </div>
        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->


    <script>
        var counter = 0;
        var counter1 = 0;

        function addAnotherSize() {
            counter++;
            // Create a new div element with the specified HTML code
            var newDiv = document.createElement("div");
            newDiv.className = "row fade-in";
            newDiv.id = "item_" + counter;
            newDiv.innerHTML = `
          <div class="mb-3 col-3">
              <label class="form-label" for="productSize_${counter}">Size</label>
              <input type="text" name="size[]" id="size_${counter}" placeholder="Size" class="form-control">
          </div>
          <div class="mb-3 col-8">
              <label class="form-label" for="productSKU_${counter}">SKU</label>
              <input type="text" id="productSKU_${counter}" class="form-control" placeholder="SKU" />
          </div>
          <div class="col-1 mt-4">
              <button type="button" onclick="removeItem(${counter})" class="btn rounded-pill btn-icon btn-label-danger waves-effect">
                  <span class="ti ti-trash"></span>
              </button>
          </div>
      `;

            // Append the new div to the container
            document.getElementById("productSKU").appendChild(newDiv);

            // Set focus to the input field
            newDiv.querySelector("input").focus();

            // Remove the animation class after the animation ends
            newDiv.addEventListener('animationend', () => {
                newDiv.classList.remove('fade-in');
            });
        }

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
                                <div id="productSKU">
                                    <div class="row">
                                        <div class="mb-3 col-3">
                                            <label class="form-label" for="productSKU">Color</label>
                                            <input type="text" name="color" id="color" placeholder="Color"
                                                   class="form-control">
                                        </div>

                                        <div class="mb-3 col-6">
                                            <label class="form-label" for="productSKU">Media</label>
                                            <input type="file" name="media" id="media" placeholder="Color"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="mb-3 col-3">
                                            <label class="form-label" for="productSKU">Size</label>
                                            <input type="text" name="size" id="size" placeholder="Size"
                                                   class="form-control">
                                        </div>

                                        <div class="mb-3 col-6">
                                            <label class="form-label" for="productSKU">SKU</label>
                                            <input
                                                type="text"
                                                id="productSKU"
                                                class="form-control"
                                                placeholder="SKU"/>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-primary" onclick="addAnotherSKU()">Add another Size
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

@endsection
