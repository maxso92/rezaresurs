@extends('admin.layouts.app')

@section('title', 'Создать страницу')

@section('content')
<div class="mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">Страницы</a></li>
            <li class="breadcrumb-item active">Создать</li>
        </ol>
    </nav>
    <h2>Создать страницу</h2>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.pages.store') }}">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Название страницы <span class="text-danger">*</span></label>
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
                        <label for="alias" class="form-label">Алиас (URL) <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control @error('alias') is-invalid @enderror" 
                               id="alias" 
                               name="alias" 
                               value="{{ old('alias') }}" 
                               required
                               placeholder="about-us">
                        <div class="form-text">Используется в URL: /about-us</div>
                        @error('alias')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">SEO Title</label>
                        <input type="text" 
                               class="form-control @error('title') is-invalid @enderror" 
                               id="title" 
                               name="title" 
                               value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Контент</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" 
                                  id="content" 
                                  name="content" 
                                  rows="8">{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr class="my-4">

                    <h5 class="mb-3">SEO настройки</h5>

                    <div class="mb-3">
                        <label for="seo_keyword" class="form-label">SEO Keywords</label>
                        <textarea class="form-control @error('seo_keyword') is-invalid @enderror" 
                                  id="seo_keyword" 
                                  name="seo_keyword" 
                                  rows="2">{{ old('seo_keyword') }}</textarea>
                        @error('seo_keyword')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="seo_description" class="form-label">SEO Description</label>
                        <textarea class="form-control @error('seo_description') is-invalid @enderror" 
                                  id="seo_description" 
                                  name="seo_description" 
                                  rows="3">{{ old('seo_description') }}</textarea>
                        @error('seo_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="seo_social_title" class="form-label">Social Title</label>
                        <input type="text" 
                               class="form-control @error('seo_social_title') is-invalid @enderror" 
                               id="seo_social_title" 
                               name="seo_social_title" 
                               value="{{ old('seo_social_title') }}">
                        @error('seo_social_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="seo_social_description" class="form-label">Social Description</label>
                        <textarea class="form-control @error('seo_social_description') is-invalid @enderror" 
                                  id="seo_social_description" 
                                  name="seo_social_description" 
                                  rows="2">{{ old('seo_social_description') }}</textarea>
                        @error('seo_social_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">
                            <span class="material-symbols-rounded me-2 align-middle" style="font-size: 18px;">arrow_back</span>
                            Отмена
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <span class="material-symbols-rounded me-2 align-middle" style="font-size: 18px;">save</span>
                            Создать страницу
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">Публикация</h5>
                <div class="form-check form-switch">
                    <input class="form-check-input" 
                           type="checkbox" 
                           id="is_published" 
                           name="is_published" 
                           value="1" 
                           {{ old('is_published', true) ? 'checked' : '' }}
                           form="pageForm">
                    <label class="form-check-label" for="is_published">
                        Опубликовать страницу
                    </label>
                </div>
                <hr>
                <small class="text-muted">
                    <span class="material-symbols-rounded align-middle me-1" style="font-size: 16px;">info</span>
                    Неопубликованные страницы не будут отображаться на сайте
                </small>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Транслитерация русских букв в английские
    function transliterate(text) {
        const ru = {
            'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 
            'е': 'e', 'ё': 'yo', 'ж': 'zh', 'з': 'z', 'и': 'i', 
            'й': 'y', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n', 
            'о': 'o', 'п': 'p', 'р': 'r', 'с': 's', 'т': 't', 
            'у': 'u', 'ф': 'f', 'х': 'h', 'ц': 'ts', 'ч': 'ch', 
            'ш': 'sh', 'щ': 'sch', 'ъ': '', 'ы': 'y', 'ь': '', 
            'э': 'e', 'ю': 'yu', 'я': 'ya'
        };
        
        return text.split('').map(char => {
            return ru[char] || ru[char.toLowerCase()] === undefined ? char : ru[char.toLowerCase()];
        }).join('');
    }
    
    // Автоматическая генерация алиаса из названия
    document.getElementById('name').addEventListener('input', function(e) {
        const alias = document.getElementById('alias');
        if (!alias.dataset.manual) {
            let value = e.target.value;
            // Транслитерация
            value = transliterate(value);
            // Приведение к нижнему регистру и очистка
            value = value
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .replace(/^-+|-+$/g, '');
            
            alias.value = value;
        }
    });
    
    document.getElementById('alias').addEventListener('input', function() {
        this.dataset.manual = 'true';
    });
</script>
@endpush
@endsection
