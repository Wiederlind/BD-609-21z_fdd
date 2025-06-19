@extends('layouts.layout')
@section('content')

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="card-title">{{ $tutor->user->first_name }} {{ $tutor->user->last_name }}</h1>
            <p class="card-text"><strong>Предмет:</strong> {{ $tutor->subject->subject_name }}</p>
            <p class="card-text"><strong>Описание:</strong> {{ $tutor->bio }}</p>
            <p class="card-text"><strong>Цена:</strong> {{ $tutor->price }} руб.</p>
            <p class="card-text"><strong>Почта для связи:</strong> {{ $tutor->user->email }}</p>
        </div>
    </div>
</div>

@endsection