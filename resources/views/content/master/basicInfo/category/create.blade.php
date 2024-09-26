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


    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/master') }}">Master</a>
            </li>
            <li class="breadcrumb-item active">Category</li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </nav>

<div class="card">
    <div class="card-body">
        <div class="content">


            <div class="content-header mb-4">
                <h3 class="mb-1">Category Information</h3>
            </div>
            <form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    {{-- {{!! textInputField('div.class', 'label', 'inputType', 'name', 'id', 'placeholder', 'star','inputClass', 'defaultValue', 'required','readonly')}} --}}

                    {!! textInputField('col-md-6', 'Category Name', 'text', 'CategoryName', 'categoryName', 'Category Name', '*', '',old('CategoryName') ,'required','') !!}

                </div>
                <br>

                <div class="divider">
                    <div class="divider-text">Sub Category</div>
                </div>

                <div class="row" id="dynamicFormContainer">
                    {!! textInputField('col-md-6', 'SubCategory Name', 'text', 'SubCatName[]', 'SubCatName_0', 'Sub Category Name', '*', '','' ,'required','') !!}
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
              <label class="form-label" for="SubCatName_${counter}">Subcategory Name</label>
              <input required type="text" id="SubCatName_${counter}" name="SubCatName[]" value="" class="form-control" placeholder="Sub Category Name" autofocus/>
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
