<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

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

        return view('index', compact('subjects'));
    }

    public function getSubject($name)
    {
        $subject = Subject::where('name', $name)->firstOrFail();
        $subjects = Subject::all();
        
        $wantedSubjects = Subject::where('name', $name)->get();
        return view('subjects.subject', compact('subject', 'subjects', 'wantedSubjects'));
    }

}
