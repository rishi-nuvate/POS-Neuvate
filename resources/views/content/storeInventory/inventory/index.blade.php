@extends('layouts/layoutMaster')

@section('title', 'List-SKU')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/toastr/toastr.css') }}" />
@endsection

@section('page-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/toastr/toastr.js') }}"></script>
@endsection

@section('content')

    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Total Inventory</span>
                            <div class="d-flex align-items-center my-2">
                                <h3 class="mb-0 me-2">1000</h3>
                            </div>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-primary">
                                <i class="ti ti-user ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Front Inventory</span>
                            <div class="d-flex align-items-center my-2">
                                <h3 class="mb-0 me-2">400</h3>
                            </div>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-danger">
                                <i class="ti ti-user-plus ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Back Inventory</span>
                            <div class="d-flex align-items-center my-2">
                                <h3 class="mb-0 me-2">600</h3>
                            </div>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-success">
                                <i class="ti ti-user-check ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card container">
        <div class="row p-2 py-3">
            <div class="col-md-4">
                <label for="select2Multiple" class="form-label">Category</label>
                <select name="efw" class="select2 form-select">
                    <option value="">select umo</option>
                    <option value="MTRS">MTRS</option>
                    <option value="PIECES">PIECES</option>
                    <option value="CONE">CONE</option>
                    <option value="TUBE">TUBE</option>
                    <option value="KGS">KGS</option>
                    <option value="PKTS">PKTS</option>
                    <option value="BOX">BOX</option>
                    <option value="YARDS">YARDS</option>
                    <option value="LTR">LTR</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="select2Multiple" class="form-label">Sub Category</label>
                <select name="wefw" class="select2 form-select">
                    <option value="">select umo</option>
                    <option value="MTRS">MTRS</option>
                    <option value="PIECES">PIECES</option>
                    <option value="CONE">CONE</option>
                    <option value="TUBE">TUBE</option>
                    <option value="KGS">KGS</option>
                    <option value="PKTS">PKTS</option>
                    <option value="BOX">BOX</option>
                    <option value="YARDS">YARDS</option>
                    <option value="LTR">LTR</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="select2Multiple" class="form-label">Product</label>
                <select name="uom" class="select2 form-select">
                    <option value="">select umo</option>
                    <option value="MTRS">MTRS</option>
                    <option value="PIECES">PIECES</option>
                    <option value="CONE">CONE</option>
                    <option value="TUBE">TUBE</option>
                    <option value="KGS">KGS</option>
                    <option value="PKTS">PKTS</option>
                    <option value="BOX">BOX</option>
                    <option value="YARDS">YARDS</option>
                    <option value="LTR">LTR</option>
                </select>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table" id="datatable-list">
                <thead>
                    <tr>
                        <th>SR No.</th>
                        <th>Product Image</th>
                        <th>SKU</th>
                        <th>Total Inventory</th>
                        <th>Product Name</th>
                        <th>Company</th>
                        <th>Size</th>
                        <th>Cost Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-bold"><a href="">1</a></td>
                        <td class="text-bold"><img src="../../assets/img/products/iphone.png" alt="" height="30px"></td>
                        <td>#98765</td>
                        <td>120</td>
                        <td>Jeans</td>
                        <td>Blue Buddha</td>
                        <td>36</td>
                        <td>
                            $34.99
                        </td>
                        <td>
                            <a class="btn btn-icon btn-label-primary mx-2" href=""><i
                                    class="ti ti-edit mx-2 ti-sm"></i></a>
                            <button type="button" class="btn btn-icon btn-label-danger mx-2"><i
                                    class="ti ti-trash mx-2 ti-sm"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

@endsection
