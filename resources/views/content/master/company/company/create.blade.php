@extends('layouts/layoutMaster')

@section('title', 'Company - Add')


@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-invoice.css') }}"/>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/offcanvas-send-invoice.js') }}"></script>
    <script src="{{ asset('assets/js/app-invoice-add.js') }}"></script>
@endsection

@section('content')

    <nav aria-label="breadcrumb" style="font-size: 20px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/master') }}">Master</a>
            </li>
            <li class="breadcrumb-item active">Company</li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </nav>

    <form method="post" action="{{route('company.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row invoice-add">
            <!-- Invoice Add-->

            <div class="col-lg-12 col-12 mb-lg-0 mb-4 mt-2">
                <div class="text-white rounded-top bg-primary p-2">
                    Company Information
                </div>
                <div class="card invoice-preview-card">
                    <div class="card-body">
                        <div class="content">
                            <div class="row g-3">

                                {{--                                 {!! textInputField('div.class', 'label', 'inputType', 'name', 'id', 'placeholder', '*','inputClass', 'defaultValue', 'required','readonly') !!} --}}

                                {!! textInputField('col-md-6', 'Company Name', 'text', 'CompanyName', 'CompanyName', 'Company Name', '*', 'form-control',old('CompanyName') ,'required','') !!}

                                {!! textInputField('col-md-6', 'Gst No', 'text', 'PanGstNo', 'PanGstNo', 'Pan Card / Gst No', '', 'form-control',old('PanGstNo') ,'','') !!}

                                {!! textInputField('col-md-6', 'Gst File', 'file', 'PanGstFile', 'PanGstFile', 'Pan Card / Gst No', '', 'form-control','','','') !!}
                                {!! textInputField('col-md-6', 'Company Prefix', 'text', 'company_prefix', 'company_prefix', 'Prefix', '', 'form-control','','','') !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-12 mb-lg-0 mb-4 mt-2">

                <div class="text-white rounded-top bg-primary p-2">
                    Billing Information
                </div>

                <div class="card invoice-preview-card">
                    <div class="card-body ">
                        <div class="content">

                            {{--                            <div class="content-header mt-4 mb-4">--}}
                            {{--                                <h3 class="mb-1">Billing Information</h3>--}}
                            {{--                                <p>Enter Your Billing Information</p>--}}
                            {{--                            </div>--}}


                            <div class="row g-3">

                                {!! textInputField('col-md-6', 'Billing Name', 'text', 'BillingName', 'BillingName', 'Billing Name', '*', 'form-control',old('BillingName'),'required','') !!}

                                {!! textInputField('col-md-3', 'Billing Mobile No.', 'number', 'BillingMobileNo', 'BillingMobileNo', 'Billing Name', '*', 'form-control',old('BillingMobileNo'),'required','') !!}

                                {!! textInputField('col-md-3', 'Billing Email', 'email', 'BillingEmail', 'BillingEmail', 'Billing Name', '*', 'form-control',old('BillingEmail'),'required','') !!}

                                <div class="col-md-6">
                                    <label class="form-label" for="AddLine1">Address Line 1</label>

                                    <textarea required id="AddLine1" name="AddLine1" class="form-control"
                                              placeholder="Address Line 1"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="AddLine2">Address Line 2</label>

                                    <textarea required id="AddLine2" name="AddLine2" class="form-control"
                                              placeholder="Address Line 2"></textarea>
                                </div>

                                {!! textInputField('col-md-4', 'City', 'text', 'City', 'City', 'City', '*', 'form-control',old('City'),'required','') !!}

                                <div class="col-sm-4">
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

                                {!! textInputField('col-md-4', 'PinCode', 'number', 'PinCode', 'PinCode', 'PinCode', '*', 'form-control',old('PinCode'),'required','') !!}

                                {!! textInputField('col-md-4', 'Customer Care Number', 'number', 'customer_care_num', 'customer_care_num', 'customer_care_num', '*', 'form-control',old('customer_care_num'),'required','') !!}

                                {!! textInputField('col-md-4', 'Customer Care Email', 'email', 'customer_care_email', 'customer_care_email', 'customer_care_email', '*', 'form-control',old('customer_care_email'),'required','') !!}


                            </div>
                        </div>
                    </div>

                    {{--                    <div class="shipping-address-card card-body">--}}

                    {{--                        <div class="content">--}}

                    {{--                            <div>--}}
                    {{--                                <h3 class="mb-1">Shipping Information </h3>--}}

                    {{--                            </div>--}}
                    {{--                            <div class="content-header mb-4">--}}
                    {{--                                <p>Enter Your Shipping Information</p>--}}
                    {{--                            </div>--}}


                    {{--                            <div id="shipping-address-container">--}}
                    {{--                                <div class="divider m-4">--}}
                    {{--                                    <div class="divider-text">Shipping Details 1</div>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="row g-3 mb-4">--}}

                    {{--                                    {!! textInputField('col-md-4', 'Shipping Company Name', 'text', 'ShipCompName[]', 'ShipCompName', 'Shipping Company Name', '*', 'form-control','','required','') !!}--}}

                    {{--                                    {!! textInputField('col-md-4', 'Shipping Person Mobile No.', 'text', 'ShipPersonNo[]', 'ShipPersonNo', 'Mobile No.', '*', 'form-control','','required','') !!}--}}

                    {{--                                    {!! textInputField('col-md-4', 'Shipping Person Email', 'email', 'ShipPersonEmail[]', 'ShipPersonEmail', 'Email', '*', 'form-control','','required','') !!}--}}

                    {{--                                    {!! textInputField('col-md-4', 'GST No.', 'text', 'ShipGstNo[]', 'ShipGstNo', 'GST No.', '*', 'form-control','','required','') !!}--}}


                    {{--                                    <div class="col-md-4">--}}
                    {{--                                        <label class="form-label" for="ShipAddLine1">Address Line 1</label>--}}

                    {{--                                        <textarea required id="ShipAddLine1" name="ShipAddLine1[]" class="form-control"--}}
                    {{--                                                  placeholder="Address Line 1"></textarea>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="col-md-4">--}}
                    {{--                                        <label class="form-label" for="ShipAddLine2">Address Line 2</label>--}}

                    {{--                                        <textarea required id="ShipAddLine2" name="ShipAddLine2[]" class="form-control"--}}
                    {{--                                                  placeholder="Address Line 2"></textarea>--}}
                    {{--                                    </div>--}}

                    {{--                                    {!! textInputField('col-md-4', 'City', 'text', 'ShipCity[]', 'ShipCity', 'Shipping City', '*', 'form-control','','required','') !!}--}}

                    {{--                                    <div class="col-sm-4">--}}
                    {{--                                        <label class="form-label" for="ShipState">State</label>--}}
                    {{--                                        <select required id="ShipState" name="ShipState[]" class="select2 form-select"--}}
                    {{--                                                data-allow-clear="true">--}}
                    {{--                                            <option value="">Select</option>--}}
                    {{--                                            <option value="Andra Pradesh">Andra Pradesh</option>--}}
                    {{--                                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>--}}
                    {{--                                            <option value="Assam">Assam</option>--}}
                    {{--                                            <option value="Bihar">Bihar</option>--}}
                    {{--                                            <option value="Chhattisgarh">Chhattisgarh</option>--}}
                    {{--                                            <option value="Goa">Goa</option>--}}
                    {{--                                            <option value="Gujarat">Gujarat</option>--}}
                    {{--                                            <option value="Haryana">Haryana</option>--}}
                    {{--                                            <option value="Himachal Pradesh">Himachal Pradesh</option>--}}
                    {{--                                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>--}}
                    {{--                                            <option value="Jharkhand">Jharkhand</option>--}}
                    {{--                                            <option value="Karnataka">Karnataka</option>--}}
                    {{--                                            <option value="Kerala">Kerala</option>--}}
                    {{--                                            <option value="Madya Pradesh">Madya Pradesh</option>--}}
                    {{--                                            <option value="Maharashtra">Maharashtra</option>--}}
                    {{--                                            <option value="Manipur">Manipur</option>--}}
                    {{--                                            <option value="Meghalaya">Meghalaya</option>--}}
                    {{--                                            <option value="Mizoram">Mizoram</option>--}}
                    {{--                                            <option value="Nagaland">Nagaland</option>--}}
                    {{--                                            <option value="Orissa">Orissa</option>--}}
                    {{--                                            <option value="Punjab">Punjab</option>--}}
                    {{--                                            <option value="Rajasthan">Rajasthan</option>--}}
                    {{--                                            <option value="Sikkim">Sikkim</option>--}}
                    {{--                                            <option value="Tamil Nadu">Tamil Nadu</option>--}}
                    {{--                                            <option value="Telangana">Telangana</option>--}}
                    {{--                                            <option value="Tripura">Tripura</option>--}}
                    {{--                                            <option value="Uttaranchal">Uttaranchal</option>--}}
                    {{--                                            <option value="Uttar Pradesh">Uttar Pradesh</option>--}}
                    {{--                                            <option value="West Bengal">West Bengal</option>--}}
                    {{--                                            <option disabled style="background-color:#aaa; color:#fff">UNION Territories--}}
                    {{--                                            </option>--}}
                    {{--                                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands--}}
                    {{--                                            </option>--}}
                    {{--                                            <option value="Chandigarh">Chandigarh</option>--}}
                    {{--                                            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>--}}
                    {{--                                            <option value="Daman and Diu">Daman and Diu</option>--}}
                    {{--                                            <option value="Delhi">Delhi</option>--}}
                    {{--                                            <option value="Lakshadeep">Lakshadeep</option>--}}
                    {{--                                            <option value="Pondicherry">Pondicherry</option>--}}
                    {{--                                        </select>--}}
                    {{--                                    </div>--}}

                    {{--                                    {!! textInputField('col-md-4', 'PinCode', 'number', 'ShipPinCode[]', 'ShipPinCode', 'Shipping Pin Code', '*', 'form-control','','required','') !!}--}}

                    {{--                                </div>--}}

                    {{--                            </div>--}}
                    {{--                        </div>--}}


                    {{--                    </div>--}}
                    {{--                    <div class="d-flex flex-row-reverse m-4">--}}
                    {{--                        <!-- Button to add more shipping addresses -->--}}
                    {{--                        <button type="button" onclick="addItem()" class="btn btn-sm btn-primary">Add Shipping--}}
                    {{--                            Address--}}
                    {{--                        </button>--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-12 invoice-actions mt-3">
            <button type="submit" id="btnSave"
                    class="btn btn-primary button-prevent-multiple-submits d-grid w-100 d-flex align-items-center justify-content-center waves-effect waves-light">
                <i class="fas fa-angle-double-up me-2"></i>
                Save
            </button>
        </div>


    </form>

    <!-- Offcanvas -->
    @include('_partials/_offcanvas/offcanvas-send-invoice')
    <!-- /Offcanvas -->
@endsection
<script>
    // Function to update remove button state
    function updateRemoveButtonState() {
        var removeButtons = $('.shipping-address-card .btn-danger');
        if (removeButtons.length === 1) {
            removeButtons.prop('disabled', true); // Disable remove button if only one address present
        } else {
            removeButtons.prop('disabled', false); // Enable remove button if more than one address present
        }
    }

    var counter = 0;

    function addItem() {
        // Create a new div element with the specified HTML code
        counter++;
        var shippingFormHTML = `
                  <div class="row g-3" id="ShippingContainer_` + counter + `">
                      <div class="divider mt-5">
                        <div class="divider-text">Shipping Details ` + (counter + 1) + `</div>
                      </div>
                      <div class="col-md-4">
                          <label class="form-label" for="ShipCompName">Shipping Company Name</label>
                          <input required type="text" id="ShipCompName" name="ShipCompName[]" class="form-control" placeholder="Shipping Company Name" />
                      </div>
                      <div class="col-md-4">
                          <label class="form-label" for="ShipPersonNo">Shipping Person Mobile No</label>
                          <input required type="text" id="ShipPersonNo" name="ShipPersonNo[]" class="form-control" placeholder="Mobile" />
                      </div>
                      <div class="col-md-4">
                          <label class="form-label" for="ShipPersonEmail">Shipping Person Email</label>
                          <input required type="email" id="ShipPersonEmail" name="ShipPersonEmail[]" class="form-control" placeholder="Email" />
                      </div>
                      <div class="col-md-4">
                          <label class="form-label" for="ShipGstNo">GST No</label>
                          <input required type="text" id="ShipGstNo" name="ShipGstNo[]" class="form-control" placeholder="GST Number" />
                      </div>
                      <div class="col-md-4">
                          <label class="form-label" for="ShipAddLine1">Address Line 1</label>
                          <textarea required id="ShipAddLine1" name="ShipAddLine1[]" class="form-control" placeholder="Address Line 1"></textarea>
                      </div>
                      <div class="col-md-4">
                          <label class="form-label" for="ShipAddLine2">Address Line 2</label>
                          <textarea required id="ShipAddLine2" name="ShipAddLine2[]" class="form-control" placeholder="Address Line 2"></textarea>
                      </div>
                      <div class="col-sm-4">
                          <label class="form-label" for="ShipCity">City</label>
                          <input required type="text" id="ShipCity" name="ShipCity[]" class="form-control" placeholder="city" />
                      </div>
                      <div class="col-sm-4">
                          <label class="form-label" for="ShipState">State</label>
                          <select required id="ShipState" name="ShipState[]" class="select2 form-select" data-allow-clear="true">
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
                              <option disabled style="background-color:#aaa; color:#fff">UNION Territories</option>
                              <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                              <option value="Chandigarh">Chandigarh</option>
                              <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                              <option value="Daman and Diu">Daman and Diu</option>
                              <option value="Delhi">Delhi</option>
                              <option value="Lakshadeep">Lakshadeep</option>
                              <option value="Pondicherry">Pondicherry</option>
                          </select>
                      </div>
                      <div class="col-sm-3">
                          <label class="form-label" for="ShipPinCode">Pincode</label>
                          <input type="text" id="ShipPinCode" name="ShipPinCode[]" class="form-control multi-steps-pincode" placeholder="Pin Code" maxlength="6" />
                      </div>
                      <div class="col-md-1 mt-4">
                            <div class="demo-inline-spacing">
                                <button type="button" onclick="removeItem(` + counter + `)"
                                    class="btn rounded-pill btn-icon btn-label-danger waves-effect">
                                    <span class="ti ti-trash"></span></button>
                            </div>
                          </div>
                  </div>`;


        // Append the new div to the container
        // document.getElementById("shipping-address-container").appendChild(shippingFormHTML);
        $('#shipping-address-container').append(shippingFormHTML);
        $(".select2").select2();
        shippingFormHTML.querySelector("input").focus();

    }

    function removeItem(counter) {
        var elementToRemove = document.getElementById("ShippingContainer_" + counter);
        elementToRemove.remove();
    }
</script>
