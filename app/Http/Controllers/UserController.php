<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

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

    public function profile()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', Auth::id())->with(['tutor', 'subject', 'review'])->get();
        // dd($orders); // Вывод данных для проверки

        return view('profile', compact('user', 'orders'));
    }
}
