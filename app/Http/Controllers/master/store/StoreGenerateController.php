<?php

namespace App\Http\Controllers\master\store;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStoreGenerateRequest;
use App\Http\Requests\UpdateStoreGenerateRequest;
use App\Models\Category;
use App\Models\Commercial;
use App\Models\InventoryDetail;
use App\Models\StoreAttachment;
use App\Models\StoreGenerate;
use App\Models\StoreType;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;

class StoreGenerateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.master.store.storeGenerate.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $storeTypes = StoreType::get();
        $categories = Category::get();
        return view('content.master.store.storeGenerate.create', compact('storeTypes', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoreGenerateRequest $request)
    {
//        dd($request->all());

        DB::beginTransaction();

        $storeGenerate = new StoreGenerate([
            'store_type_id' => $request->store_type,
            'op_date' => $request->op_date,
            'store_name' => $request->store_name,
            'store_code' => $request->store_code,
            'store_status' => $request->store_status,
            'format' => $request->format_name,
            'firm' => $request->firm,
            'gst' => $request->gst,
            'store_phone' => $request->store_phone,
            'store_email' => $request->store_email,
            'store_address_1' => $request->store_add_line_1,
            'store_address_2' => $request->store_add_line_2,
            'store_state' => $request->store_state,
            'store_city' => $request->store_city,
            'store_pincode' => $request->store_pincode,
            'store_area' => $request->store_area,
            'map_link' => $request->map_link,
            'franchise_name' => $request->franchise_name,
            'franchise_phone' => $request->franchise_phone,
            'franchise_email' => $request->franchise_email,
            'datanote_name' => $request->datanote_name,
            'seller_ware_1' => $request->seller_ware_1,
            'seller_ware_2' => $request->seller_ware_2,
        ]);

        $storeGenerate->save();

        $id = $storeGenerate->id;

        $commercial = new Commercial([
            'store_id' => $id,
            'sba_sqft' => $request->sba_sqft,
            'ca_sqft' => $request->ca_sqft,
            'store_rating' => $request->store_rating,
            'commercial_model' => $request->commercial_model,
            'margin' => $request->margin,
            'add_support' => $request->add_support,
            'security_deposit' => $request->security_deposit,
            'capex' => $request->capex,
            'rent' => $request->rent,
            'bep' => $request->bep,
            'mf' => $request->mf,
            'mf_percent' => $request->mf_percent,
            'asm' => $request->asm,
        ]);

        $commercial->save();

        $inventoryDetails = new InventoryDetail([
            'store_id' => $id,
            'store_manager' => $request->store_manager,
            'store_manager_phone' => $request->store_manager_phone,
            'store_manager_email' => $request->store_manager_email,
        ]);

        $inventoryDetails->save();

//        dd($request->loi);

        $path = public_path('/storeAttachment/' . $id . '/');

        if (!is_dir(public_path('/storeAttachment/'))) {
            mkdir(public_path('/storeAttachment/'), 0755, true);
        }

        $loi = $request->loi->getClientOriginalName();
        $loi_extention = $request->loi->getClientOriginalExtension();
        $loiName = $id . '_loi_' . date('md') . '.' . $loi_extention;


        $request->loi->move($path, $loiName);


        $agreement = $request->agreement->getClientOriginalName();
        $agreement_extention = $request->agreement->getClientOriginalExtension();
        $agreementName = $id . '_agreement_' . date('md') . '.' . $agreement_extention;

        $request->agreement->move($path, $agreementName);


        $architectureDraw = $request->architecture_draw->getClientOriginalName();
        $architectureDraw_extention = $request->architecture_draw->getClientOriginalExtension();
        $architectureDrawName = $id . '_architecture_' . date('md') . '.' . $architectureDraw_extention;

        $request->architecture_draw->move($path, $architectureDrawName);


        $photograph = $request->photo->getClientOriginalName();
        $photograph_extention = $request->photo->getClientOriginalExtension();
        $photographName = $id . '_photograph_' . date('md') . '.' . $photograph_extention;

        $request->photo->move($path, $photographName);


        $aadhar = $request->aadhar_file->getClientOriginalName();
        $aadhar_extention = $request->aadhar_file->getClientOriginalExtension();
        $aadharName = $id . '_aadhar_' . date('md') . '.' . $aadhar_extention;

        $request->aadhar_file->move($path, $aadharName);


        $pan = $request->pan_file->getClientOriginalName();
        $pan_extention = $request->pan_file->getClientOriginalExtension();
        $panName = $id . '_panCard_' . date('md') . '.' . $pan_extention;

        $request->pan_file->move($path, $panName);


        $gst = $request->gst_file->getClientOriginalName();
        $gst_extention = $request->gst_file->getClientOriginalExtension();
        $gstName = $id . '_gst_' . date('md') . '.' . $gst_extention;

        $request->gst_file->move($path, $gstName);

        $attachments = new StoreAttachment([
            'store_id' => $id,
            'loi' => $loiName,
            'agreement' => $agreementName,
            'architecture_draw' =>$architectureDrawName,
            'photo' => $photographName,
            'aadhar_file' =>$aadharName,
            'pan_file' => $panName,
            'gst_file' => $gstName,
        ]);
//        dd($attachments);

        $attachments->save();
//        dd(1);

        DB::commit();

        return response()->json(['status' => 'success', 'message' => 'Data stored successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(StoreGenerate $storeGenerate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StoreGenerate $storeGenerate)
    {
        return view('content.master.store.storeGenerate.edit', compact('storeGenerate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoreGenerateRequest $request, StoreGenerate $storeGenerate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StoreGenerate $storeGenerate)
    {
        //
    }

    public function getAllStoreData()
    {
        $allStore = StoreGenerate::get();

        $result = array('data' => []);
        $num = 1;

        foreach ($allStore as $store) {


            $name = $store->store_name;

            $code = $store->store_code;

            $type = $store->storeType->store_type;


            $action =
                ' <a href="storeGenerate/' . $store->id . '/edit" title="Edit" class="btn btn-icon btn-label-primary mx-1"><i class="ti ti-edit mx-2 ti-sm"></i></a>
            <button onclick="deleteBlog(' .
                $store->id .
                ')" title="Delete" class="btn btn-icon btn-label-danger mx-1"><i class="ti ti-trash mx-2 ti-sm"></i></button>';

            array_push($result['data'], [$num, $name, $code, $type, $action]);
            $num++;

        }
        return response()->json($result);
    }

    public function baseStock()
    {
        $categories = Category::get();
        $subCategories = SubCategory::get();

        return view('content.master.store.storeGenerate.baseStock', compact('categories', 'subCategories'));
    }
}
