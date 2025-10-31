@extends('admin.layouts.app')

@section('title', 'Управление страницами')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-1">Страницы</h2>
        <p class="text-muted mb-0">Управление страницами сайта</p>
    </div>
    <div>
        <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">
            <span class="material-symbols-rounded me-2 align-middle">add</span>
            Создать страницу
        </a>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table mt-0 table-striped table-card table-nowrap">
            <thead class="text-uppercase small text-body-secondary">
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Алиас</th>
                    <th>Статус</th>
                    <th>Дата создания</th>
                    <th class="text-end">Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pages as $page)
                    <tr>
                        <td>{{ $page->id }}</td>
                        <td>
                            <strong>{{ $page->name }}</strong>
                        </td>
                        <td>
                            <code>{{ $page->alias }}</code>
                        </td>
                        <td>
                            @if($page->is_published)
                                <span class="badge bg-success">Опубликована</span>
                            @else
                                <span class="badge bg-secondary">Не опубликована</span>
                            @endif
                        </td>
                        <td>{{ $page->created_at->format('d.m.Y H:i') }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.pages.edit', $page->id) }}" 
                               class="text-primary me-2" 
                               title="Редактировать"
                               style="font-size: 20px; text-decoration: none;">
                                <span class="material-symbols-rounded">edit</span>
                            </a>
                            <a href="#" 
                               onclick="event.preventDefault(); if(confirm('Вы уверены, что хотите удалить эту страницу?')) { document.getElementById('delete-form-{{ $page->id }}').submit(); }"
                               class="text-danger" 
                               title="Удалить"
                               style="font-size: 20px; text-decoration: none;">
                                <span class="material-symbols-rounded">delete</span>
                            </a>
                            <form id="delete-form-{{ $page->id }}" 
                                  method="POST" 
                                  action="{{ route('admin.pages.destroy', $page->id) }}" 
                                  style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <div class="text-muted">
                                <span class="material-symbols-rounded fs-1 d-block mb-2">article</span>
                                <p class="mb-3">Пока нет страниц</p>
                                <a href="{{ route('admin.pages.create') }}" class="btn btn-primary btn-sm">Создать первую страницу</a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($pages->hasPages())
        <div class="card-footer d-flex align-items-center justify-content-between">
            <div class="text-muted small">
                Показано {{ $pages->firstItem() }} - {{ $pages->lastItem() }} из {{ $pages->total() }}
            </div>
            <div>
                {{ $pages->links() }}
            </div>
        </div>
    @endif
</div>
@endsection
