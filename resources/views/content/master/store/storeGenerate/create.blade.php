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


@section('page-script')
    <script src="{{asset('assets/js/form-wizard-validation.js')}}"></script>
    <script src="{{asset('assets/js/form-wizard-numbered.js')}}"></script>
@endsection


<div id="overlay">
    <div class="cv-spinner">
        <span class="spinner"></span>
    </div>
</div>
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Form Wizard/</span> Numbered</h4>
        <!-- Default -->
        <div class="row">


            <!-- Validation Wizard -->
            <div class="col-12 mb-4">
                <small class="text-light fw-medium">Validation</small>
                <div id="wizard-validation" class="bs-stepper mt-2">
                    <div class="bs-stepper-header">
                        <div class="step" data-target="#account-details-validation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle">1</span>
                                <span class="bs-stepper-label mt-1">
                            <span class="bs-stepper-title">Store Details</span>
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
                                <div class="content-header mb-3">
                                    <h6 class="mb-0">Account Details</h6>
                                    <small>Enter Your Account Details.</small>
                                </div>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="store_type">Store Type </label>
                                        <input type="text" name="store_type" id="store_type"
                                               class="form-control"
                                               placeholder="enter company name"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="store_name">Store Name </label>
                                        <input type="text" name="store_name" id="store_name"
                                               class="form-control"
                                               placeholder="enter Store name"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="store_code">Store Code </label>
                                        <input type="text" name="store_code" id="store_code"
                                               class="form-control"
                                               placeholder="enter Store code"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="store_rating">Store Rating </label>
                                        <input type="text" name="store_rating" id="store_rating"
                                               class="form-control"
                                               placeholder="enter Store Rating"/>
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
                                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
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
                                        <label class="form-label" for="store_area">Area </label>
                                        <input type="text" name="store_area" id="store_area"
                                               class="form-control"
                                               placeholder="enter Area"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="map_link">Map Link</label>
                                        <input type="text" name="map_link" id="map_link"
                                               class="form-control"
                                               placeholder="enter Area"/>
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
                            <!-- Personal Info -->
                            <div id="personal-info-validation" class="content">
                                <div class="content-header mb-3">
                                    <h6 class="mb-0">Personal Info</h6>
                                    <small>Enter Your Personal Info.</small>
                                </div>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="franchise">Franchise</label>
                                        <input
                                            type="text"
                                            id="franchise"
                                            name="franchise"
                                            class="form-control"
                                            placeholder="John"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="master_franchise">Franchise</label>
                                        <input
                                            type="text"
                                            id="master_franchise"
                                            name="master_franchise"
                                            class="form-control"
                                            placeholder="John"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="manager_name">Manager Name</label>
                                        <input
                                            type="text"
                                            id="manager_name"
                                            name="manager_name"
                                            class="form-control"
                                            placeholder="John"/>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="manager_number">Manager Phone num.</label>
                                        <input
                                            type="text"
                                            id="manager_number"
                                            name="manager_number"
                                            class="form-control"
                                            placeholder="Doe"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="manager_email">Manager Email</label>
                                        <input
                                            type="email"
                                            id="manager_email"
                                            name="manager_email"
                                            class="form-control"
                                            placeholder="Doe"/>
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
                            <div id="social-links-validation" class="content">
                                <div class="content-header mb-3">
                                    <h6 class="mb-0">Payment Type</h6>
                                </div>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label class="form-label"
                                               for="store_payment_type">Payment Type</label>
                                        <input
                                            type="text"
                                            name="store_payment_type"
                                            id="store_payment_type"
                                            class="form-control"
                                            placeholder=""/>
                                    </div>

                                    <div class="col-12 d-flex justify-content-between">
                                        <button class="btn btn-label-secondary btn-prev">
                                            <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </button>
                                        <button type="submit" class="btn btn-success btn-next btn-submit">Submit</button>
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

    </div>

@endsection
