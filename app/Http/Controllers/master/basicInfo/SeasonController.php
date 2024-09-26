<?php

namespace App\Http\Controllers\master\basicInfo;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSeasonRequest;
use App\Http\Requests\UpdateSeasonRequest;
use App\Models\Season;
use Illuminate\Support\Facades\Gate;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seasons = Season::all();
        return view('content.master.basicInfo.season.index', compact('seasons'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.master.basicInfo.season.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSeasonRequest $request)
    {
        Season::create($request->validated());

        return redirect()->route('season.index')->with('success', 'Season created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Season $season)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Season $season)
    {
        $seasons = Season::where('id',$season->id)->first();
        return view('content.master.basicInfo.season.edit', compact('seasons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSeasonRequest $request, Season $season)
    {
        $season->update($request->validated());

        return redirect()->route('season.index')->with('success', 'Season updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Season $season)
    {
        if (Gate::allows('delete', $season)) {
            $season->delete();
        }

        return redirect()->route('season.index')->with('success', 'Season deleted.');
    }

    public function getSeasonData()
    {
        $allSeasons = Season::all();

//        dd($allBrands);
        $num = 1;
        $result = ['data' => []];
        foreach ($allSeasons as $season) {

            $id = $season->id;
            $name = $season->name;

            $action =
                ' <a href="season/' . $id . '/edit" title="Edit" class="btn btn-icon btn-label-primary mx-1"><i class="ti ti-edit mx-2 ti-sm"></i></a>
            <button onclick="deleteSeason(' .
                $season->id .
                ')" title="Delete" class="btn btn-icon btn-label-danger mx-1"><i class="ti ti-trash mx-2 ti-sm"></i></button>';
            array_push($result['data'], [$num, $name, $action]);
            $num++;
        }
        echo json_encode($result);

        // return view('tour.create', compact('navSubCategory', 'navCategory'));
    }
}
