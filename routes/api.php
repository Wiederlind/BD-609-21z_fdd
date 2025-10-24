<?php

use App\Http\Controllers\UserControllerApi;
use App\Http\Controllers\TutorControllerApi;
use App\Http\Controllers\SubjectControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserControllerApi::class, 'index']);
Route::get('/users/{id}', [UserControllerApi::class, 'show']);

Route::get('/tutors', [TutorControllerApi::class, 'index']);
Route::get('/tutors/{id}', [TutorControllerApi::class, 'show']);

Route::get('/subjects', [SubjectControllerApi::class, 'index']);
Route::get('/subjects/{id}', [SubjectControllerApi::class, 'show']);
