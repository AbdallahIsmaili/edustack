<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $subjects = Subject::all();
        return view('admin.pages.analytics.subjects', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.analytics.add-subject');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subject = Subject::create([
            'name' => $request->subject_name,
            'description' => $request->subject_desc
        ]);

        return redirect()
            ->route('subjects.create')
            ->with('success', 'Cool the new subject ' . $subject->name . ' created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        //
    }

    public function disable($id)
    {
        $subject = Subject::find($id);
        $subject->is_active = false;
        $subject->save();

        return redirect()->back();
    }

    public function enable($id)
    {
        $subject = Subject::find($id);
        $subject->is_active = true;
        $subject->save();

        return redirect()->back();
    }

}
