@extends('admin.layouts.app')

@section('title', 'Просмотр страницы')

@section('content')
<div class="mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">Страницы</a></li>
            <li class="breadcrumb-item active">{{ $page->name }}</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between align-items-center">
        <h2>{{ $page->name }}</h2>
        <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-primary">
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
                        <th style="width: 200px;">Название:</th>
                        <td>{{ $page->name }}</td>
                    </tr>
                    <tr>
                        <th>Алиас:</th>
                        <td><code>{{ $page->alias }}</code></td>
                    </tr>
                    <tr>
                        <th>Статус:</th>
                        <td>
                            @if($page->is_published)
                                <span class="badge bg-success">Опубликована</span>
                            @else
                                <span class="badge bg-secondary">Не опубликована</span>
                            @endif
                        </td>
                    </tr>
                    @if($page->title)
                    <tr>
                        <th>SEO Title:</th>
                        <td>{{ $page->title }}</td>
                    </tr>
                    @endif
                    @if($page->content)
                    <tr>
                        <th>Контент:</th>
                        <td>
                            <div class="border p-3 rounded">
                                {!! nl2br(e($page->content)) !!}
                            </div>
                        </td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>

        @if($page->seo_keyword || $page->seo_description || $page->seo_social_title || $page->seo_social_description)
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mb-0">SEO информация</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    @if($page->seo_keyword)
                    <tr>
                        <th style="width: 200px;">Keywords:</th>
                        <td>{{ $page->seo_keyword }}</td>
                    </tr>
                    @endif
                    @if($page->seo_description)
                    <tr>
                        <th>Description:</th>
                        <td>{{ $page->seo_description }}</td>
                    </tr>
                    @endif
                    @if($page->seo_social_title)
                    <tr>
                        <th>Social Title:</th>
                        <td>{{ $page->seo_social_title }}</td>
                    </tr>
                    @endif
                    @if($page->seo_social_description)
                    <tr>
                        <th>Social Description:</th>
                        <td>{{ $page->seo_social_description }}</td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>
        @endif
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">Информация</h5>
                <div class="mb-3">
                    <small class="text-muted">ID страницы:</small><br>
                    <strong>{{ $page->id }}</strong>
                </div>
                <div class="mb-3">
                    <small class="text-muted">Создано:</small><br>
                    <strong>{{ $page->created_at->format('d.m.Y H:i') }}</strong>
                </div>
                <div class="mb-3">
                    <small class="text-muted">Обновлено:</small><br>
                    <strong>{{ $page->updated_at->format('d.m.Y H:i') }}</strong>
                </div>
                <hr>
                <div class="d-grid">
                    <a href="{{ url('/' . $page->alias) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                        <span class="material-symbols-rounded me-2 align-middle" style="font-size: 16px;">open_in_new</span>
                        Посмотреть на сайте
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
