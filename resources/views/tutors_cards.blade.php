@extends('layouts.layout')
@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Список репетиторов</h1>

    <form method="GET" action="{{ route('tutors.cards') }}" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <select name="subject_id" class="form-select">
                    <option value="">Все предметы</option>
                    @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ request('subject_id') == $subject->id ? 'selected' : '' }}>
                        {{ $subject->subject_name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Применить</button>
            </div>
        </div>
    </form>

    <div class="row">
        @foreach($tutors as $tutor)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $tutor->user->first_name }} {{ $tutor->user->last_name }}</h5>
                    <p class="card-text"><strong>Предмет:</strong> {{ $tutor->subject->subject_name }}</p>
                    <p class="card-text"><strong>Описание:</strong> {{ $tutor->bio }}</p>
                    <p class="card-text"><strong>Цена за час:</strong> {{ $tutor->price }} руб.</p>
                    <a href="{{ route('tutors.show', $tutor->id) }}" class="btn btn-primary">Подробнее</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $tutors->links() }}
    </div>
</div>
@endsection