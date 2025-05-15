@extends('layouts.layout')
@section('content')

<div class="container mt-4">
    <h2 class="mb-4">Список предметов и репетиторов</h2>
    @foreach($subjects as $subject)
    <div class="mb-5">
        <h4 class="mb-3">{{ $subject->subject_name }}</h4>
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>Имя пользователя</th>
                        <th>Биография</th>
                        <th>Цена</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subject->tutors as $tutor)
                    <tr>
                        <td>{{ $tutor->id }}</td>
                        <td>{{ $tutor->user->first_name }} {{ $tutor->user->last_name }}</td>
                        <td>{{ $tutor->bio }}</td>
                        <td>{{ $tutor->price }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endforeach
</div>

@endsection