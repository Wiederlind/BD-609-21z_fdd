<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutor;

class TutorController extends Controller
{
    public function index()
    {
        $tutors = Tutor::with(['user', 'subject'])->get();
        return view('tutors', [
            'tutors' => $tutors
        ]);
    }

    public function show($id)
    {
        return view('tutor', [
            'tutor' => Tutor::findOrFail($id)
        ]);
    }
}
