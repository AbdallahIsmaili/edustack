<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        $tagsCount = $tags->count();

        return view('admin.pages.analytics.tags', compact('tags', 'tagsCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.analytics.add-tag');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tag_name' => 'required',
            'tag_desc' => 'required',
        ]);

        // Store tag in the database
        $tag = Tag::create([
            'name' => $request->tag_name,
            'description' => $request->tag_desc
        ]);

        // Redirect to a success page or perform any other actions
        return redirect()->route('tags.index')->with('success', 'Cool the new tag ' . $tag->name . ' created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('admin.pages.analytics.edit-tag', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->name = $request->tag_name;
        $tag->description = $request->tag_desc;
        $tag->save();

        return redirect()->route('tags.index')->with('success', 'Awesome, the tag ' . $tag->name . ' updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);

        // Delete the subject from the database
        $tag->delete();

        // Redirect to the index page with a success message
        return redirect()->route('tags.index')->with('success', 'Done, the tag ' . $tag->name . ' deleted successfully!');
    }

    public function search(Request $request)
    {
        $tags = Tag::all();
        $tagsCount = $tags->count();

        $searchTerm = $request->input('searchTerm');
        $searchedTags = Tag::where('name', 'like', '%' . $searchTerm . '%')->orWhere('id', $searchTerm)->get();

        return view('admin.pages.analytics.tags', compact('searchedTags', 'tags', 'tagsCount'));
    }

}
