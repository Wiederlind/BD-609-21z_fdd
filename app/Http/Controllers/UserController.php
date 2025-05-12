<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // public function index()
    // {
    //     return view('users', [
    //         'users' => User::all()
    //     ]);
    // }

    public function index(Request $request)
    {
        $perpage = $request->input('perpage', 10);
        return view('users', [
            'users' => User::paginate($perpage)->withQueryString()
        ]);
    }

    public function show($id)
    {
        return view('user', [
            'user' => User::findOrFail($id)
        ]);
    }
}
