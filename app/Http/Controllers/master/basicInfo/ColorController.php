<?php

namespace App\Http\Controllers\master\basicInfo;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\UpdateColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.master.basicInfo.color.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.master.basicInfo.color.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreColorRequest $request)
    {
        DB::beginTransaction();

        $color = new Color([
            'color' => $request->color,
        ]);

        $color->save();

        DB::commit();

        return redirect()->route('color.index')->with('success', 'Color Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        return view('content.master.basicInfo.color.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateColorRequest $request, Color $color)
    {
        DB::beginTransaction();

        $color->update([
            'color' => $request->color,
        ]);

        DB::commit();

        return redirect()->route('color.index')->with('success', 'Color Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        Gate::allows('delete', $color);

        DB::beginTransaction();

        $color->delete();

        DB::commit();

        return redirect()->route('color.index')->with('success', 'Color Deleted Successfully');
    }

    public function getColorData(Request $request)
    {

        $colors = Color::all();

        $result = ['data' => array()];
        $num = 1;
        foreach ($colors as $color) {

            $id = $color->id;

            $action = ' <a href="color/' . $id . '/edit" title="Edit" class="btn btn-icon btn-label-primary mx-1"><i class="ti ti-edit mx-2 ti-sm"></i></a>
            <button onclick="deleteColor(' .
                $color->id .
                ')" title="Delete" class="btn btn-icon btn-label-danger mx-1"><i class="ti ti-trash mx-2 ti-sm"></i></button>';

            array_push($result['data'], [$num, $color->color,$action]);
            $num++;
        }

        echo json_encode($result);

    }
}
