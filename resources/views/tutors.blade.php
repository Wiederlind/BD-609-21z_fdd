@extends('layouts.layout')
@section('content')

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Список репетиторов</h2>
        <a href="{{ route('tutors.create') }}" class="btn btn-primary">Добавить репетитора</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Id</th>
                    <th>Имя пользователя</th>
                    <th>Предмет</th>
                    <th>Биография</th>
                    <th>Цена</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tutors as $tutor)
                <tr>
                    <td>{{ $tutor->id }}</td>
                    <td>{{ $tutor->user->first_name }} {{ $tutor->user->last_name }}</td>
                    <td>{{ $tutor->subject->subject_name }}</td>
                    <td>{{ $tutor->bio }}</td>
                    <td>{{ $tutor->price }}</td>
                    <td>
                        <a href="{{ route('tutors.edit', $tutor->id) }}" class="btn btn-sm btn-warning">Изменить</a>

                        <!-- Кнопка для вызова модального окна -->
                        @if(isset($user) && $user->is_admin)
                        <!-- Кнопка для администратора -->
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $tutor->id }}">
                            Удалить
                        </button>
                        <!-- модальное окно подтверждения удаления... -->
                        @else
                        <!-- Кнопка для не-администратора -->
                        <a href="{{ route('tutors.destroy', $tutor->id) }}" class="btn btn-sm btn-danger">Удалить</a>
                        @endif
                        @if(isset($user) && $user->is_admin)
                        <div class="modal fade" id="deleteModal{{ $tutor->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $tutor->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $tutor->id }}">Подтверждение удаления</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                    </div>
                                    <div class="modal-body">
                                        Вы уверены, что хотите удалить этого репетитора?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                                        <a href="{{ route('tutors.destroy', $tutor->id) }}" class="btn btn-danger">Удалить</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        {{ $tutors->links() }}
    </div>
</div>

@endsection