<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Home page route that shows the index page of the application.
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// //Route that shows all the questions posted in the application.
// // Route::get('/questions', [App\Http\Controllers\HomeController::class, 'questions'])->name('questions');

// // Route that shows all the questions in a particular subject.
// Route::get('/subject/{name}', [App\Http\Controllers\HomeController::class, 'getSubject'])->name('getSubject');

// //Route that shows all the questions associated with a particular tag.
// Route::get('/tag/{name}', [App\Http\Controllers\HomeController::class, 'getTag'])->name('getTag');

// Auth::routes();

// Route::middleware(['auth', 'admin'])->group(function () {

//     //Route that shows the dashboard page for authenticated users.
//     Route::get('dashboard', function () {
//         return view('admin.dashboard');
//     })->name('dashboard');

//     // Route that shows the subjects page in the dashboard for admins.
//     Route::resource('dashboard/subjects', SubjectController::class)->names([
//         'index' => 'subjects.index'
//     ]);

//     // Route that shows the tags page in the dashboard for admins.
//     Route::resource('dashboard/tags', TagController::class)->names([
//         'index' => 'tags.index'
//     ]);

//     //Route to disable a subject by admin.
//     Route::put('/subjects/{id}/disable', [SubjectController::class, 'disable'])->name('subjects.disable');

//     //Route to enable a subject by admin.
//     Route::put('/subjects/{id}/enable', [SubjectController::class, 'enable'])->name('subjects.enable');

//     //Route to delete a subject by admin.
//     Route::delete('/subjects/{id}/destroy', [SubjectController::class, 'destroy'])->name('subjects.destroy');

//     //Route to edit a subject by admin.
//     Route::get('/subjects/{id}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');

//     //Route to search for a subject by admin.
//     Route::get('/dashboard/subject', [SubjectController::class, 'search'])->name('subjects.search');

//     //Route to search for a tag by admin.
//     Route::get('/dashboard/tag', [TagController::class, 'search'])->name('tags.search');

// });

// Route::middleware(['auth'])->group(function () {

//     //Route to show the profile page for authenticated users.
//     Route::get('/profile', [App\Http\Controllers\UserController::class, 'index'])->name('profile.index');

//     // Route to log out authenticated users.
//     Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

//     //Route to manage questions
//     Route::resource('/questions', QuestionController::class)->names([
//         'index' => 'questions.index'
//     ]);
// });

//Route that shows the details of a particular question.
// Route::get('/questions/{id}', [App\Http\Controllers\QuestionController::class, 'show'])->name('questions.show');


// Home page route that shows the index page of the application.
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route that shows all the questions.
Route::get('/questions', [App\Http\Controllers\QuestionController::class, 'index'])->name('questions.index');

// Route that shows all the questions in a particular subject.
Route::get('/subjects/{name}/questions', [App\Http\Controllers\HomeController::class, 'getSubject'])->name('subjects.questions');

// Route that shows all the questions associated with a particular tag.
Route::get('/tags/{name}/questions', [App\Http\Controllers\HomeController::class, 'getTag'])->name('tags.questions');


Auth::routes();

Route::middleware(['auth', 'admin'])->group(function () {

    //Route that shows the dashboard page for authenticated users.
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Route that shows the subjects page in the dashboard for admins.
    Route::resource('dashboard/subjects', SubjectController::class)->names([
        'index' => 'subjects.index'
    ]);

    // Route that shows the tags page in the dashboard for admins.
    Route::resource('dashboard/tags', TagController::class)->names([
        'index' => 'tags.index'
    ]);

    //Route to disable a subject by admin.
    Route::put('/subjects/{id}/disable', [SubjectController::class, 'disable'])->name('subjects.disable');

    //Route to enable a subject by admin.
    Route::put('/subjects/{id}/enable', [SubjectController::class, 'enable'])->name('subjects.enable');

    //Route to delete a subject by admin.
    Route::delete('/subjects/{id}/destroy', [SubjectController::class, 'destroy'])->name('subjects.destroy');

    //Route to edit a subject by admin.
    Route::get('/subjects/{id}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');

    //Route to search for a subject by admin.
    Route::get('/dashboard/subject', [SubjectController::class, 'search'])->name('subjects.search');

    //Route to search for a tag by admin.
    Route::get('/dashboard/tag', [TagController::class, 'search'])->name('tags.search');

});

Route::middleware(['auth'])->group(function () {

    //Route to show the profile page for authenticated users.
    Route::get('/profile', [App\Http\Controllers\UserController::class, 'index'])->name('profile.index');

    // Route to log out authenticated users.
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

    //Route to manage questions
    Route::resource('/questions', QuestionController::class)->except(['index', 'show'])->names([
        'create' => 'questions.create',
        'store' => 'questions.store',
        'edit' => 'questions.edit',
        'update' => 'questions.update',
        'destroy' => 'questions.destroy'
    ]);

    //Route to manage answers
    Route::resource('/answers', AnswerController::class)->except(['index', 'show'])->names([
        'create' => 'answers.create',
        'store' => 'answers.store',
        'edit' => 'answers.edit',
        'update' => 'answers.update',
        'destroy' => 'answers.destroy'
    ])->middleware('auth')->names('answers');
});

// Route that shows a question's details.
Route::get('/questions/{id}', [App\Http\Controllers\QuestionController::class, 'show'])->name('questions.show');
