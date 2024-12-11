<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TutorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tutors/create', [TutorController::class, 'create'])->name('tutors.create');
Route::post('/tutors', [TutorController::class, 'store'])->name('tutors.store');
Route::get('/tutors', [TutorController::class, 'index'])->name('tutors.index');
Route::get('/tutors/{id}', [TutorController::class, 'show'])->name('tutors.show');
Route::get('/tutors/{id}/edit', [TutorController::class, 'edit'])->name('tutors.edit');
Route::put('/tutors/{id}/update', [TutorController::class, 'update'])->name('tutors.update');
Route::get('/tutors/{id}/destroy', [TutorController::class, 'destroy'])->name('tutors.destroy');

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);

Route::get('/subjects/{id}', [SubjectController::class, 'show']);
Route::get('/subjects', [SubjectController::class, 'index']);
