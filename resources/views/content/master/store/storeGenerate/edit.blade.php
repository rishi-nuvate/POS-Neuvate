@php use App\Models\Company; @endphp
@extends('layouts/layoutMaster')

@section('title', 'User View - Pages')

@section('vendor-style')
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}"/>
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-user-view.css')}}"/>
@endsection

@section('vendor-script')
    <script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/bloodhound/bloodhound.js')}}"></script>
@endsection

@section('page-script')
    <script src="{{asset('assets/js/modal-edit-user.js')}}"></script>
    <script src="{{asset('assets/js/app-user-view.js')}}"></script>
    <script src="{{asset('assets/js/app-user-view-account.js')}}"></script>
    <script src="{{asset('assets/js/forms-selects.js')}}"></script>
    <script src="{{asset('assets/js/forms-typeahead.js')}}"></script>
@endsection

@section('content')
    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/master') }}">Master</a>
            </li>
            <li class="breadcrumb-item active">Store Generate</li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
    <div class="row">
        <!-- User Sidebar -->
        <div class="col-xl-12 col-lg-12 col-md-12 order-1 order-md-0">
            <!-- User Card -->
            <div class="card mb-4">
                <div class="card-body">

                    <div class="content-header mb-4">
                        <h3 class="mb-1">Store Information</h3>
                    </div>

                    <div class="row g-3">

                        {{-- {!! textInputField('div.class', 'label', 'inputType', 'name', 'id', 'placeholder', '*','inputClass', 'defaultValue', 'required','readonly') !!} --}}

                        {!! textInputField('col-md-6', 'Store Name', 'text', 'store_name', 'store_name', 'Store Name', '*', 'form-control',$storeGenerate->store_name ,'required','') !!}

                        {!! textInputField('col-md-6', 'Store Type', 'text', 'store_type', 'store_type', 'Store Type', '', 'form-control', $storeGenerate->storeType->store_type  ,'','') !!}

                        {!! textInputField('col-md-6', ' Store Code', 'text', 'store_code', 'store_code', 'Store Code', '', 'form-control', $storeGenerate->store_code,'','') !!}
                        {!! textInputField('col-md-6', 'Store Rating', 'text', 'store_rating', 'store_rating', 'Store Rating', '', 'form-control', $storeGenerate->store_rating,'','') !!}

                    </div>

                    <div class="content-header mt-4 mb-4">
                        <h3 class="mb-1">Store Address</h3>
                    </div>


                    <div class="row g-3">

                        {!! textInputField('col-md-6', 'Address', 'text', 'store_address', 'store_address', 'Address', '*', 'form-control',$storeGenerate->store_address,'required','') !!}

                        {!! textInputField('col-md-6', 'Store Area', 'text', 'store_area', 'store_area', 'Area', '*', 'form-control',$storeGenerate->store_area,'required','') !!}

                        {!! textInputField('col-md-3', 'City', 'text', 'store_city', 'store_city', 'City', '*', 'form-control',$storeGenerate->store_city,'required','') !!}

                        {!! textInputField('col-md-3', 'Pincode', 'text', 'store_pincode', 'store_pincode', 'Billing Name', '*', 'form-control',$storeGenerate->store_pincode,'required','') !!}


                        <div class="col-sm-3">
                            <label class="form-label" for="b_state">State</label>

                            <select required id="State" name="State" class="select2 form-select"
                                    data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="Andra Pradesh">Andra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Madya Pradesh">Madya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Orissa">Orissa</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttaranchal">Uttaranchal</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="West Bengal">West Bengal</option>
                                <option disabled style="background-color:#aaa; color:#fff">UNION Territories
                                </option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                <option value="Daman and Diu">Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Lakshadeep">Lakshadeep</option>
                                <option value="Pondicherry">Pondicherry</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /User Card -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h5 class="card-action-title mb-0">Bank Details</h5>
                    </div>
                    <ul class="ps-3 g-2 my-3">
                        <li class="mb-2">Manager Name : {{ $storeGenerate->manager_name }}</li>
                        <li class="mb-2">Manager Number : {{ $storeGenerate->manager_number }}</li>
                        <li class="mb-2">Manager Email : {{ $storeGenerate->manager_email }}</li>
                    </ul>
                    <div class="d-flex justify-content-center">
                        <a href="javascript:" class="btn btn-primary me-3" data-bs-target="#editUser"
                           data-bs-toggle="modal" onclick="viewModelUserEdit({{ $storeGenerate->id }});">Edit</a>
                    </div>
                </div>
            </div>

        </div>
        <!--/ User Sidebar -->


        <!-- User Content -->
        {{--        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">--}}

        {{--            <!-- Billing Address -->--}}
        {{--            <div class="card caendforeachrd-action mb-4">--}}
        {{--                <div class="card-header align-items-center">--}}
        {{--                    <h5 class="card-action-title mb-0">Billing Address</h5>--}}
        {{--                    <div class="card-action-element">--}}
        {{--                        <a href="javascript:" class="btn btn-sm btn-primary me-3" data-bs-target="#editUser"--}}
        {{--                           data-bs-toggle="modal" onclick="viewModelUserEdit({{ $user->id }});">Edit</a>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                --}}
        {{--                <div class="card-body">--}}
        {{--                    <div class="row">--}}
        {{--                        <div class="col-xl-7 col-12">--}}
        {{--                            <dl class="row mb-0">--}}
        {{--                                <dt class="col-sm-4 mb-2 fw-medium text-nowrap">Company Name:</dt>--}}
        {{--                                <dd class="col-sm-8">{{ $user->company_name }}</dd>--}}

        {{--                                <dt class="col-sm-4 mb-2 fw-medium text-nowrap">Billing Email:</dt>--}}
        {{--                                <dd class="col-sm-8">{{  $user->email }}</dd>--}}

        {{--                                <dt class="col-sm-4 mb-2 fw-medium text-nowrap">Billing Address:</dt>--}}
        {{--                                <dd class="col-sm-8">{{ $userAddress->b_address1 ?? '' }}--}}
        {{--                                    <br>{{ $userAddress->b_address2 ?? '' }}</dd>--}}
        {{--                            </dl>--}}
        {{--                        </div>--}}
        {{--                        <div class="col-xl-5 col-12">--}}
        {{--                            <dl class="row mb-0">--}}
        {{--                                <dt class="col-sm-4 mb-2 fw-medium text-nowrap">Contact:</dt>--}}
        {{--                                <dd class="col-sm-8">{{  $user->person_mobile ?? '' }}</dd>--}}

        {{--                                <dt class="col-sm-4 mb-2 fw-medium text-nowrap">City:</dt>--}}
        {{--                                <dd class="col-sm-8">{{ $userAddress->b_city ?? '' }}</dd>--}}

        {{--                                <dt class="col-sm-4 mb-2 fw-medium text-nowrap">State:</dt>--}}
        {{--                                <dd class="col-sm-8">{{ $userAddress->b_state ?? ''}}</dd>--}}

        {{--                                <dt class="col-sm-4 mb-2 fw-medium text-nowrap">Pincode:</dt>--}}
        {{--                                <dd class="col-sm-8">{{ $userAddress->b_pincode ?? '' }}</dd>--}}
        {{--                            </dl>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                --}}
        {{--            </div>--}}
        {{--        </div>--}}
        <!--/ User Content -->
    </div>

    <!-- Modal -->
    @include('_partials/_modals/modal-edit-user')
    @include('_partials/_modals/modal-upgrade-plan')
    @include('_partials/_modals/modal-add-new-address')
    <!-- /Modal -->
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

<script>
    // Function to add a new shipping address
    // function addShippingAddress() {
    //     // Clone the shipping address card
    //     var newAddress = $('.card.card-action').first().clone();
    //
    //     // Clear input values if needed
    //     newAddress.find('input[type="text"]').val('');
    //     newAddress.find('input[type="number"]').val('');
    //
    //     // Enable remove button of all cards
    //     $('.card-action-element button').prop('disabled', false);
    //
    //     // Append the cloned shipping address card to the container
    //     $('#shipping-address-container').append(newAddress);
    // }
    //
    // // Function to remove a shipping address
    // function removeShippingAddress(button) {
    //     // Check if there's more than one shipping address card
    //     if ($('.card.card-action').length > 1) {
    //         // Find the parent card and remove it
    //         $(button).closest('.card.card-action').remove();
    //     }
    // }


</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

<script>
    function viewModelUserEdit(id) {
        $.ajax({
            type: 'POST',
            url: "{{ route('viewModelUserEdit') }}",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {id: id, status: status, "_token": "{{ csrf_token() }}"},
            success: function (data) {
                $('.modal-body').html(data);
            },
            error: function (data) {
                alert(data);
            }
        });
    }
</script>
