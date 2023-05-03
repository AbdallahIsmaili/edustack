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
        $subjectsCount = $subjects->count();

        return view('admin.pages.analytics.subjects', compact('subjects', 'subjectsCount'));
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
        $this->validate($request, [
            'subject_name' => 'required',
            'subject_desc' => 'required',
        ]);

        // Store subject in the database
        $subject = Subject::create([
            'name' => $request->subject_name,
            'description' => $request->subject_desc
        ]);

        // Redirect to a success page or perform any other actions
        return redirect()->route('subjects.index')->with('success', 'Cool the new subject ' . $subject->name . ' created successfully!');
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
    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);
        $subject->name = $request->subject_name;
        $subject->description = $request->subject_desc;
        $subject->save();

        return redirect()->route('subjects.index')->with('success', 'Awesome, the subject ' . $subject->name . ' updated successfully!');
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
        $subject = Subject::findOrFail($id);
        $subject->is_active = false;
        $subject->save();

        return redirect()->back();
    }


    public function enable($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->is_active = true;
        $subject->save();

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $subjects = Subject::all();
        $subjectsCount = $subjects->count();

        $searchTerm = $request->input('searchTerm');
        $searchedSubjects = Subject::where('name', 'like', '%' . $searchTerm . '%')->orWhere('id', $searchTerm)->get();

        return view('admin.pages.analytics.subjects', compact('searchedSubjects', 'subjects', 'subjectsCount'));
    }

}
