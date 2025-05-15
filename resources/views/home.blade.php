@extends('layouts.layout')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    @if($user)
                    <h1 class="card-title mb-4">Здравствуйте, {{ $user->first_name }}</h1>
                    @if(isset($user) && $user->is_admin)
                    <span class="badge bg-success mb-3">Администратор</span>
                    @endif
                    @else
                    <h1 class="card-title mb-4">Здравствуйте, гость!</h1>
                    @endif
                    <p class="card-text mb-4">
                        Используйте меню сверху для навигации по сайту.
                    </p>
                    <a href="{{ url('/tutors') }}" class="btn btn-primary me-2">Список репетиторов</a>
                    <a href="{{ url('/subjects') }}" class="btn btn-outline-primary">Список предметов</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection