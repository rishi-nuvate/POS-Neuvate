@extends('layouts/layoutMaster')

@section('title', 'Analytics')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
@endsection

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/cards-advance.css') }}">
    <style>
        .icon-lg {
            font-size: 2.8rem;
        }
    </style>
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>

@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
    <script src="{{ asset('assets/js/forms-selects.js') }}"></script>
    <script src="{{ asset('assets/js/extended-ui-perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/js/tables-datatables-basic.js') }}"></script>
@endsection

@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-3">
                                <label for="Search">Customer Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search Here" aria-label="Item"
                                        aria-describedby="button-addon2" />
                                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal"
                                        data-bs-target="#customerDetailModel"><i class="ti ti-plus mx-2 ti-sm"></i></button>
                                </div>
                            </div>
                            {{-- Customer Detail Modal --}}
                            @include('content.Scanner.customer-details')
                            {{-- End --}}

                            <div class="col-md-3">
                                <label for="select2Basic" class="form-label">Sales Person Name</label>
                                <select id="select2Basic" class="select2 form-select form-select-lg"
                                    data-allow-clear="true">
                                    <option value="AK">Alaska</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="CA">California</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="Scan">Scan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Item Barcode scan"
                                        aria-label="Item" aria-describedby="button-addon2" />
                                    <button class="btn btn-outline-primary" type="button" id="button-addon2"><i
                                            class="ti ti-scan mx-2 ti-sm"></i></button>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="Scan">Product V-Lookup</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter Product Code"
                                        aria-label="Item" aria-describedby="button-addon2" />
                                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal"
                                        data-bs-target="#pricingQtyModal" id="button-addon2"><i
                                            class="ti ti-search mx-2 ti-sm"></i></button>
                                </div>
                            </div>
                            {{-- Modal for the Pricing and Quantity --}}
                            @include('content.Scanner.product-details')
                            @include('content.Scanner.product-pricing')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card overflow-hidden mb-4" style="height: 450px">
                    <div class="card-datatable table-responsive pt-0">
                        <table class="datatables-basic table" id="datatable-list">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Per Piece </th>
                                    <th>Quantity</th>
                                    {{-- <th>Additional Discount</th> --}}
                                    <th>Offers</th>
                                    <th>Discount</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="../../assets/img/products/iphone.png" alt="User" class="rounded"
                                            width="46" /></td>
                                    <td>
                                        <p class="mb-0"><b>Iphone 11 Pro Max</b></p>
                                        <p class="mb-0">Item: #FXZ-4567</p>
                                    </td>
                                    <td>
                                        <p class="mb-0" style="margin-right: 10px;">$999.29</p>
                                    </td>
                                    <td>4</td>
                                    <td><select name="wefwe" class="select2 form-select" multiple>
                                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                                <option value="AK">Jeans</option>
                                                <option value="HI">Shirt</option>
                                                <option value="CA">Kurtas</option>
                                                <option value="NV">T-Shirt</option>
                                                <option value="OR">Cargo</option>
                                                <option value="WA">Joggers</option>
                                            </optgroup>

                                        </select></td>
                                    <td>
                                        <p class="mt-3"><b>Selling Price: </b>$212.90</p>
                                        <p><b>Discount: </b>$34.90</p>
                                    </td>
                                    <td>$987.98</td>

                                    <td>
                                        <button type="button" class="btn btn-icon btn-label-danger mx-2">
                                            <i class="ti ti-trash mx-2 ti-sm"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="../../assets/img/products/iphone.png" alt="User" class="rounded"
                                            width="46" /></td>
                                    <td>
                                        <p class="mb-0"><b>Iphone 11 Pro Max</b></p>
                                        <p class="mb-0">Item: #FXZ-4567</p>
                                    </td>
                                    <td>
                                        <p class="mb-0" style="margin-right: 10px;">$999.29</p>
                                    </td>
                                    <td>4</td>
                                    <td><select name="3r" class="select2 form-select" multiple>
                                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                                <option value="AK">Jeans</option>
                                                <option value="HI">Shirt</option>
                                                <option value="CA">Kurtas</option>
                                                <option value="NV">T-Shirt</option>
                                                <option value="OR">Cargo</option>
                                                <option value="WA">Joggers</option>
                                            </optgroup>

                                        </select></td>
                                    <td>
                                        <p class="mt-3"><b>Selling Price: </b>$212.90</p>
                                        <p><b>Discount: </b>$34.90</p>
                                    </td>
                                    <td>$987.98</td>

                                    <td>
                                        <button type="button" class="btn btn-icon btn-label-danger mx-2">
                                            <i class="ti ti-trash mx-2 ti-sm"></i></button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <img src="../../assets/img/products/nike-air-jordan.png" alt="Product Image" class="rounded"
                             width="55%" />
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="row">
                <!-- Image Preview Section -->
                <div class="col-md-3">
                    <div class="card-body text-center">

                    </div>
                </div>

                <!-- Billing Information Section -->
                <div class="col-md-3">
                    <div class="card-body">
                        <small>
                            <div class="col-md-12">
                                <label for="select2Basic1" class="form-label">Discount Coupon</label>
                                <select id="select2Basic1" class="select2 form-select form-select-lg"
                                    data-allow-clear="true">
                                    <option value="80%">80%</option>
                                </select>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label for="additionalDiscount1">Additional Discount</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Additional Discount"
                                        aria-label="Item" aria-describedby="button-addon2" />
                                </div>
                            </div>
                        </small>
                    </div>
                </div>

                <!-- Total Amount Section -->
                <div class="col-md-3">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <p>Total Quantity: 10</p>
                            </div>
                            <small>
                                <div class="col-md-6">
                                    <p>Taxable Amount: 3489</p>
                                    <p>Discount: 3489</p>
                                    <p>Net Amount: 3489</p>
                                </div>
                        </div>
                        </small>
                    </div>
                </div>

                <!-- Tax and Payment Section -->
                <div class="col-md-3">
                    <div class="card-body">
                        <div class="col-md-12 text-center">
                            <h4>Price: 3459.98</h4>
                            <button type="button" class="btn btn-success mt-2" data-bs-toggle="modal"
                                data-bs-target="#paymentModal">Pay Now</button>
                            <button type="button" class="btn btn-warning mt-2">Hold Bill</button>
                        </div>
                    </div>
                </div>


                {{-- Modal for the Payment --}}
                @include('content.Scanner.payment-modal')

                {{-- Modal for the Loyalty Points --}}
                @include('content.Scanner.loyalty-points')

                {{-- Modal for the Gift Card --}}
                @include('content.Scanner.gift-card')

                {{-- Modal for the Customer Credit --}}
                @include('content.Scanner.customer-credit')

            </div>
        </div>
    </div>
    </div>
    </div>

    <script>
        function incrementQty(index) {
            // Get all quantity cells
            var qtyCells = document.getElementsByClassName('qty');
            // Increment the quantity at the specified index
            qtyCells[index].textContent = parseInt(qtyCells[index].textContent) + 1;
        }

        function decrementQty(index) {
            // Get all quantity cells
            var qtyCells = document.getElementsByClassName('qty');
            // Decrement the quantity at the specified index
            qtyCells[index].textContent = Math.max(0, parseInt(qtyCells[index].textContent) - 1);
        }

        function showCustomerName() {
            var x = document.getElementById("Customer").value;
            document.getElementById("Customer").innerHTML = x;
        }

        function incrementQuantity(index) {
            // Get all quantity cells
            var qtyCells = document.getElementsByClassName('quantity');
            // Increment the quantity at the specified index
            qtyCells[index].textContent = parseInt(qtyCells[index].textContent) + 1;
        }

        function decrementQuantity(index) {
            // Get all quantity cells
            var qtyCells = document.getElementsByClassName('quantity');
            // Decrement the quantity at the specified index
            qtyCells[index].textContent = Math.max(0, parseInt(qtyCells[index].textContent) - 1);
        }

        function useLoyaltyPoints() {
            var currentPoints = document.getElementById("currentPoints").value;
            var pointsToUse = document.getElementById("pointsToUse").value;
            if (pointsToUse > 0 && pointsToUse <= currentPoints) {
                // Perform the logic to use the points
                alert("Using " + pointsToUse + " loyalty points.");
                // Close the modal after using the points
                var modal = bootstrap.Modal.getInstance(document.getElementById('loyaltyPoints'));
                modal.hide();
            } else {
                alert("Please enter a valid number of points.");
            }
        }
    </script>

@endsection
