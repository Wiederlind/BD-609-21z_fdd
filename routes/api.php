<?php

use App\Http\Controllers\UserControllerApi;
use App\Http\Controllers\TutorControllerApi;
use App\Http\Controllers\SubjectControllerApi;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/logout', [AuthController::class, 'logout']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::get('/users', [UserControllerApi::class, 'index']);
    Route::get('/users/{id}', [UserControllerApi::class, 'show']);

    Route::get('/tutors', [TutorControllerApi::class, 'index']);
    Route::get('/tutors/{id}', [TutorControllerApi::class, 'show']);

    Route::get('/subjects', [SubjectControllerApi::class, 'index']);
    Route::get('/subjects/{id}', [SubjectControllerApi::class, 'show']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
