<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .is-invalid {
            color: red;
        }
    </style>
</head>

<body>
    @if($user)
    <h2>Здравствуйте, {{ $user->first_name }}</h2>
    <a href="{{ url('logout') }}">Выйти из системы</a>
    @else
    <h2>Вход в систему</h2>
    <form method="post" action="{{ url('auth') }}">
        @csrf
        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email')
        <span class="is-invalid">{{ $message }}</span>
        @enderror
        <br>
        <label>Пароль:</label>
        <input type="password" name="password" value="{{ old('password') }}">
        @error('password')
        <span class="is-invalid">{{ $message }}</span>
        @enderror
        <br>
        <button type="submit">Войти</button>
    </form>
    @error('error')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
    @endif
</body>

</html>