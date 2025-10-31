@extends('admin.layouts.app')

@section('title', 'Редактировать пользователя')

@section('content')
<div class="mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Пользователи</a></li>
            <li class="breadcrumb-item active">Редактировать</li>
        </ol>
    </nav>
    <h2>Редактировать пользователя</h2>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.users.update', $user->id) }}" autocomplete="off">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Имя <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control @error('name') is-invalid @enderror" 
                               id="name" 
                               name="name" 
                               value="{{ old('name', $user->name) }}" 
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               id="email" 
                               name="email" 
                               value="{{ old('email', $user->email) }}" 
                               required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Новый пароль</label>
                        <input type="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               id="password" 
                               name="password"
                               autocomplete="new-password">
                        <div class="form-text">Оставьте пустым, если не хотите менять пароль. Минимум 6 символов.</div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Статус <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="active" {{ old('status', $user->status) === 'active' ? 'selected' : '' }}>Активен</option>
                            <option value="inactive" {{ old('status', $user->status) === 'inactive' ? 'selected' : '' }}>Неактивен</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" 
                                   type="checkbox" 
                                   id="is_admin" 
                                   name="is_admin" 
                                   value="1" 
                                   {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_admin">
                                Администратор
                            </label>
                        </div>
                        <small class="text-muted">Администраторы имеют полный доступ к панели управления</small>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                            <span class="material-symbols-rounded me-2 align-middle" style="font-size: 18px;">arrow_back</span>
                            Отмена
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <span class="material-symbols-rounded me-2 align-middle" style="font-size: 18px;">save</span>
                            Сохранить изменения
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">Информация</h5>
                <div class="mb-2">
                    <small class="text-muted">ID:</small><br>
                    <strong>{{ $user->id }}</strong>
                </div>
                <div class="mb-2">
                    <small class="text-muted">Зарегистрирован:</small><br>
                    <strong>{{ $user->created_at->format('d.m.Y H:i') }}</strong>
                </div>
                <div>
                    <small class="text-muted">Обновлен:</small><br>
                    <strong>{{ $user->updated_at->format('d.m.Y H:i') }}</strong>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
