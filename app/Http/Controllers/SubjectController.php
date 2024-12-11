<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        return view('subjects', [
            'subjects' => Subject::all()
        ]);
    }

    public function show($id)
    {
        $subject = Subject::with('tutors.user')->findOrFail($id);
        return view('subject', [
            'subject' => $subject
        ]);
    }
}
