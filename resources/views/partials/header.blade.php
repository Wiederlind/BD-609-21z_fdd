<nav class="navbar navbar-expand-lg navbar-dark bg-secondary mb-4 border-bottom">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Главная</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/tutors') }}">Репетиторы</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/subjects') }}">Предметы</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/users') }}">Пользователи</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Вход</a></li>
            </ul>
        </div>
    </div>
</nav>