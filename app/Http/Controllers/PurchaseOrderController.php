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
//        $request->validate([
//            'company' => 'required|exists:companies,id',
//            'shippingAddress' => 'required|exists:company_ship_addresses,id',
//            'vendor' => 'required|exists:users,id',
//            'product_id' => 'required',
//            'unitPrice' => 'required',
//            'tax' => 'required',
//        ]);
//        dd($request->all());
        if (!empty($request->vendor) && !empty($request->company) && !empty($request->shippingAddress) && !empty($request->poNumber)) {
            $Po = new PurchaseOrder([
                'user_id' => $request->vendor,
                'company_id' => $request->company,
                'company_shipping_id' => $request->shippingAddress,
                'po_no' => $request->poNumber,
            ]);

            if ($Po->save()) {
                foreach ($request->product_id as $i => $productId) {
                    $PoItems = new PurchaseOrderItem([
                        'po_id' => $Po->id,
                        'product_id' => $productId,
                        'product_description' => $request->description[$i],
                        'unit_price' => $request->unitPrice[$i],
                        'tax_amount' => $request->tax[$i],
                        'total_quantity' => $request->TotalQty[$i],
                    ]);

                    if ($PoItems->save()) {
                        if (isset($request->sku[$i])) {
                            foreach ($request->sku[$i] as $key => $skuValue) {
                                $PoItemParameters = new PurchaseOrderItemParameter([
                                    'po_id' => $Po->id,
                                    'po_item_id' => $PoItems->id,
                                    'item_sku' => $skuValue,
                                    'item_color' => $request->color[$i][$key],
                                    'item_size' => $request->size[$i][$key],
                                    'item_qty' => $request->quantity[$i][$key],
                                ]);
                                if (!$PoItemParameters->save()) {
                                    return redirect()->route('po.create')->withErrors('Error saving POItemParameters.');
                                }
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
        return redirect()->route('po.create')->withErrors('Validation Failed');
    }

    public function deletePurchaseOrder(Request $request){
        $Po = PurchaseOrder::find($request->PoId);
        $PoItems = PurchaseOrderItem::where('po_id', $request->PoId)->get();
        $PoItemParameters = PurchaseOrderItemParameter::where('po_id', $request->PoId)->get();
        if ($Po) {
            foreach ($PoItems as $PoItem){
                foreach ($PoItemParameters as $PoItemParameter) {
                    if (!$PoItemParameter->delete()) {
                        return response()->json(['success' => false]);
                    }
                }
                if (!$PoItem->delete()) {
                    return response()->json(['success' => false]);
                }
            }
            if ($Po->delete()) {
                return response()->json(['success' => true]);
            }
            return response()->json(['success' => false]);
        }
        return response()->json(['success' => false]);
    }

    public function deletePurchaseOrderItemRow(Request $request){
        $PoItemId = PurchaseOrderItem::find($request->poItemId);
        $PoItemParameters = PurchaseOrderItemParameter::where('po_item_id', $request->poItemId)->get();
        if ($PoItemId){
            foreach ($PoItemParameters as $PoItemParameter){
                    if (!$PoItemParameter->delete()) {
                        return response()->json(['success' => false]);
                    }
            }
            if ($PoItemId->delete()) {
                return response()->json(['success' => true]);
            }
            return response()->json(['success' => false]);
        }
        return response()->json(['success' => false]);
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
    public function edit(PurchaseOrder $purchaseOrder, string $id)
    {
        $Po = PurchaseOrder::with('company', 'shipAddress', 'purchaseOrderItem', 'purchaseOrderItemParameter', 'vendor')
            ->findOrFail($id);
        $PoParameters = PurchaseOrderItemParameter::get();
        $companies = Company::get();
        $shipAddresses = CompanyShipAddress::get();
        $vendors = User::where('role', 'vendor')->get();
        $products = Product::get();
        return view('content.supplyChain.po.edit', compact('Po','companies', 'shipAddresses', 'vendors', 'products', 'PoParameters'));
    }

    public function getSelectedParameters(Request $request){
        $product_id = $request->product_id;
        $po_id = $request->po_id;
        $po_item_id = $request->po_item_id;

        $purchaseOrderItem = PurchaseOrderItem::with( 'purchaseOrderItemParameter')
                            ->where('id', $po_item_id)
                            ->get();

        $data = [];

        $productColorArray = [];
        $productSizeArray = [];
        $productSkuArray = [];
        $productQtyArray = [];
            foreach ($purchaseOrderItem as $PoItem) {
                if ($PoItem->purchaseOrderItemParameter) {
                    foreach ($PoItem->purchaseOrderItemParameter as $Parameter) {
                        $productColorArray[] = $Parameter->item_color;
                        $productSizeArray[] = $Parameter->item_size;
                        $productSkuArray[] = $Parameter->item_sku;
                        $productQtyArray[] = $Parameter->item_qty;
                    }
                }
            }

        $data["productColors"] = $productColorArray;
        $data["productSize"] = $productSizeArray;
        $data["productSkus"] = $productSkuArray;
        $data["productQty"] = $productQtyArray;

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePurchaseOrderRequest $request, PurchaseOrder $purchaseOrder)
    {
//        dd($request->all());

        if (!empty($request->vendor) && !empty($request->company) && !empty($request->shippingAddress) && !empty($request->poNumber)) {
            $Po = PurchaseOrder::where('user_id', $request->vendor)
                ->orwhere('company_id', $request->company)
                ->orwhere('id', $request->purchaseOrderId)
                ->first();

            if ($Po) {
                $Po->company_shipping_id = $request->shippingAddress;
                $Po->po_no = $request->poNumber;
                $Po->save();
            } else {
                $Po = new PurchaseOrder([
                    'user_id' => $request->vendor,
                    'company_id' => $request->company,
                    'company_shipping_id' => $request->shippingAddress,
                    'po_no' => $request->poNumber,
                ]);
                $Po->save();
            }
        }else{
            return redirect()->route('po.index')->withErrors('Validation Failed');
        }

            if ($Po->save()) {
                foreach ($request->product_id as $i => $productId) {
                    if (isset($request->poItemId[$i])){
                        $PoItem = PurchaseOrderItem::where('id', $request->poItemId[$i])->first();
                        if ($PoItem) {
                            echo $request->poItemId[$i] . '<br>';

                            $PoItem->product_description = $request->description[$i];
                            $PoItem->unit_price = $request->unitPrice[$i];
                            $PoItem->tax_amount = $request->tax[$i];
                            $PoItem->total_quantity = $request->TotalQty[$i];

                            if (!$PoItem->save()) {
                                return redirect()->route('po.edit')->withErrors('Error updating POItems.');
                            }
                        }
                    } else {
                        $PoItem = new PurchaseOrderItem([
                            'po_id' => $Po->id,
                            'product_id' => $productId,
                            'product_description' => $request->description[$i],
                            'unit_price' => $request->unitPrice[$i],
                            'tax_amount' => $request->tax[$i],
                            'total_quantity' => $request->TotalQty[$i],
                        ]);

                        if (!$PoItem->save()) {
                            return redirect()->route('po.edit')->withErrors('Error saving POItems.');
                        }

                    }
//                    dd($request->sku[$i]);
                    if (isset($request->sku[$i])) {
                        foreach ($request->sku[$i] as $key => $skuValue) {
                            $PoItemParameter = PurchaseOrderItemParameter::where('po_id', $Po->id)
                                ->where('po_item_id', $PoItem->id)
                                ->where('item_sku', $skuValue)
                                ->first();

                            if ($PoItemParameter) {
                                $PoItemParameter->item_color = $request->color[$i][$key];
                                $PoItemParameter->item_size = $request->size[$i][$key];
                                $PoItemParameter->item_qty = $request->quantity[$i][$key];

                                if (!$PoItemParameter->save()) {
                                    return redirect()->route('po.edit')->withErrors('Error updating POItemParameters.');
                                }
                            } else {
                                $PoItemParameter = new PurchaseOrderItemParameter([
                                    'po_id' => $Po->id,
                                    'po_item_id' => $PoItem->id,
                                    'item_sku' => $skuValue,
                                    'item_color' => $request->color[$i][$key],
                                    'item_size' => $request->size[$i][$key],
                                    'item_qty' => $request->quantity[$i][$key],
                                ]);
                                if (!$PoItemParameter->save()) {
                                    return redirect()->route('po.edit')->withErrors('Error saving POItemParameters.');
                                }
                            }
                        }
                    }
                }

                return redirect()->route('po.index')->withSuccess('Successfully Saved');
            } else {
                return redirect()->route('po.edit')->withErrors('Error saving PO.');
            }
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

                $actionHtml .= ' <a class="btn btn-icon btn-label-primary mt-1 waves-effect mx-1"
                 href="' . route('po.edit', $Po->id) . '"><i
                 class="ti ti-edit mx-2 ti-sm"></i></a>';

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
