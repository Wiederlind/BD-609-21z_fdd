@extends('layouts.layout')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    @if($user)
                    <div>
                        <h1 class="card-title">Здравствуйте, {{ $user->first_name }}</h1>
                        @if(isset($user) && $user->is_admin)
                        <span class="badge bg-success">Администратор</span>
                        @endif
                    </div>
                    <a href="{{ route('tutors.cards') }}" class="btn btn-primary mt-4">Найти репетитора</a>
                    @else
                    <h1 class="card-title mb-4">Здравствуйте, гость!</h1>
                    <p class="card-text mb-4">
                        Для начала войдите в аккаунт или зарегистрируйтесь.
                    </p>
                    <a href="{{ route('login') }}" class="btn btn-primary me-2">Войти</a>
                    <a href="{{ route('register.store') }}" class="btn btn-outline-primary">Регистрация</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection