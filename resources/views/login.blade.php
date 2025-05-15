@extends('layouts.layout')
@section('content')

<div class="py-5">
    @if ($user)
    <div class="card shadow-sm">
        <div class="card-body text-center">
            <h2 class="card-title mb-4">Здравствуйте, {{ $user->first_name }}</h2>
            <a href="{{ route('logout') }}" class="btn btn-danger">Выйти из системы</a>
        </div>
    </div>
    @else
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Вход в систему</h2>
                    <form method="POST" action="{{ route('authenticate') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Пароль</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password">
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Войти</button>
                        </div>
                        @error('error')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection