@extends('layouts/layoutMaster')

@section('title', 'Create-GRN')

@section('content')
    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{url('/centralWarehouseMaster')}}">Central Warehouse</a>
            </li>
            <li class="breadcrumb-item active">Q.C.</li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
    <!-- Invoice List Widget -->


    <div class="card">
        <div class="card-body">
            <div class="content">


                <div class="content-header mb-4">
                    <h3 class="mb-1">Quality Check</h3>
                </div>
                <form method="post" action="{{route('qc.store')}}" enctype="multipart/form-data">
                    @csrf
                    {{--                    <div class="form-check form-check-primary mt-3 mb-3">--}}
                    {{--                        <input class="form-check-input" type="checkbox" name="WithOutPO"--}}
                    {{--                               onchange="toggleTableVisibility()" value="1" id="WithOutPO">--}}
                    {{--                        <input type="hidden" name="WithPOSelect" id="WithPOSelect" value="1">--}}
                    {{--                        <label class="form-check-label" for="customCheckPrimary">Without PO</label>--}}
                    {{--                    </div>--}}

                    <div class="row">

                        {{-- Example --}}
                        {{-- {{!! textInputField('div.class', 'label', 'inputType', 'name', 'id', 'placeholder', 'star','input Class', 'defaultValue', 'required','readonly)}} --}}

                        @php $date =  date('d-m-Y'); @endphp
                        {{--{{dd($date)}}--}}
                        {!! textInputField('col-md-3 mt-3', 'Date', 'date', 'date', 'date', '', '', '', now()->toDateString(),'','') !!}


                        <div class="col-md-3 mt-3" id="withPo">
                            <label class="form-label" for="grn_id">GRN Number</label>
                            <select required id="grn_id" name="grn_id"
                                    class="select2 select21 form-select" data-allow-clear="true"
                                    data-placeholder="Select Company" onchange="getGrn()">
                                <option value="">Select</option>
                                @foreach($allGrn as $grn)
                                    <option value="{{$grn->id}}">{{$grn->grn_num}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{--With PO--}}
                    <div class="mt-3">
                        <div class="form-group col-sm-12 mt-3">
                            <table id="option-value"
                                   class="responsive table table-bordered ">
                                <thead>
                                <tr>
                                    <td scope="row">Sr.No</td>
                                    <td scope="row">Item Name</td>
                                    <td scope="row">Item Sku</td>
                                    <td scope="row">Received Qty</td>
                                    <td scope="row">Remarks</td>
                                    <td scope="row">Action</td>
                                    {{-- <td scope="row">Add</td> --}}
                                </tr>
                                </thead>
                                <tbody id="grnBody">

                                </tbody>
                            </table>
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

        var counter = 0;

        function getGrn() {

            counter++;

            const grnId = document.getElementById('grn_id').value;
            $.ajax({
                type: 'POST',
                url: '{{ route('getGrn') }}',
                data: {
                    'grnId': grnId,
                    '_token': "{{ csrf_token() }}",
                },
                dataType: 'json',
                success: function (response) {

                    $('#grnBody').empty();
                    if (response.po_id == null) {
                        $.each(response.grn_item, function (key, grn) {
                            $('#grnBody').append(`
                                    <tr>
                                        <td>${counter}</td>
                                        <td id="item_name${counter}"><button type="button" class="m-2 btn btn-sm btn-outline-primary round waves-effect">${grn.sku.product.product_name}</button> </td>
                                        <td id="item_sku${counter}"><button type="button" class="m-2 btn btn-sm btn-outline-primary round waves-effect">${grn.sku.sku}</button> </td>
                                        <td id="po_quantity${counter}"><button type="button" class="m-2 btn btn-sm btn-outline-primary round waves-effect">${grn.received_quantity}</button> </td>

                                        <td><input type="text" id="received_quantity" name="received_quantity[]"
                                                                   class="form-control  " placeholder="Remarks"/>
                                        <td>
                                        <a href="#" type="button" class="btn btn-outline-success waves-effect">
                                            Pass
                                        </a>
                                        <a href="#" type="button" class="btn btn-outline-danger waves-effect mx-2">
                                            Fail
                                        </a>
                                        </td>
                                    </tr>
                            `)
                            counter++;
                        });
                    }

                }
            });

        }

        function getAllPOItem() {
            const poId = document.getElementById('po_id').value;

            $.ajax({
                type: 'POST',
                url: '{{ route('getAllPOItem') }}',
                data: {
                    'poId': poId,
                    '_token': "{{ csrf_token() }}",
                },
                dataType: 'json',
                success: function (response) {

                    $('#withPoBody').empty();
                    $.each(response, function (key, po) {
                        $.each(po.purchase_order_item_parameter, function (id, sku) {
                            $('#withPoBody').append(`
                                <tr>
                                    <td>${counter}</td>
                                    <td id="item_name${counter}"><button type="button" class="m-2 btn btn-sm btn-outline-primary round waves-effect">${po.product.product_name}</button> </td>
                                    <td id="item_sku${counter}"><button type="button" class="m-2 btn btn-sm btn-outline-primary round waves-effect">${sku.item_sku}</button> </td>
                                    <td id="po_quantity${counter}"><button type="button" class="m-2 btn btn-sm btn-outline-primary round waves-effect">${sku.item_qty}</button> </td>
                                    <td><input type="number" id="received_quantity" name="received_quantity[${sku.id}]"
                                                               class="form-control  " placeholder="5"/>
                                    </td>
                                </tr>
                        `)
                        });
                    });
                }
            });
        }

        function addItem() {
            counter++;

            var innerHTML = `
            <tr id="item_${counter}">
                <td>${counter}</td>
                <td><select required id="item_id_${counter}" name="item_id[]"
                                    class="select2 form-select" data-allow-clear="true"
                                    data-placeholder="Select Company" onchange="getProduct(${counter})">
                                <option value="">Select</option>
                                ${productOptions}
                </select></td>
                <td><select required id="item_sku_${counter}" name="item_sku[]"
                                    class="select2 form-select" data-allow-clear="true"
                                    data-placeholder="Select Sku">
                                <option value="">Select</option>

                </select></td>
                <td id="item_code_${counter}"></td>
                <td><input type="number" id="product_quantity_${counter}" name="ptoduct_quantity[]"
                                           class="form-control" placeholder="5" onchange="total(${counter})"
                                          /></td>
                <td id="rate_${counter}"></td>
                <td><input type="number" readonly id="total_rate_${counter}" name="total_rate[]"
                                           class="form-control  " placeholder="5"
                                           /></td>
                <td><button type="button" onclick="removeItem(${counter})"
                    class="btn rounded-pill btn-icon btn-label-danger waves-effect">
                    <span class="ti ti-trash"></span></button></td>
            </tr>
          `;
            $('#withoutPoBody').append(innerHTML);
            $('.select2').select2();

        }

        function removeItem(count) {
            var elementToRemove = document.getElementById("item_" + count);
            elementToRemove.remove();
            counter--;
        }

        function getProduct(id) {
            const productId = document.getElementById('item_id_' + id).value;

            // console.log(productId);
            $.ajax({
                type: 'POST',
                url: '{{ route('getProductGrn') }}',
                data: {
                    'productId': productId,
                    '_token': "{{ csrf_token() }}",
                },
                dataType: 'json',
                success: function (response) {
                    $('#item_code_' + id).empty().append(`<button type="button" class="m-2 btn btn-sm btn-outline-primary round waves-effect">${response.product.product_code}</button> `);
                    $('#rate_' + id).empty().append(`<button type="button" class="m-2 btn btn-sm btn-outline-primary round waves-effect">${response.product.cost_price}</button> <input type="hidden" name="item_rate[]" id="item_rate_${id}" value="${response.product.cost_price}">`);

                    $('#item_sku_' + id).empty().append(' <option value=""> select </option>');
                    $.each(response.productSku, function (key, value) {
                        $('#item_sku_' + id).append(' <option value="' + value.id + '"> ' + value.sku + '</option>');
                    });
                }
            });
        }

        function total(id) {
            console.log(id);
            var quantity = document.getElementById('product_quantity_' + id).value;
            var rate = document.getElementById('item_rate_' + id).value;
            document.getElementById('total_rate_' + id).value = quantity * rate;
        }

    </script>
@endsection
