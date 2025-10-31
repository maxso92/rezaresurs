@extends('admin.layouts.app')

@section('title', 'Управление пользователями')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-1">Пользователи</h2>
        <p class="text-muted mb-0">Управление пользователями системы</p>
    </div>
    <div>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
            <span class="material-symbols-rounded me-2 align-middle">person_add</span>
            Добавить пользователя
        </a>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table mt-0 table-striped table-card table-nowrap">
            <thead class="text-uppercase small text-body-secondary">
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Роль</th>
                    <th>Статус</th>
                    <th>Дата регистрации</th>
                    <th class="text-end">Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="avatar me-2">
                                    <span class="avatar-text rounded-circle bg-gradient-primary text-white d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </span>
                                </span>
                                <strong>{{ $user->name }}</strong>
                            </div>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->is_admin)
                                <span class="badge bg-danger">Администратор</span>
                            @else
                                <span class="badge bg-info">Пользователь</span>
                            @endif
                        </td>
                        <td>
                            @if($user->status === 'active')
                                <span class="badge bg-success">Активен</span>
                            @else
                                <span class="badge bg-secondary">Неактивен</span>
                            @endif
                        </td>
                        <td>{{ $user->created_at->format('d.m.Y H:i') }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.users.edit', $user->id) }}" 
                               class="text-primary me-2" 
                               title="Редактировать"
                               style="font-size: 20px; text-decoration: none;">
                                <span class="material-symbols-rounded">edit</span>
                            </a>
                            @if($user->id !== auth()->id())
                                <a href="#" 
                                   onclick="event.preventDefault(); if(confirm('Вы уверены, что хотите удалить этого пользователя?')) { document.getElementById('delete-form-{{ $user->id }}').submit(); }"
                                   class="text-danger" 
                                   title="Удалить"
                                   style="font-size: 20px; text-decoration: none;">
                                    <span class="material-symbols-rounded">delete</span>
                                </a>
                                <form id="delete-form-{{ $user->id }}" 
                                      method="POST" 
                                      action="{{ route('admin.users.destroy', $user->id) }}" 
                                      style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <div class="text-muted">
                                <span class="material-symbols-rounded fs-1 d-block mb-2">group</span>
                                <p class="mb-3">Пока нет пользователей</p>
                                <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">Добавить первого пользователя</a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($users->hasPages())
        <div class="card-footer d-flex align-items-center justify-content-between">
            <div class="text-muted small">
                Показано {{ $users->firstItem() }} - {{ $users->lastItem() }} из {{ $users->total() }}
            </div>
            <div>
                {{ $users->links() }}
            </div>
        </div>
    @endif
</div>
@endsection
