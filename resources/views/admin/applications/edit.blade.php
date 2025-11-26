@extends('admin.layouts.app')

@section('title', 'Редактировать заявку')

@section('content')
<div class="mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.applications.index') }}">Заявки</a></li>
            <li class="breadcrumb-item active">Редактировать</li>
        </ol>
    </nav>
    <h2>Редактировать заявку</h2>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.applications.update', $application->id) }}" id="applicationForm">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Имя <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control @error('name') is-invalid @enderror" 
                               id="name" 
                               name="name" 
                               value="{{ old('name', $application->name) }}" 
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Телефон <span class="text-danger">*</span></label>
                        <input type="tel" 
                               class="form-control @error('phone') is-invalid @enderror" 
                               id="phone" 
                               name="phone" 
                               value="{{ old('phone', $application->phone) }}" 
                               required>
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="position" class="form-label">Должность / специальность</label>
                        <input type="text" 
                               class="form-control @error('position') is-invalid @enderror" 
                               id="position" 
                               name="position" 
                               value="{{ old('position', $application->position) }}">
                        @error('position')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="{{ route('admin.applications.index') }}" class="btn btn-secondary">
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
                <div class="mb-3">
                    <small class="text-muted">Статус:</small><br>
                    @if($application->is_viewed)
                        <span class="badge bg-secondary">Просмотрена</span>
                    @else
                        <span class="badge bg-warning text-dark">Новая</span>
                    @endif
                </div>
                <div class="mb-3">
                    <small class="text-muted">Создано:</small><br>
                    <strong>{{ $application->created_at->format('d.m.Y H:i') }}</strong>
                </div>
                <div class="mb-3">
                    <small class="text-muted">Обновлено:</small><br>
                    <strong>{{ $application->updated_at->format('d.m.Y H:i') }}</strong>
                </div>
                <div>
                    <form method="POST" action="{{ route('admin.applications.toggle-viewed', $application->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-sm {{ $application->is_viewed ? 'btn-warning' : 'btn-success' }} w-100">
                            <span class="material-symbols-rounded align-middle me-1" style="font-size: 16px;">{{ $application->is_viewed ? 'visibility_off' : 'visibility' }}</span>
                            {{ $application->is_viewed ? 'Отметить как новую' : 'Отметить как просмотренную' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

