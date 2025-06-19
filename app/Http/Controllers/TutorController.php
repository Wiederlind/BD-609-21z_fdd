<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutor;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class TutorController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $perpage = $request->input('perpage', 10);
        $tutors = Tutor::with(['user', 'subject'])->paginate($perpage)->appends(['perpage' => $perpage]);
        // $tutors = Tutor::with(['user', 'subject'])->paginate($perpage);
        return view('tutors', [
            'tutors' => $tutors,
            'user' => $user
        ]);
    }

    public function show($id)
    {
        $user = Auth::user();
        return view('tutor', [
            'tutor' => Tutor::findOrFail($id),
            'user' => $user
        ]);
    }

    public function create()
    {
        if (!Gate::allows('create-tutor')) {
            return redirect('/tutors')->with('access_denied', 'У вас нет разрешения на создание');
        }
        $users = User::all();
        $subjects = Subject::all();
        return view('tutor_create', compact('users', 'subjects'));
    }

    public function edit($id)
    {
        if (!Gate::allows('update-tutor', Tutor::findOrFail($id))) {
            return redirect('/tutors')->with('access_denied', 'У вас нет разрешения на редактирование');
        }
        $tutor = Tutor::findOrFail($id);
        $users = User::all();
        $subjects = Subject::all();
        return view('tutor_edit', compact('tutor', 'users', 'subjects'));
    }

    public function destroy($id)
    {
        if (!Gate::allows('destroy-tutor', Tutor::findOrFail($id))) {
            return redirect('/tutors')->with('access_denied', 'У вас нет разрешения на удаление');
        }
        $tutor = Tutor::findOrFail($id);
        $tutor->delete();

        $user = User::find($tutor->user_id);
        $user->is_tutor = 0;
        $user->save();

        return redirect('/tutors')->with('success', 'Запись успешно удалена');
    }

    public function update(Request $request, $id)
    {
        if (!Gate::allows('update-tutor', Tutor::findOrFail($id))) {
            return redirect('/tutors')->with('access_denied', 'У вас нет разрешения на редактирование');
        }
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

        return redirect('/tutors')->with('success', 'Данные изменены');
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

        return redirect('/tutors')->with('success', 'Запись создана');
    }

    public function cards(Request $request)
    {
        $subjectId = $request->input('subject_id');
        $perpage = $request->input('perpage', 9);

        $query = Tutor::with(['user', 'subject']);

        if ($subjectId) {
            $query->where('subject_id', $subjectId);
        }

        $tutors = $query->paginate($perpage)->appends(['subject_id' => $subjectId, 'perpage' => $perpage]);

        $subjects = Subject::all();

        return view('tutors_cards', compact('tutors', 'subjects', 'perpage'));
    }
}
