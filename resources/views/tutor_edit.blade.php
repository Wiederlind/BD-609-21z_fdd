@extends('layouts.layout')
@section('content')

<div class="container mt-4">
    <h2 class="mb-4">Редактировать репетитора</h2>
    <form action="{{ route('tutors.update', $tutor->id) }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="user_id" class="form-label">Пользователь</label>
            <select id="user_id" name="user_id" class="form-select" required>
                <option value="">Выберите пользователя</option>
                @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $tutor->user_id == $user->id ? 'selected' : '' }}>
                    {{ $user->first_name }} {{ $user->last_name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="subject_id" class="form-label">Предмет</label>
            <select id="subject_id" name="subject_id" class="form-select" required>
                <option value="">Выберите предмет</option>
                @foreach($subjects as $subject)
                <option value="{{ $subject->id }}" {{ $tutor->subject_id == $subject->id ? 'selected' : '' }}>
                    {{ $subject->subject_name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="bio" class="form-label">Биография</label>
            <textarea id="bio" name="bio" class="form-control" required>{{ $tutor->bio }}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Цена</label>
            <input type="number" id="price" name="price" class="form-control" value="{{ $tutor->price }}" required>
        </div>
        <button type="submit" class="btn btn-success">Сохранить изменения</button>
    </form>
</div>
@endsection