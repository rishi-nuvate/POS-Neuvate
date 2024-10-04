<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyShipAddress;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\PurchaseOrder;
use App\Http\Requests\StorePurchaseOrderRequest;
use App\Http\Requests\UpdatePurchaseOrderRequest;
use App\Models\PurchaseOrderItem;
use App\Models\PurchaseOrderItemParameter;
use App\Models\User;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
//        $Pos = PurchaseOrder::with('Company', 'ShipAddress', 'Vendor')->get();
//        $vendors = User::where('role', 'vendor')->get();
        return view('content.supplyChain.po.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::with('ShipAdd')->get();

        $vendors = User::where('role', 'vendor')->get();

        $products = Product::get();

//        dd(1);

        return view('content.supplyChain.po.create', compact('companies', 'vendors', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePurchaseOrderRequest $request)
    {

//        dd($request->all());
        $count = count($request->unitPrice);
        $sku_count = count($request->sku);

        if (!empty($request->vendor) && !empty($request->company) && !empty($request->shippingAddress)) {
            $Po = new PurchaseOrder([
                'user_id' => $request->vendor,
                'company_id' => $request->company,
                'company_shipping_id' => $request->shippingAddress,
            ]);

            if ($Po->save()) {
                for ($i = 0; $i < $count; $i++) {
                    $PoItems = new PurchaseOrderItem([
                        'po_id' => $Po->id,
                        'product_id' => $request->product_id[$i],
                        'product_description' => $request->description[$i],
                        'unit_price' => $request->unitPrice[$i],
                        'tax_amount' => $request->tax[$i],
                        'total_quantity' => $request->TotalQty[$i],
                    ]);

                    if ($PoItems->save()) {
                        for ($j = 0; $j < $sku_count; $j++) {
                            $PoItemParameters = new PurchaseOrderItemParameter([
                                'po_id' => $Po->id,
                                'po_item_id' => $PoItems->id,
                                'item_sku' => $request->sku[$j],
                                'item_color' => $request->color[$j],
                                'item_size' => $request->size[$j],
                                'item_qty' => $request->quantity[$j],
                            ]);
                            if (!$PoItemParameters->save()) {
                                return redirect()->route('po.create')->withErrors('Error saving POItemParameters.');
                            }
                        }
                    } else {
                        return redirect()->route('po.create')->withErrors('Error saving POItems.');
                    }
                }
                return redirect()->route('po.create')->withSuccess('Successfully Saved');
            } else {
                return redirect()->route('po.create')->withErrors('Error saving PO.');
            }
        }
        return redirect()->route('po.create')->withSuccess('Validation Failed');
    }

    /**
     * Display the specified resource.
     */
    public function show(PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePurchaseOrderRequest $request, PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseOrder $purchaseOrder)
    {
        //
    }

    public function getSkuByProduct(Request $request)
    {

        $product = $request->product_id;
        $data = [];
        $productRow = Product::where('id', $product)->first();
        $productVariants = ProductVariant::where('product_id', $product)->get();

        $productColorArray = [];
        $productSizeArray = [];
        $productSkuArray = [];

        foreach ($productVariants as $productVariant) {
            $productColorArray[] = $productVariant->color;
            $productSizeArray[] = $productVariant->size;
            $productSkuArray[] = $productVariant->sku;
        }

        $data["productColors"] = $productColorArray;
        $data["productSize"] = $productSizeArray;
        $data["productSkus"] = $productSkuArray;
        $data["productRow"] = $productRow->cost_price;

        return response()->json($data);

    }

    public function getProductVariant(Request $request)
    {
        $product = $request->product_id;
        $data = [];
        $productRow = Product::where('id', $product)->first();
        $productVariants = ProductVariant::where('product_id', $product)->get();

        $productColorArray = [];
        $productSizeArray = [];
        $productSkuArray = [];

        foreach ($productVariants as $productVariant) {
            $productColorArray[] = $productVariant->color;
            $productSizeArray[] = $productVariant->size;
            $productSkuArray[] = $productVariant->sku;
        }

        $data["productColors"] = $productColorArray;
        $data["productSize"] = $productSizeArray;
        $data["productSkus"] = $productSkuArray;

        return response()->json($data);
    }

    public function getVendorAddress(Request $request)
    {
        $vendor_id = $request->input('vendorId');
        $vendor = User::with('UserAddress')->where('id', $vendor_id)->first();

        return response()->json($vendor);

//        dd($vendor);
    }

    public function poListAjax(Request $request)
    {
        $totalData = 0;

        $columns = array(
            0 => 'purchase_orders.id',
            1 => 'purchase_orders.po_no',
            2 => 'id',
            3 => 'id',
            4 => 'id',
            5 => 'id',
            6 => 'id',
            7 => 'id',
            8 => 'id',
        );

        $limit = $request->input('length');
        $start = $request->input('start');
        $dir = $request->input('order.0.dir') ?? "desc";
        $order = $columns[$request->input('order.0.column')];

        $PoQuery = PurchaseOrder::query();

        if (!empty($request['startDate']) && !empty($request['endDate'])) {
            $startDate = date('Y-m-d', strtotime($request['startDate']));
            $endDate = date('Y-m-d', strtotime($request['endDate']));
            $PoQuery->whereBetween('purchase_orders.po_date', [$startDate, $endDate]);
        }

        if (!empty($request->input('search.value'))) {
            $search = $request->input('search.value');

            $PoQuery->where(function ($query) use ($search) {
                $query->where('po_no', 'LIKE', "%{$search}%");
            });
            $totalFiltered = count($PoQuery->get());
            $allPos = $PoQuery->get();
            $PoQuery->offset($start)->limit($limit);
        } else {
            $totalFiltered = count($PoQuery->get());
            $allPos = $PoQuery->get();
            $PoQuery->offset($start)->limit($limit);

            if ($totalFiltered <= 0) {
                $totalFiltered = $totalData;
            }
        }

        $PoQuery->orderBy($order, $dir);

        $Pos = $PoQuery->get();

        $result = [];

        if ($Pos != null) {
            $num = count($allPos);
            $num = $num - $start;
            foreach ($Pos as $Po) {
//                dd();
                $companyHtml = "";
                if (!empty($Po->company->CompanyName)) {
                    $companyHtml .= '<div class="d-flex justify-content-start align-items-center">
                                          <div class="avatar-wrapper">
                                            <div class="avatar me-2"><span
                                                class="avatar-initial rounded-circle bg-label-info">' . substr($Po->company->CompanyName ?? '-', 0, 2) . '</span>
                                            </div>
                                          </div>
                                          <div class="d-flex flex-column"><span
                                              class="fw-medium small">' . ($Po->company->CompanyName ?? '') . '</span>
                                          </div>
                                    </div>';
                } else {
                    $companyHtml .= '<span class="badge rounded bg-label-danger">-</span>';
                }

                $Address = "";
//                dd($Po->shipAddress);
                if (!empty($Po->shipAddress->ShipAddLine1)) {
                    $Address .= '<div class="d-flex justify-content-start align-items-center">
                                    <div class="d-flex flex-column">
                                        <span class="fw-medium">
                                        ' . $Po->shipAddress->ShipAddLine1 . '
                                        </span>
                                    </div>
                                </div>';
                } else {
                    $Address .= '<span class="badge rounded bg-label-danger">-</span>';
                }
                if (isset($Po->vendor) && $Po->vendor->role == "Vendor") {
                    $vendorPersonName = $Po->vendor->name;
                    $vendorAvatar = substr($Po->vendor->name, 0, 2);
                } else {
                    $vendorPersonName = "-";
                    $vendorAvatar = "-";
                }

                $vendor = "";

                $vendor = '<div class="d-flex justify-content-start align-items-center">
                                    <div class="avatar-wrapper">
                                        <div class="avatar me-2">
                                            <span class="avatar-initial rounded-circle bg-label-primary">
                                            ' . $vendorAvatar . '
                                            </span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="fw-medium small">
                                        ' . $vendorPersonName . '
                                        </span>
                                    </div>
                                </div>';

                $PoNo = '<span class="badge rounded bg-label-primary m-1">' . ($Po->po_no ?? '-') . '</span>';


                $productNames = '';
                $unitPrices = '';
                $totalQtys = '';
                $taxAmounts = '';

                if (!empty($Po->purchaseOrderItem)) {
                    foreach ($Po->purchaseOrderItem as $POItem) {
                        $productNames .= '<span class="badge rounded bg-label-warning m-1">' . ($POItem->product->product_name ?? '-') . '</span>';
                        $unitPrices .= '<span class="badge rounded bg-label-info m-1">' . ($POItem->unit_price ?? '-') . '</span>';
                        $totalQtys .= '<span class="badge rounded bg-label-dark m-1">' . ($POItem->total_quantity ?? '-') . '</span>';
                        $taxAmounts .= '<span class="badge rounded bg-label-primary m-1">' . ($POItem->tax_amount) . '</span>';
                    }
                } else {
                    $productNames = '<span class="badge rounded bg-label-warning m-1">-</span>';
                    $unitPrices = '<span class="badge rounded bg-label-info m-1">-</span>';
                    $totalQtys = '<span class="badge rounded bg-label-dark m-1">-</span>';
                    $taxAmounts = '<span class="badge rounded bg-label-primary m-1">-</span>';
                }

                $actionHtml = "";

//                $actionHtml .= ' <a class="btn btn-icon btn-label-primary mt-1 waves-effect mx-1"
//                 href="' . route('po-edit', $Po->id) . '"><i
//                 class="ti ti-edit mx-2 ti-sm"></i></a>';

                $actionHtml .= ' <button type="button" class="btn btn-icon mt-1 btn-label-danger mx-1"
                onclick="daletePo(' . $Po->id . ')"><i class="ti ti-trash ti-sm"></i></button>';

                $result[] = array($num, $companyHtml, $Address, $vendor, $PoNo, $productNames, $unitPrices, $totalQtys, $taxAmounts, $actionHtml);
                $num--;
            }
        }

        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalFiltered),
            "recordsFiltered" => intval($totalFiltered),
            "data" => array_values($result)
        );
        echo json_encode($json_data);
    }
}
