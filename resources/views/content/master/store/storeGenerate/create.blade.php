@extends('layouts/layoutMaster')

@section('title', 'Multi Steps Sign-up - Pages')

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

<style>
    #overlay {
        position: fixed;
        top: 0;
        z-index: 100;
        width: 100%;
        height: 100%;
        display: none;
        background: rgba(0, 0, 0, 0.6);
    }

    .cv-spinner {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .spinner {
        width: 40px;
        height: 40px;
        border: 4px #ddd solid;
        border-top: 4px #2e93e6 solid;
        border-radius: 50%;
        animation: sp-anime 0.8s infinite linear;
    }

    @keyframes sp-anime {
        100% {
            transform: rotate(360deg);
        }
    }

    .is-hide {
        display: none;
    }
</style>


@section('vendor-script')
    <script src="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
@endsection


<div id="overlay">
    <div class="cv-spinner">
        <span class="spinner"></span>
    </div>
</div>
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Default -->
        <div class="row">

            <div class="col-12 mb-4">
                <div id="wizard-validation" class="bs-stepper mt-2">
                    <div class="bs-stepper-header">
                        <div class="step" data-target="#account-details-validation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle">1</span>
                                <span class="bs-stepper-label mt-1">
                            <span class="bs-stepper-title">Statutory info</span>
                          </span>
                            </button>
                        </div>

                        <div class="line">
                            <i class="ti ti-chevron-right"></i>
                        </div>
                        <div class="step" data-target="#commertial-info-validation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle">2</span>
                                <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Commercials</span>
                          </span>
                            </button>
                        </div>
                        <div class="line">
                            <i class="ti ti-chevron-right"></i>
                        </div>

                        <div class="step" data-target="#personal-info-validation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle">2</span>
                                <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Manager Info</span>
                          </span>
                            </button>
                        </div>
                        <div class="line">
                            <i class="ti ti-chevron-right"></i>
                        </div>

                        <div class="step" data-target="#social-links-validation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle">3</span>
                                <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Payment Details</span>
                          </span>
                            </button>
                        </div>

                    </div>
                    <div class="bs-stepper-content">
                        <form id="wizard-validation-form" onSubmit="return false">
                            @csrf
                            <!-- Account Details -->
                            <div id="account-details-validation" class="content">

                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="store_type">Store Type </label>
                                        {{--                                        <input type="text" name="store_type" id="store_type"--}}
                                        {{--                                               class="form-control"--}}
                                        {{--                                               placeholder="enter company name"/>--}}

                                        <select id="store_type" name="store_type" class="select2 form-select"
                                                data-allow-clear="true">
                                            <option value=""> Select</option>
                                            @foreach($storeTypes as $storeType)
                                                <option value="{{$storeType->id}}"> {{$storeType->store_type}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="op_date">Op. Date</label>
                                        <input type="date" name="op_date" id="op_date"
                                               class="form-control"
                                               placeholder="enter Store Rating"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="store_name">Store Name</label>
                                        <input type="text" name="store_name" id="store_name"
                                               class="form-control"
                                               placeholder="enter Store name"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="store_code">Store Code</label>
                                        <input type="text" name="store_code" id="store_code"
                                               class="form-control"
                                               placeholder="enter Store code"/>
                                    </div>


                                    <div class="col-sm-6">
                                        <label class="form-label" for="store_status">store status</label>
                                        <input type="text" name="store_status" id="store_status"
                                               class="form-control"
                                               placeholder="enter Store Rating"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="format_name">Format</label>
                                        <input type="text" name="format_name" id="format_name"
                                               class="form-control"
                                               placeholder="enter Store Rating"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="firm">Firm</label>
                                        <input type="text" name="firm" id="firm"
                                               class="form-control"
                                               placeholder="enter firm"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="gst">GST No.</label>
                                        <input type="text" name="gst" id="gst"
                                               class="form-control"
                                               placeholder="enter firm"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="store_phone">Store Phone</label>
                                        <input type="text" name="store_phone" id="store_phone"
                                               class="form-control"
                                               placeholder="enter Store Rating"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="store_email">Store Email</label>
                                        <input type="text" name="store_email" id="store_email"
                                               class="form-control"
                                               placeholder="enter Store Rating"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="store_add_line_1">Address Line 1</label>
                                        <input type="text" name="store_add_line_1" id="store_add_line_1"
                                               class="form-control"
                                               placeholder="enter Address Line 1"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="store_add_line_2">Address Line 2 </label>
                                        <input type="text" name="store_add_line_2" id="store_add_line_2"
                                               class="form-control"
                                               placeholder="enter address line 2"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="store_area">Zone </label>
                                        <input type="text" name="store_area" id="store_area"
                                               class="form-control"
                                               placeholder="enter Area"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="store_city">City </label>
                                        <input type="text" name="store_city" id="store_city"
                                               class="form-control"
                                               placeholder="enter City"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="store_state">State </label>
                                        <select id="store_state" name="store_state" class="select2 form-select"
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
                                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands
                                            </option>
                                            <option value="Chandigarh">Chandigarh</option>
                                            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                            <option value="Daman and Diu">Daman and Diu</option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="Lakshadeep">Lakshadeep</option>
                                            <option value="Pondicherry">Pondicherry</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="store_pincode">PinCode </label>
                                        <input type="text" name="store_pincode" id="store_pincode"
                                               class="form-control"
                                               placeholder="enter PinCode"/>
                                    </div>


                                    <div class="col-sm-6">
                                        <label class="form-label" for="map_link">GMap Link</label>
                                        <input type="text" name="map_link" id="map_link"
                                               class="form-control"
                                               placeholder="enter Area"/>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="franchise_name">Franchise Name</label>
                                        <input type="text" name="franchise_name" id="franchise_name"
                                               class="form-control"
                                               placeholder="enter Store Rating"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="franchise_phone">Franchise Phone</label>
                                        <input type="text" name="franchise_phone" id="franchise_phone"
                                               class="form-control"
                                               placeholder="enter Store Rating"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="franchise_email">Franchise Email</label>
                                        <input type="email" name="franchise_email" id="franchise_email"
                                               class="form-control"
                                               placeholder="enter Store Rating"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="datanote_name">Datanote name</label>
                                        <input type="text" name="datanote_name" id="datanote_name"
                                               class="form-control"
                                               placeholder="enter Store Rating"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="seller_ware_1seller_ware_1">Sellerware1 name</label>
                                        <input type="text" name="seller_ware_1" id="seller_ware_1"
                                               class="form-control"
                                               placeholder="enter Store Rating"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="seller_ware_2">Sellerware2 name</label>
                                        <input type="text" name="seller_ware_2" id="seller_ware_2"
                                               class="form-control"
                                               placeholder="enter Store Rating"/>
                                    </div>


                                    <div class="col-12 d-flex justify-content-between">
                                        <button class="btn btn-label-secondary btn-prev" disabled>
                                            <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </button>
                                        <button class="btn btn-primary btn-next">
                                            <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                            <i class="ti ti-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div id="commertial-info-validation" class="content">
                                <div class="content-header mb-3">
                                    <h6 class="mb-0">Personal Info</h6>
                                    <small>Enter Your Personal Info.</small>
                                </div>
                                <div class="row g-3">

                                    <div class="col-sm-6">
                                        <label class="form-label" for="sba_sqft">SBA Sqft</label>
                                        <input
                                            type="text"
                                            id="sba_sqft"
                                            name="sba_sqft"
                                            class="form-control"
                                            placeholder="Square Feet"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="ca_sqft">CA Sqft</label>
                                        <input
                                            type="text"
                                            id="ca_sqft"
                                            name="ca_sqft"
                                            class="form-control"
                                            placeholder="Square Feet"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="store_rating">Store Rating </label>

                                        <select id="store_rating" name="store_rating" class="select2 form-select"
                                                data-allow-clear="true">
                                            <option value=""> Select</option>
                                            <option value="platinum"> P</option>
                                            <option value="a++"> A++</option>
                                            <option value="a+"> A+</option>
                                            <option value="a"> A</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="commercial_model">Commercial model</label>
                                        <input
                                            type="text"
                                            id="commercial_model"
                                            name="commercial_model"
                                            class="form-control"
                                            placeholder="Square Feet"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="margin">Margin</label>
                                        <input
                                            type="text"
                                            id="margin"
                                            name="margin"
                                            class="form-control"
                                            placeholder="Square Feet"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="add_support">Additional support</label>
                                        <input
                                            type="text"
                                            id="add_support"
                                            name="add_support"
                                            class="form-control"
                                            placeholder="Square Feet"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="security_deposit">Security Deposit</label>
                                        <input
                                            type="text"
                                            id="security_deposit"
                                            name="security_deposit"
                                            class="form-control"
                                            placeholder="Square Feet"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="capex">Capex</label>
                                        <input
                                            type="text"
                                            id="capex"
                                            name="capex"
                                            class="form-control"
                                            placeholder="Square Feet"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="rent">Rent</label>
                                        <input
                                            type="text"
                                            id="rent"
                                            name="rent"
                                            class="form-control"
                                            placeholder="Square Feet"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="bep">BEP</label>
                                        <input
                                            type="text"
                                            id="bep"
                                            name="bep"
                                            class="form-control"
                                            placeholder="Square Feet"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="mf">MF</label>
                                        <input
                                            type="text"
                                            id="mf"
                                            name="mf"
                                            class="form-control"
                                            placeholder="Square Feet"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="mf_percent">MF %</label>
                                        <input
                                            type="text"
                                            id="mf_percent"
                                            name="mf_percent"
                                            class="form-control"
                                            placeholder="Square Feet"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="asm">ASM</label>
                                        <input
                                            type="text"
                                            id="asm"
                                            name="asm"
                                            class="form-control"
                                            placeholder="Square Feet"/>
                                    </div>

                                    <div class="col-12 d-flex justify-content-between">
                                        <button class="btn btn-label-secondary btn-prev">
                                            <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </button>
                                        <button class="btn btn-primary btn-next">
                                            <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                            <i class="ti ti-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Social Links -->

                            <!-- Personal Info -->
                            <div id="personal-info-validation" class="content">
                                <div class="content-header mb-3">
                                    <h6 class="mb-0">Personal Info</h6>
                                    <small>Enter Your Personal Info.</small>
                                </div>
                                <div class="row g-3">

                                    <div class="col-sm-6">
                                        <label class="form-label" for="store_manager">Store Manager</label>
                                        <input
                                            type="text"
                                            id="store_manager"
                                            name="store_manager"
                                            class="form-control"
                                            placeholder="Square Feet"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="store_manager_phone">Store Manager Phone number</label>
                                        <input
                                            type="text"
                                            id="store_manager_phone"
                                            name="store_manager_phone"
                                            class="form-control"
                                            placeholder="Square Feet"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="store_manager_email">Store Manager Email</label>
                                        <input
                                            type="text"
                                            id="store_manager_email"
                                            name="store_manager_email"
                                            class="form-control"
                                            placeholder="Square Feet"/>
                                    </div>

{{--                                    @php $num = 1 @endphp--}}
{{--                                    @foreach($categories as $category)--}}

{{--                                        <div class="col-md-4">--}}
{{--                                            <label class="form-label" for="franchise">Category</label>--}}
{{--                                            <input--}}
{{--                                                type="hidden"--}}
{{--                                                id="category_id[{{$num}}]"--}}
{{--                                                name="category_id[{{$num}}]"--}}
{{--                                                class="form-control" value="{{$category->id}}"/>--}}
{{--                                            <input--}}
{{--                                                type="text"--}}
{{--                                                id="category[{{$num}}]"--}}
{{--                                                name="category[{{$num}}]"--}}
{{--                                                class="form-control"--}}
{{--                                                placeholder="Square Feet" value="{{$category->name}}" readonly/>--}}
{{--                                        </div>--}}

{{--                                        <div class="col-md-4">--}}
{{--                                            <label class="form-label" for="square_fit">Square Feet</label>--}}
{{--                                            <input--}}
{{--                                                type="text"--}}
{{--                                                id="category_qty[{{$num}}]"--}}
{{--                                                name="category_qty[{{$num}}]"--}}
{{--                                                class="form-control"--}}
{{--                                                placeholder="Square Feet"/>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-4">--}}
{{--                                            <div class="input-group-append">--}}
{{--                                                <button class="btn btn-primary waves-effect"--}}
{{--                                                        data-bs-toggle="modal" data-bs-target="#addQty0" type="button"--}}
{{--                                                        onclick="getSubCategory({{$num}})">--}}
{{--                                                    <i class="fa fa-plus"></i> Add Sku Wise--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        @php $num++ @endphp--}}
{{--                                    @endforeach--}}


                                    <div class="col-12 d-flex justify-content-between">
                                        <button class="btn btn-label-secondary btn-prev">
                                            <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </button>
                                        <button class="btn btn-primary btn-next">
                                            <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                            <i class="ti ti-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Social Links -->

                            <div id="social-links-validation" class="content">
                                <div class="content-header mb-3">
                                    <h6 class="mb-0">Payment Type</h6>
                                </div>
                                <div class="row g-3">

                                    <div class="col-sm-6">
                                        <label class="form-label"
                                               for="loi">LOI</label>
                                        <input
                                            type="file"
                                            name="loi"
                                            id="loi"
                                            class="form-control"
                                            placeholder=""/>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label"
                                               for="agreement">Agreement</label>
                                        <input
                                            type="file"
                                            name="agreement"
                                            id="agreement"
                                            class="form-control"
                                            placeholder=""/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label"
                                               for="architecture_draw">Architecture drawing</label>
                                        <input
                                            type="file"
                                            name="architecture_draw"
                                            id="architecture_draw"
                                            class="form-control"
                                            placeholder=""/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label"
                                               for="photo">Photographs</label>
                                        <input
                                            type="file"
                                            name="photo"
                                            id="photo"
                                            class="form-control"
                                            placeholder=""/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label"
                                               for="aadhar_file">Aadhar</label>
                                        <input
                                            type="file"
                                            name="aadhar_file"
                                            id="aadhar_file"
                                            class="form-control"
                                            placeholder=""/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label"
                                               for="pan_file">Pan</label>
                                        <input
                                            type="file"
                                            name="pan_file"
                                            id="pan_file"
                                            class="form-control"
                                            placeholder=""/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label"
                                               for="gst_file">GST</label>
                                        <input
                                            type="file"
                                            name="gst_file"
                                            id="gst_file"
                                            class="form-control"
                                            placeholder=""/>
                                    </div>

                                    <div class="col-12 d-flex justify-content-between">
                                        <button class="btn btn-label-secondary btn-prev">
                                            <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </button>
                                        <button type="submit" class="btn btn-success btn-next btn-submit">Submit
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade ValidateModelForTotalQty" id="addQty0" tabindex="-1"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-simple modal-edit-user modal-dialog-scrollable">

                                    <div class="modal-content p-1 p-md-0" style="min-height: 60vh;">
                                        <div class="modal-header text-white rounded-top bg-primary p-2">
                                            Parameter Information
                                        </div>
                                        <div class="modal-body">
                                            <div class="row g-3">
                                                <div class="form-text">
                                                    <b>Note</b> : All Quantity should be in comma separated
                                                </div>
                                                <div id="subCategory">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 m-4">
                                            <button type="button" class="btn btn-label-success ml-3"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                Done
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- /Validation Wizard -->

        </div>
        <hr class="container-m-nx mb-5"/>
        {{--        <div class="row g-3">--}}

        {{--        </div>--}}


    </div>

@endsection


@section('page-script')

    <script src="{{asset('assets/js/form-wizard-validation.js')}}"></script>

{{--    <script>--}}

{{--        function getSubCategory(id) {--}}
{{--            var categoryId = document.getElementById(`category_id[${id}]`).value;--}}
{{--            if (categoryId) {--}}
{{--                $.ajax({--}}
{{--                    type: 'POST',--}}
{{--                    url: "{{ route('getSubCategories') }}",--}}
{{--                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},--}}
{{--                    data: {categoryId: categoryId, '_token': "{{ csrf_token() }}"},--}}
{{--                    dataType: 'json',--}}
{{--                    success: function (response) {--}}
{{--                        $('#subCategory').empty();--}}
{{--                        $.each(response, function (key, value) {--}}
{{--                            console.log(value);--}}
{{--                            $('#subCategory').append('' +--}}
{{--                                ` <div class="col-md-12 m-4">--}}
{{--                                            <button type="button" class="btn btn-label-success ml-3"--}}
{{--                                                    data-bs-dismiss="modal"--}}
{{--                                                    aria-label="Close">--}}
{{--                                                Done--}}
{{--                                            </button>--}}
{{--                                        </div>`--}}
{{--                            )--}}
{{--                        });--}}
{{--                    }--}}
{{--                });--}}
{{--            } else {--}}
{{--                $(`#table-container${counter}`).empty();--}}
{{--            }--}}
{{--        }--}}

{{--    </script>--}}

@endsection

{{--<option value="${value.id}">${value.name}</option>--}}
