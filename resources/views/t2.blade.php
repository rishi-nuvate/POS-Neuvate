<div id="accountDetailsValidation" class="content">
    <div class="content-header mb-4">
        <h3 class="mb-1">Vendor Information</h3>
        <p>Enter Your Vendor Details</p>
    </div>
    <div class="row g-3">

        <div class="col-sm-6">
            <label class="form-label" for="company_name">Company Name </label>
            <input type="text" name="company_name" id="company_name"
                   class="form-control"
                   placeholder="enter company name"/>
        </div>
        <div class="col-sm-6">
            <label class="form-label" for="contact_person_name">Contact Person
                Name </label>
            <input type="text" name="contact_person_name" id="contact_person_name"
                   class="form-control"
                   placeholder="enter contact person name"
                   onkeydown="return /[a-zA-Z ]/i.test(event.key)"/>
        </div>

        <div class="col-sm-6">
            <label class="form-label" for="contact_person_mobile">Contact Person
                Mobile </label>
            <input type="number" name="contact_person_mobile" id="contact_person_mobile"
                   class="form-control"
                   placeholder="enter contact person mobile"/>
        </div>
        <div class="col-sm-6">
            <label class="form-label" for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control"
                   placeholder="enter email">
        </div>

        <div class="col-12 d-flex justify-content-between mt-4">
            <button class="btn btn-label-secondary btn-prev" disabled><i
                    class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                <span class="align-middle d-sm-inline-block d-none">Previous</span>
            </button>
            <button class="btn btn-primary btn-next"><span
                    class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span>
                <i
                    class="ti ti-arrow-right ti-xs"></i></button>
        </div>
    </div>
</div>
