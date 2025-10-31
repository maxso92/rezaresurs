@extends('admin.layouts.app')

@section('title', 'Просмотр пользователя')

@section('content')
<div class="mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Пользователи</a></li>
            <li class="breadcrumb-item active">{{ $user->name }}</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between align-items-center">
        <h2>{{ $user->name }}</h2>
        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">
            <span class="material-symbols-rounded me-2 align-middle" style="font-size: 18px;">edit</span>
            Редактировать
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th style="width: 200px;">Имя:</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Роль:</th>
                        <td>
                            @if($user->is_admin)
                                <span class="badge bg-danger">Администратор</span>
                            @else
                                <span class="badge bg-info">Пользователь</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Статус:</th>
                        <td>
                            @if($user->status === 'active')
                                <span class="badge bg-success">Активен</span>
                            @else
                                <span class="badge bg-secondary">Неактивен</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">Информация</h5>
                <div class="mb-3">
                    <small class="text-muted">ID пользователя:</small><br>
                    <strong>{{ $user->id }}</strong>
                </div>
                <div class="mb-3">
                    <small class="text-muted">Зарегистрирован:</small><br>
                    <strong>{{ $user->created_at->format('d.m.Y H:i') }}</strong>
                </div>
                <div class="mb-3">
                    <small class="text-muted">Последнее обновление:</small><br>
                    <strong>{{ $user->updated_at->format('d.m.Y H:i') }}</strong>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
