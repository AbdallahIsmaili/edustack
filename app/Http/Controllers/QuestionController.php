<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use App\Models\Question;
use App\Models\Tag;
use App\Models\Subject;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $subjects = Subject::all();
        $tags = Tag::all();

        return view('user.ask', compact('subjects', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id', // Check that all tags exist in the database
            'picture' => 'image|max:2048', // Validate the uploaded image file
        ]);

        $question = Question::create([
            'user_id' => auth()->user()->id,
            'subject_id' => $validated['subject_id'],
            'title' => $validated['title'],
            'body' => $request->body,
        ]);

        if ($validated['tags']) {
            $tags = Tag::find($validated['tags']);
            $question->tags()->attach($tags);
        }

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/images/uploads/questions', $filename);
            $url = Storage::url($path);
            $question->url = $url;
            $question->save();
        }

        return redirect()->route('question.create')->with('success', 'Your question has been submitted.');
    }





    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
