<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubjectController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tutors', [TutorController::class, 'index']);
Route::get('/tutors/{id}', [TutorController::class, 'show']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);

Route::get('/subjects/{id}', [SubjectController::class, 'show']);
Route::get('/subjects', [SubjectController::class, 'index']);
