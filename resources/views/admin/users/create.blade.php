@extends('admin.layouts.app')

@section('title', 'Создать пользователя')

@section('content')
<div class="mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Пользователи</a></li>
            <li class="breadcrumb-item active">Создать</li>
        </ol>
    </nav>
    <h2>Создать пользователя</h2>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.users.store') }}">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Имя <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control @error('name') is-invalid @enderror" 
                               id="name" 
                               name="name" 
                               value="{{ old('name') }}" 
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
                               value="{{ old('email') }}" 
                               required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Пароль <span class="text-danger">*</span></label>
                        <input type="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               id="password" 
                               name="password" 
                               required>
                        <div class="form-text">Минимум 6 символов</div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Статус <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Активен</option>
                            <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Неактивен</option>
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
                                   {{ old('is_admin') ? 'checked' : '' }}>
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
                            Создать пользователя
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
