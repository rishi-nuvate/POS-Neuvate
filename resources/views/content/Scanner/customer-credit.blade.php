<div class="modal fade" id="customerCredit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-l modal-simple modal-customerCredit">
        <div class="modal-content p-2 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <div class="py-0 rounded-top">
                    <h2 class="text-center mb-2">Customer Credit</h2>
                </div>
                <div class="container">
                    <div class="row mb-3">
                        <div class="col-12">
                            <label class="form-label" for="currentPoints">Current Loyalty Points</label>
                            <input type="text" id="currentPoints" class="form-control" value="1500"
                                readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button type="button" class="btn btn-primary"
                                onclick="useLoyaltyPoints()">Use Points</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>