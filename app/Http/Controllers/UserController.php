<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('users', [
            'users' => User::all()
        ]);
    }

    public function show($id)
    {
        return view('user', [
            'user' => User::findOrFail($id)
        ]);
    }
}
