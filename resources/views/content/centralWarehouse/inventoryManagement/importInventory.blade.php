@extends('layouts/layoutMaster')

@section('title', 'Create-Shelf ')


@section('content')
    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{url('/centralWarehouseMaster')}}">Central Warehouse</a>
            </li>
            <li class="breadcrumb-item active">Import Inventory</li>
        </ol>
    </nav>
    <!-- Invoice List Widget -->


    <div class="card">
        <div class="text-white rounded-top bg-primary p-2">
            Create Shelf
        </div>
        <div class="card-body">
            <div class="content">
                <form method="post" action="{{route('importInventoryStore')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-4">
                        <div class="col-md-6 ">
                            <label class="form-label" for="Document">Select Method</label><br>
                            <input type="radio" value="import_inventory" name="Document" id="Document" class=""
                                   onchange="productData(this)" checked/>
                            Import Inventory
                            <input type="radio" value="replace_inventory" name="Document" id="Document" class="mx-2"
                                   onchange="productData(this)"/> Replace Inventory
                        </div>
                    </div>


                    <div id="import_inventory">
                        <div class="row">
                            {{-- Example --}}
                            {{-- {{!! textInputField('div.class', 'label', 'inputType', 'name', 'id', 'placeholder', 'star', 'defaultValue', 'required','readonly')}} --}}

                            {!! textInputField('col-md-3 ', 'Import Inventory', 'File', 'inventory', 'inventory', 'Import Inventory','',old('inventory'), '','') !!}

                            <div class="col-md-3 ">
                                <div class="align-item-center">
                                    <label> Import Inventory</label>
                                    <a type="button" href="{{ \URL::to('samples/Inventory_sample.csv') }}"
                                       class="m-2 btn btn-md btn-outline-primary round waves-effect"><i
                                            class="fa-solid fa-file-arrow-down mx-2"></i> Download Sample csv
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div id="replace_inventory" style="display: none">
                        <div class="row">
                            {{-- Example --}}
                            {{-- {{!! textInputField('div.class', 'label', 'inputType', 'name', 'id', 'placeholder', 'star', 'defaultValue', 'required','readonly')}} --}}

                            {!! textInputField('col-md-3 ', 'Replace Inventory', 'File', 'replace_inventory', 'replace_inventory', 'Replace Inventory','',old('replace_inventory'), '','') !!}

                            <div class="col-md-3 ">
                                <div class="align-item-center">
                                    <label> Replacing Inventory</label>
                                    <a type="button" href="{{ \URL::to('samples/Inventory_sample.csv') }}"
                                       class="m-2 btn btn-md btn-outline-primary round waves-effect"><i
                                            class="fa-solid fa-file-arrow-down mx-2"></i> Download Sample csv
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="px-0 mt-3">
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

    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>

    <script>
        function productData(element) {

            if (element.value == 'import_inventory') {

                $('#import_inventory').css('display', 'block');
                $('#replace_inventory').css('display', 'none');

            } else {
                $('#import_inventory').css('display', 'none');
                $('#replace_inventory').css('display', 'block');

                $.ajax({
                    type: 'POST',
                    url: '{{ route('productData') }}',
                    data: {
                        '_token': "{{ csrf_token() }}",
                    },
                    dataType: 'json',
                    success: function (response) {

                        $('#products').empty();
                        $.each(response, function (key, value) {
                            $('#products').append('<option value="' + value.id + '">' + value
                                .product_name + '</option>');
                        });
                    }
                });

            }


        }
    </script>
@endsection
