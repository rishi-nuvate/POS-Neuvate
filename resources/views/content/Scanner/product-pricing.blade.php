<div class="modal fade" id="pricingQtyModal" tabindex="-1"
aria-hidden="true">
<div
    class="modal-dialog modal-xl modal-simple modal-pricingQty">
    <div class="modal-content p-2 p-md-5">
        <div class="modal-body">
            <button type="button" class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"></button>
            <div class="py-0 rounded-top">
                <h2 class="text-center mb-2">Select Size</h2>
                <div class="col-12 col-md-12">
                    <div class="card-body">
                        <div
                            class=" rounded-3 text-center mb-3 pt-4 col-md-12">
                            <img class="img-fluid"
                                src="../../assets/img/illustrations/girl-with-laptop.png"
                                alt="Card girl image"
                                width="140" />
                        </div>
                        <h4 class="mb-2 pb-1">Zara Beige
                            Joggers</h4>
                        <p class="small">
                            Zara’s beige joggers are the perfect
                            blend of
                            comfort
                            and
                            sophistication. Featuring a relaxed
                            fit with an
                            elastic
                            waistband and
                            cuffs, they offer a flattering
                            silhouette. The
                            neutral
                            tone
                            ensures they
                            can be dressed up or down, making
                            them a must-have
                            for
                            any
                            fashion-forward wardrobe.
                        </p>
                        <div class="row mb-3 g-3">
                            <div
                                class="card-datatable table-responsive pt-0">
                                <table
                                    class="datatables-basic table">
                                    <thead>
                                        <tr class="p-3">
                                            <th></th>
                                            <th><button
                                                    type="button"
                                                    id="counter"
                                                    onclick="incrementQty(0)"
                                                    class="btn btn-label-success">Small</button>
                                            </th>
                                            <th><button
                                                    type="button"
                                                    id="counter"
                                                    onclick="incrementQty(1)"
                                                    class="btn btn-label-success">Medium</button>
                                            </th>
                                            <th><button
                                                    type="button"
                                                    id="counter"
                                                    onclick="incrementQty(2)"
                                                    class="btn btn-label-success">Large</button>
                                            </th>
                                            <th><button
                                                    type="button"
                                                    id="counter"
                                                    onclick="incrementQty(3)"
                                                    class="btn btn-label-success">XXL</button>
                                            </th>
                                            <th><button
                                                    type="button"
                                                    id="counter"
                                                    onclick="incrementQty(4)"
                                                    class="btn btn-label-success">XXXL</button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="p-5">
                                            <td><b>Quantity</b>
                                            </td>
                                            <td class="qty">
                                                0</td>
                                            <td class="qty">
                                                0</td>
                                            <td class="qty">
                                                0</td>
                                            <td class="qty">
                                                0</td>
                                            <td class="qty">
                                                0</td>
                                        </tr>
                                        <tr class="p-3">
                                            <td></td>
                                            <td class="qty1">
                                                <button
                                                    type="button"
                                                    onclick="decrementQty(0)"
                                                    class="btn btn-label-danger">Remove</button>
                                            </td>
                                            <td class="qty2">
                                                <button
                                                    type="button"
                                                    onclick="decrementQty(1)"
                                                    class="btn btn-label-danger">Remove</button>
                                            </td>
                                            <td class="qty3">
                                                <button
                                                    type="button"
                                                    onclick="decrementQty(2)"
                                                    class="btn btn-label-danger">Remove</button>
                                            </td>
                                            <td class="qty4">
                                                <button
                                                    type="button"
                                                    onclick="decrementQty(3)"
                                                    class="btn btn-label-danger">Remove</button>
                                            </td>
                                            <td class="qty5">
                                                <button
                                                    type="button"
                                                    onclick="decrementQty(4)"
                                                    class="btn btn-label-danger">Remove</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="javascript:void(0);"
                            class="btn btn-primary w-40">Save
                            Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>