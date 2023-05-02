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
    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('admin.pages.analytics.edit-subject', compact('subject'));
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
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);

        // Delete the subject from the database
        $subject->delete();

        // Redirect to the index page with a success message
        return redirect()->route('subjects.index')->with('success', 'Done, the subject ' . $subject->name . ' deleted successfully!');
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
