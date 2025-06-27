@extends('layouts.layout')
@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4">Профиль пользователя</h1>

    <div class="card shadow-sm mb-4" style="background-color:rgb(141, 153, 184);">
        <div class="card-body">
            <h2 class="card-title">Ваши заказы</h2>
            @if($orders->isEmpty())
            <p class="text-muted">У вас пока нет заказов.</p>
            @else
            <div class="accordion" id="ordersAccordion">
                @foreach($orders as $order)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $order->id }}">
                        <button class="accordion-button collapsed" style="background-color:rgb(216, 216, 216);" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $order->id }}" aria-expanded="false" aria-controls="collapse{{ $order->id }}">
                            @if($order->status === 'completed')
                            <span class="badge bg-success me-2">Завершён</span>
                            @elseif($order->status === 'pending')
                            <span class="badge bg-warning me-2">Активный</span>
                            @else
                            <span class="badge bg-secondary me-2">{{ ucfirst($order->status) }}</span>
                            @endif
                            <strong>Заказ №{{ $order->id }}</strong> - {{ $order->lesson_date }} - {{ $order->subject->subject_name }}
                        </button>
                    </h2>
                    <div id="collapse{{ $order->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $order->id }}" data-bs-parent="#ordersAccordion">
                        <div class="accordion-body">
                            <div class="mb-3">
                                <p><strong>Репетитор:</strong> {{ $order->tutor->user->first_name }} {{ $order->tutor->user->last_name }}</p>
                                <p><strong>Предмет:</strong> {{ $order->subject->subject_name }}</p>
                                <p><strong>Дата и время урока:</strong> {{ $order->lesson_date }}</p>
                                <p><strong>Длительность:</strong> {{ $order->duration }} минут</p>
                                <p><strong>Статус:</strong>
                                    @if($order->status === 'completed')
                                    <span class="text-success">Завершён</span>
                                    @elseif($order->status === 'pending')
                                    <span class="text-warning">Активный</span>
                                <form method="POST" action="{{ route('orders.cancel', $order->id) }}" class="mt-2" onsubmit="return confirm('Вы уверены, что хотите отменить заказ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Отменить заказ</button>
                                </form>
                                @else
                                <span class="text-muted">{{ ucfirst($order->status) }}</span>
                                @endif
                                </p>
                            </div>

                            @if($order->status === 'completed')
                            @if($order->review)
                            <!-- Отзыв уже оставлен -->
                            <div class="border rounded p-3 mb-3" style="background-color: #f8f9fa;">
                                <p><strong>Ваш отзыв:</strong></p>
                                <p><strong>Оценка:</strong> {{ $order->review->rating }}</p>
                                <p><strong>Комментарий:</strong> {{ $order->review->content }}</p>
                                <form method="POST" action="{{ route('reviews.destroy', $order->review->id) }}" class="mt-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Удалить отзыв</button>
                                </form>
                                <button class="btn btn-primary mt-2" onclick="toggleEditForm({{ $order->id }})">Изменить отзыв</button>
                                <form method="POST" action="{{ route('reviews.update', $order->review->id) }}" class="mt-2 d-none" id="editForm{{ $order->id }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="rating" class="form-label">Рейтинг</label>
                                        <select class="form-select" id="rating" name="rating" required>
                                            <option value="1" @if($order->review->rating == 1) selected @endif>1</option>
                                            <option value="2" @if($order->review->rating == 2) selected @endif>2</option>
                                            <option value="3" @if($order->review->rating == 3) selected @endif>3</option>
                                            <option value="4" @if($order->review->rating == 4) selected @endif>4</option>
                                            <option value="5" @if($order->review->rating == 5) selected @endif>5</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="form-label">Комментарий</label>
                                        <textarea class="form-control" id="content" name="content" rows="3">{{ $order->review->content }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success">Сохранить изменения</button>
                                </form>
                            </div>
                            @else
                            <!-- Отзыв отсутствует -->
                            <div class="border rounded p-3 mb-3" style="background-color: #f8f9fa;">
                                <p><strong>Оставить отзыв:</strong></p>
                                <form method="POST" action="{{ route('reviews.store') }}">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                    <input type="hidden" name="tutor_id" value="{{ $order->tutor->id }}">
                                    <div class="mb-3">
                                        <label for="rating" class="form-label">Рейтинг</label>
                                        <select class="form-select" id="rating" name="rating" required>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="form-label">Комментарий</label>
                                        <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success">Оставить отзыв</button>
                                </form>
                            </div>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>

<script>
    function toggleEditForm(orderId) {
        const form = document.getElementById(`editForm${orderId}`);
        form.classList.toggle('d-none');
    }
</script>

@endsection