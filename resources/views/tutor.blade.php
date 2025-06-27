@extends('layouts.layout')
@section('content')

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="card-title">{{ $tutor->user->first_name }} {{ $tutor->user->last_name }}</h1>
            <p class="card-text"><strong>Предмет:</strong> {{ $tutor->subject->subject_name }}</p>
            <p class="card-text"><strong>Описание:</strong> {{ $tutor->bio }}</p>
            <p class="card-text"><strong>Цена за час:</strong> {{ $tutor->price }} руб.</p>
            <p class="card-text"><strong>Почта для связи:</strong> {{ $tutor->user->email }}</p>
        </div>
    </div>
</div>

<!-- Форма бронирования -->
<div class="container mt-2">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="card-title">Забронировать урок</h3>
            <form method="POST" action="{{ route('orders.store') }}">
                @csrf
                <input type="hidden" name="tutor_id" value="{{ $tutor->id }}">
                <input type="hidden" name="subject_id" value="{{ $tutor->subject->id }}">
                <div class="mb-3">
                    <label for="lesson_date" class="form-label">Дата урока</label>
                    <input type="date" class="form-control" id="lesson_date" name="lesson_date" min="{{ date('Y-m-d') }}" required>
                </div>
                <div class="mb-3">
                    <label for="lesson_time" class="form-label">Время начала урока</label>
                    <input type="time" class="form-control" id="lesson_time" name="lesson_time" required>
                </div>
                <div class="mb-3">
                    <label for="duration" class="form-label">Длительность (в часах)</label>
                    <select class="form-select" id="duration" name="duration" required>
                        <option value="60">1 час</option>
                        <option value="120">2 часа</option>
                        <option value="180">3 часа</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Забронировать</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const lessonDateInput = document.getElementById('lesson_date');
        const lessonTimeInput = document.getElementById('lesson_time');

        // Обновление времени в зависимости от выбранной даты
        lessonDateInput.addEventListener('change', function() {
            const selectedDate = new Date(this.value);
            const today = new Date();

            if (selectedDate.toDateString() === today.toDateString()) {
                // Если выбрана текущая дата, ограничить время начала урока
                const currentHour = today.getHours();
                const currentMinute = today.getMinutes();
                lessonTimeInput.min = `${currentHour}:${currentMinute}`;
            } else {
                // Сброс минимального времени для других дат
                lessonTimeInput.min = '00:00';
            }
        });
    });
</script>

@endsection