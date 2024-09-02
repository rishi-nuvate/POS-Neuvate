<div class="modal fade" id="loyaltyPoints" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-simple modal-loyaltyPoints">
        <div class="modal-content p-2 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <div class="py-0 rounded-top">
                    <h2 class="text-center mb-2">Loyalty Points</h2>
                </div>
                <div class="container">
                    <div class="row mb-3">
                        <div class="col-12">
                            <label class="form-label" for="currentPoints">Current Loyalty Points</label>
                            <input type="text" id="currentPoints" class="form-control" value="1500"
                                readonly>
                        </div>

                        <hr class="mt-4 col-12" />
                        <div class="col-12 mt-1">
                            <label class="form-label" for="pointsToUse">Points to Use</label>
                            <input type="number" id="pointsToUse" class="form-control"
                                placeholder="Enter points to use">
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