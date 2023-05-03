<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Controllers\SubjectController;
use Illuminate\Http\Request;

class CreateSubjectForm extends Component
{
    public $title;
    public $description;

    public function render()
    {
        return view('livewire.create-subject-form');
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        // Call the store method in the SubjectController
        app(SubjectController::class)->store();

        // Clear form fields
        $this->title = '';
        $this->description = '';

        // Redirect to a success page or perform any other actions
        return redirect()->route('subjects.index')->with('success', 'Subject created successfully!');
    }
};
