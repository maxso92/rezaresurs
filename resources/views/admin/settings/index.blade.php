@extends('admin.layouts.app')

@section('title', 'Настройки сайта')

@section('content')
<div class="mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Главная</a></li>
            <li class="breadcrumb-item active">Настройки сайта</li>
        </ol>
    </nav>
    <h2>Настройки сайта</h2>
</div>

<form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
    @csrf
    
    <div class="row">
        <div class="col-lg-12">
            <!-- Общие настройки -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <span class="material-symbols-rounded align-middle me-2">settings</span>
                        Общие настройки
                    </h5>
                </div>
                <div class="card-body">
                    <!-- Favicon -->
                    <div class="mb-4">
                        <label for="favicon" class="form-label">
                            <span class="material-symbols-rounded align-middle me-1" style="font-size: 18px;">image</span>
                            Favicon
                        </label>
                        
                        @if(isset($settings['favicon']) && $settings['favicon'])
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $settings['favicon']) }}" alt="Current Favicon" style="max-width: 64px; height: auto;">
                                <div class="mt-2">
                                    <button type="button" class="btn btn-sm btn-danger" onclick="deleteFavicon()">
                                        <span class="material-symbols-rounded align-middle" style="font-size: 16px;">delete</span>
                                        Удалить
                                    </button>
                                </div>
                            </div>
                        @endif
                        
                        <input type="file" 
                               class="form-control @error('favicon') is-invalid @enderror" 
                               id="favicon" 
                               name="favicon"
                               accept="image/png,image/jpg,image/jpeg,image/x-icon,.ico">
                        <div class="form-text">Рекомендуемый размер: 32x32px или 64x64px. Форматы: PNG, JPG, ICO</div>
                        @error('favicon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Cookie сообщение -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <span class="material-symbols-rounded align-middle me-2">cookie</span>
                        Сообщение о Cookie
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="cookie_message" class="form-label">Текст сообщения</label>
                        <textarea class="form-control @error('cookie_message') is-invalid @enderror" 
                                  id="cookie_message" 
                                  name="cookie_message" 
                                  rows="3">{{ old('cookie_message', $settings['cookie_message'] ?? 'Мы используем файлы cookie для улучшения работы сайта') }}</textarea>
                        @error('cookie_message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Интеграции -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <span class="material-symbols-rounded align-middle me-2">integration_instructions</span>
                        Интеграции
                    </h5>
                </div>
                <div class="card-body">
                    <!-- Bitrix24 -->
                    <div class="mb-4">
                        <label for="bitrix_url" class="form-label">
                            <span class="material-symbols-rounded align-middle me-1" style="font-size: 18px;">link</span>
                            Битрикс24 (URL)
                        </label>
                        <input type="url" 
                               class="form-control @error('bitrix_url') is-invalid @enderror" 
                               id="bitrix_url" 
                               name="bitrix_url" 
                               value="{{ old('bitrix_url', $settings['bitrix_url'] ?? '') }}"
                               placeholder="https://example.bitrix24.ru/webhook/...">
                        <div class="form-text">URL для интеграции с Bitrix24</div>
                        @error('bitrix_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Яндекс Метрика -->
                    <div class="mb-4">
                        <label for="yandex_metrica_code" class="form-label">
                            <span class="material-symbols-rounded align-middle me-1" style="font-size: 18px;">code</span>
                            Яндекс Метрика (HTML код)
                        </label>
                        <textarea class="form-control @error('yandex_metrica_code') is-invalid @enderror" 
                                  id="yandex_metrica_code" 
                                  name="yandex_metrica_code" 
                                  rows="8"
                                  placeholder="<!-- Yandex.Metrika counter -->&#10;<script type=&quot;text/javascript&quot;>&#10;   (function(m,e,t,r,i,k,a){...&#10;</script>&#10;<!-- /Yandex.Metrika counter -->"
                                  style="font-family: monospace; font-size: 12px;">{{ old('yandex_metrica_code', $settings['yandex_metrica_code'] ?? '') }}</textarea>
                        <div class="form-text">Вставьте полный HTML код счетчика Яндекс Метрики</div>
                        @error('yandex_metrica_code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <hr class="my-4">
                    
                    <!-- Телеграм заявки -->
                    <h6 class="mb-3">
                        Телеграм заявки
                    </h6>
                    
                    <div class="mb-3">
                        <label for="telegram_callback_token" class="form-label">
                            Telegram Callback Token
                        </label>
                        <input type="text" 
                               class="form-control @error('telegram_callback_token') is-invalid @enderror" 
                               id="telegram_callback_token" 
                               name="telegram_callback_token" 
                               value="{{ old('telegram_callback_token', $settings['telegram_callback_token'] ?? '') }}"
                               placeholder="Введите токен для callback Telegram">
                        <div class="form-text">Токен для отправки уведомлений о новых заявках в Telegram</div>
                        @error('telegram_callback_token')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="telegram_callback_id" class="form-label">
                            Telegram Callback Id
                        </label>
                        <input type="text" 
                               class="form-control @error('telegram_callback_id') is-invalid @enderror" 
                               id="telegram_callback_id" 
                               name="telegram_callback_id" 
                               value="{{ old('telegram_callback_id', $settings['telegram_callback_id'] ?? '') }}"
                               placeholder="Введите ID чата или канала">
                        <div class="form-text">ID чата или канала, куда будут отправляться уведомления</div>
                        @error('telegram_callback_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary btn-lg">
                    <span class="material-symbols-rounded me-2 align-middle" style="font-size: 20px;">save</span>
                    Сохранить настройки
                </button>
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script>
function deleteFavicon() {
    if (!confirm('Удалить favicon?')) {
        return;
    }
    
    fetch('{{ route('admin.settings.delete-favicon') }}', {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        redirect: 'manual'
    })
    .then(response => {
        // Успешное удаление (статус 200 или 302 редирект)
        if (response.ok || response.type === 'opaqueredirect' || response.status === 302) {
            window.location.reload();
        } else {
            console.error('Response:', response);
            alert('Ошибка при удалении favicon');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        // Перезагружаем страницу даже при ошибке, так как удаление могло пройти успешно
        window.location.reload();
    });
}
</script>
@endpush
@endsection

