<?php

namespace App\Http\Controllers\master\basicInfo;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagsRequest;
use App\Http\Requests\UpdateTagsRequest;
use App\Models\Tags;
use Illuminate\Support\Facades\Gate;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tags::all();
        return view('content.master.basicInfo.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.master.basicInfo.tags.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagsRequest $request)
    {

        Tags::create($request->validated());

        return redirect()->route('tags.index')->with('success', 'Tag Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tags $tags)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tags $tag)
    {
//        dd($tag);
        $tag = Tags::where('id', $tag->id)->first();
        return view('content.master.basicInfo.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagsRequest $request, Tags $tag)
    {
        $tag->update($request->validated());
//
        return redirect()->route('tags.index')->with('success', 'Tags updated.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tags $tags)
    {
        if(Gate::allows('delete', $tags)){
            $tags->delete();
        }

        return redirect()->route('tags.index')->with('success', 'Tags Deleted.');
    }

    public function getTagData()
    {
        $allTags = Tags::all();

//        dd($allBrands);
        $num = 1;
        $result = ['data' => []];
        foreach ($allTags as $tag) {

            $id = $tag->id;
            $name = $tag->name;

            $action =
                ' <a href="tags/' . $id . '/edit" title="Edit" class="btn btn-icon btn-label-primary mx-1"><i class="ti ti-edit mx-2 ti-sm"></i></a>
            <button onclick="daleteTag(' .
                $tag->id .
                ')" title="Delete" class="btn btn-icon btn-label-danger mx-1"><i class="ti ti-trash mx-2 ti-sm"></i></button>';
            array_push($result['data'], [$num, $name, $action]);
            $num++;
        }
        echo json_encode($result);
    }
}
