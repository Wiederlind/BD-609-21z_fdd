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

    <!-- Карточки с преимуществами -->
    <div class="mt-5">
        <h2 class="text-center mb-4">Почему выбирают нас?</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="fa fa-graduation-cap fa-3x mb-3 text-primary"></i>
                        <h5 class="card-title">Опытные репетиторы</h5>
                        <p class="card-text">Только проверенные специалисты с высоким уровнем квалификации.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="fa fa-clock-o fa-3x mb-3 text-primary"></i>
                        <h5 class="card-title">Гибкий график</h5>
                        <p class="card-text">Вы сами выбираете удобное время для занятий.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="fa fa-thumbs-up fa-3x mb-3 text-primary"></i>
                        <h5 class="card-title">Гарантия качества</h5>
                        <p class="card-text">Мы гарантируем высокий уровень обучения и индивидуальный подход.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection