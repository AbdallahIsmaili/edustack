<?php

namespace App\Http\Controllers;

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
        $subjects = Subject::all();

        $wantedSubject = Subject::where('name', $name)->get();
        return view('subjects.subject', compact('subject', 'subjects', 'wantedSubject'));
    }

    public function getTag($name)
    {
        $tag = Tag::where('name', $name)->firstOrFail();
        $tags = Tag::all();

        $wantedTag = Tag::where('name', $name)->get();
        return view('tags.tag', compact('tag', 'tags', 'wantedTag'));
    }

}
