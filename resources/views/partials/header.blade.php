<nav class="navbar navbar-expand-lg navbar-light mb-4 border-bottom" style="background-color: #294283;">
    <div class="container">
        <a class="navbar-brand" style="background-color: #294283; color: white;" href="{{ url('/') }}">Главная</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- <li class="nav-item">
                    <a class="btn" style="background-color: #294283; color: white;" href="{{ url('/tutors') }}">Репетиторы</a>
                </li>
                <li class="nav-item">
                    <a class="btn" style="background-color: #294283; color: white;" href="{{ url('/subjects') }}">Предметы</a>
                </li>
                <li class="nav-item">
                    <a class="btn" style="background-color: #294283; color: white;" href="{{ url('/users') }}">Пользователи</a>
                </li> -->
                @if (isset($user))
                <a href="/profile" class="btn btn-link" style="color: white;">{{ $user->first_name }}</a>
                <form action="{{ route('logout') }}" method="get" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-link" style="color: red;">Выйти</button>
                </form>
                @else
                <li class="nav-item">
                    <a class="btn btn-light ms-2" href="{{ route('login') }}">Войти</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/register') }}" class="btn btn-outline-light ms-2">Регистрация</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>