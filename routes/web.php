<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tutors/create', [TutorController::class, 'create'])->name('tutors.create')->middleware('auth');
Route::post('/tutors', [TutorController::class, 'store'])->name('tutors.store');
Route::get('/tutors', [TutorController::class, 'index'])->name('tutors.index');
Route::get('/tutors/{id}', [TutorController::class, 'show'])->name('tutors.show');
Route::get('/tutors/{id}/edit', [TutorController::class, 'edit'])->name('tutors.edit')->middleware('auth');
Route::put('/tutors/{id}/update', [TutorController::class, 'update'])->name('tutors.update')->middleware('auth');
Route::get('/tutors/{id}/destroy', [TutorController::class, 'destroy'])->name('tutors.destroy')->middleware('auth');

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);

Route::get('/subjects/{id}', [SubjectController::class, 'show']);
Route::get('/subjects', [SubjectController::class, 'index']);

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/auth', [LoginController::class, 'authenticate'])->name('auth');

Route::get('/error', function () {
    return view('error', ['message' => session('message')]);
});
