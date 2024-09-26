@php use App\Models\Company; @endphp
@extends('layouts/layoutMaster')

@section('title', 'User View - Pages')

@section('vendor-style')
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-user-view.css')}}" />
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
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">User / View /</span> Account
    </h4>
    <div class="row">
        <!-- User Sidebar -->
        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
            <!-- User Card -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="user-avatar-section">
                        <div class=" d-flex align-items-center flex-column">
                            <img class="img-fluid rounded mb-3 pt-1 mt-4" src="{{ asset('assets/img/avatars/15.png') }}"
                                 height="100"
                                 width="100" alt="User avatar" />
                            <div class="user-info text-center">
                                <h4 class="mb-2">{{ $user->company_name }}</h4>
                                <span class="badge bg-label-secondary mt-1">Company Name</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around
        flex-wrap mt-3 pt-3 pb-4 border-bottom">
                        <div class="d-flex align-items-start me-4 mt-3 gap-2">
                            <span class="badge bg-label-primary p-2 rounded"><i class='ti ti-checkbox ti-sm'></i></span>
                            <div>
                                <p class="mb-0 fw-medium">1.23k</p>
                                <small>Total Amount</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mt-3 gap-2">
                            <span class="badge bg-label-primary p-2 rounded"><i
                                    class='ti ti-briefcase ti-sm'></i></span>
                            <div>
                                <p class="mb-0 fw-medium">568</p>
                                <small>Total Invoice</small>
                            </div>
                        </div>
                    </div>

                    <p class="mt-4 small text-uppercase text-muted">Details</p>
                    <div class="info-container">
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <span class="fw-medium me-1">Role:</span>
                                <span>{{ $user->role }}</span>
                            </li>
                            <li class="mb-2">
                                <span class="fw-medium me-1">Contact Person Name:</span>
                                <span>{{ $user->person_name }}</span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-medium me-1">Email:</span>
                                <span>{{ $user->email }}</span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-medium me-1">Mobile:</span>
                                <span>{{ $user->person_mobile }}</span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-medium me-1">GST / Pan Card :</span>
                                <span>{{ !empty($user->gst_no)?$user->gst_no:$user->pancard_no }}</span>
                            </li>

                            <li class="mb-2 pt-1">
                                <span class="fw-medium me-1">GST Certificate File :</span>
                                @if(!empty($user->gst_file))
                                    <a target="_blank" href="{{ url('gst/'.$user->id.'/'.$user->gst_file) }}"><br>Download
                                        File</a>
                                @endif
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-medium me-1">Status:</span>
                                <span
                                    class="badge bg-label-{{ ($user->is_active == '1')?'success':'danger' }}">{{ ($user->is_active == '1')?'Active':'In Active' }}</span>
                            </li>
                        </ul>
                        <div class="d-flex justify-content-center">
                            <a href="javascript:" class="btn btn-primary me-3" data-bs-target="#editUser"
                               data-bs-toggle="modal" onclick="viewModelUserEdit({{ $user->id }});">Edit</a>
                            {{--              <a href="javascript:;" class="btn btn-label-danger suspend-user">Suspended</a>--}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /User Card -->
            @if($user->UserBank)
                @php $userBank = $user->UserBank @endphp
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <h5 class="card-action-title mb-0">Bank Details</h5>
                        </div>
                        <ul class="ps-3 g-2 my-3">
                            <li class="mb-2">Account No : {{ $userBank->account_no }}</li>
                            <li class="mb-2">Account Name : {{ $userBank->account_name }}</li>
                            <li class="mb-2">Bank Name : {{ $userBank->bank_name }}</li>
                            <li class="mb-2">IFSC : {{ $userBank->ifsc }}</li>
                        </ul>
                        <div class="d-flex justify-content-center">
                            <a href="javascript:" class="btn btn-primary me-3" data-bs-target="#editUser"
                               data-bs-toggle="modal" onclick="viewModelUserEdit({{ $user->id }});">Edit</a>
                        </div>
                    </div>

                </div>
            @endif

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Assign Companies</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">

                        @if($user->VendorCompany)
                            @foreach($user->VendorCompany as $vendorCompanies)
                                @php $company =Company::where("id",$vendorCompanies->company_id)->first() @endphp
                                @if($company)
                                    <li class="d-flex mb-4 pb-1 align-items-center">
                                        <div class="avatar flex-shrink-0 me-3">
                                            <span class="avatar-initial rounded bg-label-primary">{{ substr($company->c_name, 0, 2) }}</span>
                                        </div>
                                        <div class="row w-100 align-items-center">
                                            <div class="col-sm-8 col-lg-12 col-xxl-8 mb-1 mb-sm-0 mb-lg-1 mb-xxl-0">
                                                <p class="mb-0 fw-medium">{{ $company->c_name }}</p>
                                            </div>
                                            <div
                                                class="col-sm-4 col-lg-12 col-xxl-4 d-flex justify-content-sm-end justify-content-md-start justify-content-xxl-end">
                                                <div class="badge bg-label-secondary">{{ $company->pancard_gst_no }}</div>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <!--/ User Sidebar -->


        <!-- User Content -->
        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">

            <!-- Billing Address -->
            @if($user->UserAddress)
                @php $userAddress = $user->UserAddress @endphp
                <div class="card caendforeachrd-action mb-4">
                    <div class="card-header align-items-center">
                        <h5 class="card-action-title mb-0">Billing Address</h5>
                        <div class="card-action-element">
                            <a href="javascript:" class="btn btn-sm btn-primary me-3" data-bs-target="#editUser"
                               data-bs-toggle="modal" onclick="viewModelUserEdit({{ $user->id }});">Edit</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-7 col-12">
                                <dl class="row mb-0">
                                    <dt class="col-sm-4 mb-2 fw-medium text-nowrap">Company Name:</dt>
                                    <dd class="col-sm-8">{{ $user->company_name }}</dd>

                                    <dt class="col-sm-4 mb-2 fw-medium text-nowrap">Billing Email:</dt>
                                    <dd class="col-sm-8">{{  $user->email }}</dd>

                                    <dt class="col-sm-4 mb-2 fw-medium text-nowrap">Billing Address:</dt>
                                    <dd class="col-sm-8">{{ $userAddress->b_address1 ?? '' }}
                                        <br>{{ $userAddress->b_address2 ?? '' }}</dd>
                                </dl>
                            </div>
                            <div class="col-xl-5 col-12">
                                <dl class="row mb-0">
                                    <dt class="col-sm-4 mb-2 fw-medium text-nowrap">Contact:</dt>
                                    <dd class="col-sm-8">{{  $user->person_mobile ?? '' }}</dd>

                                    <dt class="col-sm-4 mb-2 fw-medium text-nowrap">City:</dt>
                                    <dd class="col-sm-8">{{ $userAddress->b_city ?? '' }}</dd>

                                    <dt class="col-sm-4 mb-2 fw-medium text-nowrap">State:</dt>
                                    <dd class="col-sm-8">{{ $userAddress->b_state ?? ''}}</dd>

                                    <dt class="col-sm-4 mb-2 fw-medium text-nowrap">Pincode:</dt>
                                    <dd class="col-sm-8">{{ $userAddress->b_pincode ?? '' }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                @if($user->is_approve == '1')
                    <div class="card caendforeachrd-action mb-4">
                        <div class="card-header align-items-center">
                            <h5 class="card-action-title mb-0">Shipping Address</h5>
                            <div class="card-action-element">
                                <a href="javascript:" class="btn btn-sm btn-primary me-3" data-bs-target="#editUser"
                                   data-bs-toggle="modal" onclick="viewModelUserEdit({{ $user->id }});">Edit</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-7 col-12">
                                    <dl class="row mb-0">
                                        <dt class="col-sm-4 mb-2 fw-medium text-nowrap">Company Name:</dt>
                                        <dd class="col-sm-8">{{ $user->company_name ?? '' }}</dd>

                                        <dt class="col-sm-4 mb-2 fw-medium text-nowrap">Billing Email:</dt>
                                        <dd class="col-sm-8">{{  $user->email ?? '' }}</dd>

                                        <dt class="col-sm-4 mb-2 fw-medium text-nowrap">Billing Address:</dt>
                                        <dd class="col-sm-8">{{ $userAddress->s_address1 ?? ''}}
                                            <br>{{ $userAddress->s_address2 ?? ''}}</dd>
                                    </dl>
                                </div>
                                <div class="col-xl-5 col-12">
                                    <dl class="row mb-0">
                                        <dt class="col-sm-4 mb-2 fw-medium text-nowrap">Contact:</dt>
                                        <dd class="col-sm-8">{{  $user->person_mobile ?? ''}}</dd>

                                        <dt class="col-sm-4 mb-2 fw-medium text-nowrap">City:</dt>
                                        <dd class="col-sm-8">{{ $userAddress->s_city ?? ''}}</dd>

                                        <dt class="col-sm-4 mb-2 fw-medium text-nowrap">State:</dt>
                                        <dd class="col-sm-8">{{ $userAddress->s_state ?? ''}}</dd>

                                        <dt class="col-sm-4 mb-2 fw-medium text-nowrap">Zipcode:</dt>
                                        <dd class="col-sm-8">{{ $userAddress->s_pincode ?? ''}}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif

        </div>
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
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: { id: id, status: status, "_token": "{{ csrf_token() }}" },
            success: function(data) {
                $('.modal-body').html(data);
            },
            error: function(data) {
                alert(data);
            }
        });
    }
</script>
