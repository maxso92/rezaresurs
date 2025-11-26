@extends('admin.layouts.app')

@section('title', 'Главная панель')

@section('content')
<div class="row g-3 g-xl-6 mb-6">
    <div class="col-12">
        <h2>Добро пожаловать, {{ auth()->user()->name }}!</h2>
        <p class="text-muted">Управление сайтом Резаресурс</p>
    </div>
</div>

<div class="row g-3 g-xl-6">
    <!-- Страницы -->
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h4 class="card-title mb-2">Страницы</h4>
                        <p class="text-muted mb-0">Управление контентом</p>
                    </div>
                    <div class="avatar avatar-lg">
                        <span class="avatar-text rounded-circle bg-primary bg-opacity-10 text-primary">
                            <span class="material-symbols-rounded fs-2">article</span>
                        </span>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('admin.pages.index') }}" class="btn btn-primary btn-sm">
                        Перейти
                        <span class="material-symbols-rounded ms-1 align-middle" style="font-size: 18px;">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Пользователи -->
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h4 class="card-title mb-2">Пользователи</h4>
                        <p class="text-muted mb-0">Управление пользователями</p>
                    </div>
                    <div class="avatar avatar-lg">
                        <span class="avatar-text rounded-circle bg-success bg-opacity-10 text-success">
                            <span class="material-symbols-rounded fs-2">group</span>
                        </span>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-success btn-sm">
                        Перейти
                        <span class="material-symbols-rounded ms-1 align-middle" style="font-size: 18px;">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Заявки -->
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h4 class="card-title mb-2">Заявки</h4>
                        <p class="text-muted mb-0">Заявки с главной страницы</p>
                    </div>
                    <div class="avatar avatar-lg">
                        <span class="avatar-text rounded-circle bg-warning bg-opacity-10 text-warning">
                            <span class="material-symbols-rounded fs-2">inbox</span>
                        </span>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('admin.applications.index') }}" class="btn btn-warning btn-sm">
                        Перейти
                        <span class="material-symbols-rounded ms-1 align-middle" style="font-size: 18px;">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Сайт -->
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h4 class="card-title mb-2">Сайт</h4>
                        <p class="text-muted mb-0">Перейти на сайт</p>
                    </div>
                    <div class="avatar avatar-lg">
                        <span class="avatar-text rounded-circle bg-info bg-opacity-10 text-info">
                            <span class="material-symbols-rounded fs-2">language</span>
                        </span>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="/" target="_blank" class="btn btn-info btn-sm">
                        Открыть
                        <span class="material-symbols-rounded ms-1 align-middle" style="font-size: 18px;">open_in_new</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
