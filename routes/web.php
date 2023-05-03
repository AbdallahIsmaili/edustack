<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/subject/{name}', [App\Http\Controllers\HomeController::class, 'getSubject'])->name('getSubject');

Auth::routes();

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('dashboard/subjects', SubjectController::class)->names([
        'index' => 'subjects.index'
    ]);

    Route::put('/subjects/{id}/disable', [SubjectController::class, 'disable'])->name('subjects.disable');

    Route::put('/subjects/{id}/enable', [SubjectController::class, 'enable'])->name('subjects.enable');

    Route::delete('/subjects/{id}/destroy', [SubjectController::class, 'destroy'])->name('subjects.destroy');

    Route::get('/subjects/{id}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');

    Route::get('/subjects', [SubjectController::class, 'search'])->name('subjects.search');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [App\Http\Controllers\UserController::class, 'index'])->name('profile.index');

    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});
