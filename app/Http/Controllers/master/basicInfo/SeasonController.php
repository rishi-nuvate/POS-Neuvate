<?php

namespace App\Http\Controllers\master\basicInfo;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSeasonRequest;
use App\Http\Requests\UpdateSeasonRequest;
use App\Models\Season;

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Season $season)
    {
        //
    }
}
