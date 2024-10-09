<?php

namespace App\Http\Controllers;

use App\Models\StoreGenerate;
use App\Http\Requests\StoreStoreGenerateRequest;
use App\Http\Requests\UpdateStoreGenerateRequest;
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
        return view('content.master.store.storeGenerate.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoreGenerateRequest $request)
    {
//        dd($request->all());

        DB::beginTransaction();

        $storeGenerate = new StoreGenerate([
//            'store_type_id'=> $request->store_type,
            'store_type_id'=> 1,
            'store_name' => $request->store_name,
            'store_code'=> $request->store_code,
            'store_rating'=> $request->store_rating,
            'store_city'=> $request->store_city,
            'store_state'=> $request->store_state,
            'store_pincode'=> $request->store_pincode,
            'store_address'=> 'test Address',
            'store_area'=> $request->store_area,
            'manager_name'=> $request->manager_name,
            'manager_number'=> $request->manager_number,
            'manager_email'=> $request->manager_email,
            'store_payment_type' => $request->store_payment_type,
        ]);

        $storeGenerate->save();

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

            $manager = $store->manager_name;

            $action =
                ' <a href="storeGenerate/' . $store->id . '/edit" title="Edit" class="btn btn-icon btn-label-primary mx-1"><i class="ti ti-edit mx-2 ti-sm"></i></a>
            <button onclick="deleteBlog(' .
                $store->id .
                ')" title="Delete" class="btn btn-icon btn-label-danger mx-1"><i class="ti ti-trash mx-2 ti-sm"></i></button>';

            array_push($result['data'], [$num, $name, $code, $type, $manager, $action]);
            $num++;

        }
        return response()->json($result);
    }
}
