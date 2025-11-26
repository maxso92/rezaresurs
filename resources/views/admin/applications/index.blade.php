@extends('admin.layouts.app')

@section('title', 'Заявки')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-1">Заявки</h2>
        <p class="text-muted mb-0">Управление заявками с главной страницы</p>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table mt-0 table-striped table-card table-nowrap">
            <thead class="text-uppercase small text-body-secondary">
                <tr>
                    <th>ID</th>
                    <th>Статус</th>
                    <th>Имя</th>
                    <th>Телефон</th>
                    <th>Должность</th>
                    <th>Дата создания</th>
                    <th class="text-end">Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse($applications as $application)
                    <tr class="{{ !$application->is_viewed ? 'table-warning' : '' }}">
                        <td>{{ $application->id }}</td>
                        <td>
                            @if($application->is_viewed)
                                <span class="badge bg-secondary">Просмотрена</span>
                            @else
                                <span class="badge bg-warning text-dark">Новая</span>
                            @endif
                        </td>
                        <td>
                            <strong>{{ $application->name }}</strong>
                        </td>
                        <td>
                            <a href="tel:{{ $application->phone }}">{{ $application->phone }}</a>
                        </td>
                        <td>
                            {{ $application->position ?: '—' }}
                        </td>
                        <td>{{ $application->created_at->format('d.m.Y H:i') }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.applications.edit', $application->id) }}" 
                               class="text-primary me-2" 
                               title="Редактировать"
                               style="font-size: 20px; text-decoration: none;">
                                <span class="material-symbols-rounded">edit</span>
                            </a>
                            <form action="{{ route('admin.applications.toggle-viewed', $application->id) }}" 
                                  method="POST" 
                                  style="display: inline-block;" 
                                  onsubmit="return true;">
                                @csrf
                                <button type="submit" 
                                        class="btn btn-link text-info p-0 me-2" 
                                        title="{{ $application->is_viewed ? 'Отметить как новую' : 'Отметить как просмотренную' }}"
                                        style="font-size: 20px; text-decoration: none; border: none; background: none;">
                                    <span class="material-symbols-rounded">{{ $application->is_viewed ? 'visibility_off' : 'visibility' }}</span>
                                </button>
                            </form>
                            <a href="#" 
                               onclick="event.preventDefault(); if(confirm('Вы уверены, что хотите удалить эту заявку?')) { document.getElementById('delete-form-{{ $application->id }}').submit(); }"
                               class="text-danger" 
                               title="Удалить"
                               style="font-size: 20px; text-decoration: none;">
                                <span class="material-symbols-rounded">delete</span>
                            </a>
                            <form id="delete-form-{{ $application->id }}" 
                                  method="POST" 
                                  action="{{ route('admin.applications.destroy', $application->id) }}" 
                                  style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <div class="text-muted">
                                <span class="material-symbols-rounded fs-1 d-block mb-2">inbox</span>
                                <p class="mb-0">Пока нет заявок</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($applications->hasPages())
        <div class="card-footer d-flex align-items-center justify-content-between">
            <div class="text-muted small">
                Показано {{ $applications->firstItem() }} - {{ $applications->lastItem() }} из {{ $applications->total() }}
            </div>
            <div>
                {{ $applications->links() }}
            </div>
        </div>
    @endif
</div>
@endsection

