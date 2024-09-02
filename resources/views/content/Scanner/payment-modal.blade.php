<div class="modal fade" id="paymentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-simple modal-pricing">
        <div class="modal-content p-2 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <div class="py-0 rounded-top">
                    <h2 class="text-center mb-2">Checkout</h2>
                    <div class="col-12 col-md-12">
                        <h4>Total Amount: <b>$567</b></h4>
                        <div class="overflow-hidden mb-4 mt-4">
                            <div class="card-datatable table-responsive pt-0">
                                <table class="datatables-basic table" id="datatable-list">
                                    <thead style="background-color: #ded3d3;">
                                        <tr>
                                            <th>Amount</th>
                                            <th>Number</th>
                                            <th>Payment Mode</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-1">
                                        <tr>
                                            <td>
                                                <p class="mb-0"><b>$100</b></p>
                                            </td>
                                            <td>
                                                <p class="mb-0" style="margin-right: 10px;">#987654</p>
                                            </td>
                                            <td>Gift Voucher</td>
                                            {{-- <td><select id="select2Multiple" class="select2 form-select" multiple>
                                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                                      <option value="AK">Jeans</option>
                                                      <option value="HI">Shirt</option>
                                                      <option value="CA">Kurtas</option>
                                                      <option value="NV">T-Shirt</option>
                                                      <option value="OR">Cargo</option>
                                                      <option value="WA">Joggers</option>
                                                    </optgroup>
                                                   
                                                  </select></td> --}}
                                            <td>
                                                <p class="mt-3">#98765</p>
                                            </td>
                                            <td>
                                                {{-- <a class="btn btn-icon btn-label-primary mx-2"
                                                        href=""><i
                                                            class="ti ti-edit mx-2 ti-sm"></i></a> --}}
                                                <button type="button"
                                                    class="btn btn-icon btn-label-danger mx-2">
                                                    <i class="ti ti-trash mx-2 ti-sm"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="col">
                        <h5>Total Pay: <b>$567</b></h5>
                    </div>
                    <div class="col text-end">
                        <h5>Total Balance: <b>$567</b></h5>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row justify-content-between p-3 text-center">
                        <div class="col">
                            <button type="button" class="btn btn-icon btn-label-primary"
                                style="height: 58px !important; width: 58px !important">
                                <span class="ti ti-cash icon-lg"></span>
                            </button>
                            <h5 class="text-muted mt-2">Cash</h5>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-icon btn-label-primary"
                                style="height: 58px !important; width: 58px !important"
                                data-bs-toggle="modal" data-bs-target="#customerCredit">
                                <span class="ti ti-wallet icon-lg"></span>
                            </button>
                            <h5 class="text-muted mt-2">Customer Credit</h5>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-icon btn-label-primary"
                                style="height: 58px !important; width: 58px !important"
                                data-bs-toggle="modal" data-bs-target="#giftCard">
                                <span class="ti ti-gift-card icon-lg"></span>
                            </button>
                            <h5 class="text-muted mt-2">Gift Card</h5>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-icon btn-label-primary"
                                style="height: 58px !important; width: 58px !important"
                                data-bs-toggle="modal" data-bs-target="#loyaltyPoints">
                                <span class="ti ti-star icon-lg"></span>
                            </button>
                            <h5 class="text-muted mt-2">Loyalty Points</h5>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-icon btn-label-primary"
                                style="height: 58px !important; width: 58px !important">
                                <span class="ti ti-brand-visa icon-lg"></span>
                            </button>
                            <h5 class="text-muted mt-2">Online Payment</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>