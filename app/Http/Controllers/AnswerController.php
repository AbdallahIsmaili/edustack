<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Upvote;
use App\Models\Downvote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

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
    public function upvote(Request $request)
    {
        $answerId = $request->input('answer_id');
        $answer = Answer::find($answerId);

        if ($answer) {
            $user = Auth::user();

            // Check if the user has already upvoted
            $existingUpvote = Upvote::where('answer_id', $answerId)
                ->where('user_id', $user->id)
                ->first();

            if ($existingUpvote) {
                // User already upvoted, remove their upvote
                $existingUpvote->delete();
                $answer->decrement('up_votes');

            } else {
                // User hasn't upvoted, add their upvote
                $upvote = new Upvote();
                $upvote->answer_id = $answerId;
                $upvote->user_id = $user->id;
                $upvote->save();

                $answer->increment('up_votes');

                // If the user has already downvoted, remove their downvote
                $existingDownvote = Downvote::where('answer_id', $answerId)
                    ->where('user_id', $user->id)
                    ->first();

                if ($existingDownvote) {
                    $existingDownvote->delete();
                    $answer->decrement('down_votes');
                }
            }
        }

        return redirect()->back()->with('voted', 'Your vote has been recorded.');
    }

    public function downvote(Request $request)
    {
        $answerId = $request->input('answer_id');
        $answer = Answer::find($answerId);

        if ($answer) {
            $user = Auth::user();

            // Check if the user has already downvoted
            $existingDownvote = Downvote::where('answer_id', $answerId)
                ->where('user_id', $user->id)
                ->first();

            if ($existingDownvote) {
                // User already downvoted, remove their downvote
                $existingDownvote->delete();
                $answer->decrement('down_votes');
            } else {
                // User hasn't downvoted, add their downvote
                $downvote = new Downvote();
                $downvote->answer_id = $answerId;
                $downvote->user_id = $user->id;
                $downvote->save();

                $answer->increment('down_votes');

                // If the user has already upvoted, remove their upvote
                $existingUpvote = Upvote::where('answer_id', $answerId)
                    ->where('user_id', $user->id)
                    ->first();

                if ($existingUpvote) {
                    $existingUpvote->delete();
                }
            }
        }

        return redirect()->back()->with('voted', 'Your vote has been recorded.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
