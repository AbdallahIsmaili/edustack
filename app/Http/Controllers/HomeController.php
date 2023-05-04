<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Tag;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $subjects = Subject::all();
        $tags = Tag::all();

        return view('index', compact('subjects', 'tags'));
    }

    public function getSubject($name)
    {
        $subject = Subject::where('name', $name)->firstOrFail();
        $questions = $subject->questions()->latest()->get();
        $subjects = Subject::all();

        return view('subjects.subject', compact('subject', 'questions', 'subjects'));
    }


    public function getTag($name)
    {
        $tag = Tag::where('name', $name)->firstOrFail();
        $questions = $tag->questions()->latest()->get();
        $tags = Tag::all();

        $wantedTag = Tag::where('name', $name)->get();
        return view('tags.tag', compact('tag', 'tags', 'questions'));
    }

}
