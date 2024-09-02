<div class="modal fade" id="customerDetailModel" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-simple modal-pricing">
        <div class="modal-content p-2 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <div class="col-xl">
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Customer Details</h5>
                        </div>
                        {{-- <div class="card-body"> --}}
                            <div class="col-md-12">
                        <form>
                            <div class="row">
                            {{-- <div class="col-md-4 mb-3">
                                <label class="form-label" for="basic-icon-default-phone">Phone No</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-phone2" class="input-group-text"><i
                                            class="ti ti-phone"></i></span>
                                    <input type="text" id="basic-icon-default-phone"
                                        class="form-control phone-mask" placeholder="658 799 8941"
                                        aria-label="658 799 8941"
                                        aria-describedby="basic-icon-default-phone2" />
                                </div>
                            </div> --}}
                            {{-- {!! inputField('phone', 'basic-icon-default-phone', '658 799 8941', 'Phone No', old('phone')) !!} --}}
                            {{-- {!! phoneInputField('phone', 'basic-icon-default-phone', '658 799 8941', 'Phone No', $user->phone ?? '') !!} --}}



                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Full
                                    Name</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="ti ti-user"></i></span>
                                    <input type="text" class="form-control"
                                        id="basic-icon-default-fullname" placeholder="John Doe"
                                        aria-label="John Doe"
                                        aria-describedby="basic-icon-default-fullname2" />
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="multicol-birthdate">Birth Date</label>
                                <input type="text" id="multicol-birthdate"
                                    class="form-control dob-picker" placeholder="YYYY-MM-DD" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="multicol-birthdate">Marriage
                                    Anniversary</label>
                                <input type="text" id="multicol-birthdate"
                                    class="form-control dob-picker" placeholder="YYYY-MM-DD" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="Search">Pincode</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="382480"
                                        aria-label="Item" aria-describedby="button-addon2" />
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="select2Multiple" class="form-label">Area</label>
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
                            <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Save Data</button>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>