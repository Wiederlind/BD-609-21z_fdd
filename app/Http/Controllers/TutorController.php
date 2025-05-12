<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutor;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Support\Facades\Gate;

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

    public function create()
    {
        if (!Gate::allows('create-tutor')) {
            return redirect('/error')->with('message', 'У вас нет разрешения на создание репетитора');
        }
        $users = User::all();
        $subjects = Subject::all();
        return view('tutor_create', compact('users', 'subjects'));
    }

    public function edit($id)
    {
        if (!Gate::allows('update-tutor', Tutor::findOrFail($id))) {
            return redirect('/error')->with('message', 'У вас нет разрешения на редактирование');
        }
        $tutor = Tutor::findOrFail($id);
        $users = User::all();
        $subjects = Subject::all();
        return view('tutor_edit', compact('tutor', 'users', 'subjects'));
    }

    public function destroy($id)
    {
        if (!Gate::allows('destroy-tutor', Tutor::findOrFail($id))) {
            return redirect('/error')->with('message', 'У вас нет разрешения на удаление');
        }
        $tutor = Tutor::findOrFail($id);
        $tutor->delete();

        $user = User::find($tutor->user_id);
        $user->is_tutor = 0;
        $user->save();

        return redirect('/tutors');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'subject_id' => 'required|integer|exists:subjects,id',
            'bio' => 'required|string',
            'price' => 'required|integer',
        ]);

        $tutor = Tutor::findOrFail($id);
        $tutor->update($validatedData);

        $user = User::find($validatedData['user_id']);
        $user->is_tutor = 1;
        $user->save();

        return redirect('/tutors');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'subject_id' => 'required|integer|exists:subjects,id',
            'bio' => 'required|string',
            'price' => 'required|integer',
        ]);

        Tutor::create($validatedData);

        $user = User::find($validatedData['user_id']);
        $user->is_tutor = 1;
        $user->save();

        return redirect('/tutors');
    }
}
