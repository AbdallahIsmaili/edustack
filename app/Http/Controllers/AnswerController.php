<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AnswerController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'picture' => 'image|max:2048',
        ]);

        try {
            $answer = Answer::create([
                'user_id' => $request->user_id,
                'question_id' => $request->question_id,
                'body' => $request->body,
            ]);

            if ($request->hasFile('picture')) {
                $file = $request->file('picture');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('public/images/uploads/answers', $filename);
                $url = Storage::url($path);
                $answer->url = $url;
                $answer->save();
            }

            return redirect()->route('questions.show', ['id' => $request->question_id])->with('success', 'Your answer has been submitted.');

        } catch (\Exception $e) {
            // Log the error message to the error log
            Log::error('Error: ' . $e->getMessage());

            // Display a friendly error message to the user
            return redirect()->back()->with('error', 'An error occurred while submitting your answer. Please try again later.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
