@extends('layouts/layoutMaster')

@section('title', 'Add-Product')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/toastr/toastr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/typography.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/katex.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/editor.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.css') }}" />

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

<h4 class="py-3 mb-4">
    <span class="text-muted fw-light float-left">Category /</span> Add
</h4>
<!-- Invoice List Widget -->


<div class="card">
    {{-- <h5 class="card-header">Applicable Categories</h5> --}}
    <div class="card-body">
        <div class="content">


            <div class="content-header mb-4">
                <h3 class="mb-1">Category Information</h3>
            </div>
            <form method="post" action="" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-md-6">
                        <div class="col-md-12">
                            <label class="form-label" for="categoryName">Category Name</label>
                            <input type="text" id="categoryName" name="categoryName"
                                class="form-control" value="{{ old('categoryName') }}" placeholder="Category Name" />
                        </div>
                    </div>

                </div>
                <br>

                <div class="divider">
                    <div class="divider-text">Sub Category</div>
                </div>

                <div class="row" id="dynamicFormContainer">

                    <div class="col-md-6 mt-2">
                        <div class="col-md-10">
                            <label class="form-label" for="SubCategoryName_0">Subcategory Name</label>
                            <input type="text" id="SubCategoryName_0" name="SubCategoryName[0]" value=""
                                class="form-control" placeholder="Sub Category Name" />
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-12 invoice-actions mt-3">
                    <button type="button" class="btn btn-outline-primary" onclick="addItem()">Add another</button>
                </div>

                <div class="row px-0 mt-5">
                    <div class="col-lg-2 col-md-12 col-sm-12">
                        <button type="submit" class="btn btn-primary d-grid w-100">Save</button>
                    </div>
                </div>


            </form>

        </div>
    </div>
</div>

<script>
    var counter = 0;

    function addItem() {
        counter++;
        // Create a new div element with the specified HTML code
        var newDiv = document.createElement("div");
        newDiv.className = "col-md-6";
        newDiv.id = "item_" + counter;
        newDiv.innerHTML = `
        <div class="row">
          <div class="col-md-10 mt-2">
              <label class="form-label" for="SubCategoryName_` + counter + `">Subcategory Name</label>
              <input required type="text" id="SubCategoryName_` + counter + `" name="SubCategoryName[` + counter + `]" value="" class="form-control" placeholder="Sub Category Name" autofocus/>
          </div>
          <div class="col-md-2 mt-3">
            <div class="demo-inline-spacing">
                <button type="button" onclick="removeItem(` + counter + `)"
                    class="btn rounded-pill btn-icon btn-label-danger waves-effect">
                    <span class="ti ti-trash"></span></button>
            </div>
          </div>
        </div>
      `;

        // Append the new div to the container
        document.getElementById("dynamicFormContainer").appendChild(newDiv);

        // Set focus to the input field
        newDiv.querySelector("input").focus();

    }

    function removeItem(counter) {
        var elementToRemove = document.getElementById("item_" + counter);
        elementToRemove.remove();
    }
</script>


@endsection