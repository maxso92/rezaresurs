<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @php
        $favicon = \App\Models\Setting::getValue('favicon');
        $yandexMetrica = \App\Models\Setting::getValue('yandex_metrica_code');
        
        // Определяем текущий путь
        $currentPath = request()->path();
        
        // Определяем alias страницы для загрузки SEO
        $pageAlias = null;
        if ($currentPath === '' || $currentPath === '/') {
            // Главная страница - пробуем несколько возможных алиасов
            $aliasesToTry = ['home', 'index', 'main', 'glavnaya'];
            foreach ($aliasesToTry as $alias) {
                $page = \App\Models\Page::where('alias', $alias)
                    ->where('is_published', true)
                    ->first();
                if ($page) {
                    $pageAlias = $alias;
                    break;
                }
            }
        } elseif (in_array($currentPath, ['about', 'contact'])) {
            // Статические страницы
            $pageAlias = $currentPath;
        } else {
            // Динамические страницы - используем путь как alias
            $pageAlias = $currentPath;
        }
        
        // Загружаем SEO данные
        $seo = null;
        if ($pageAlias) {
            $page = \App\Models\Page::where('alias', $pageAlias)
                ->where('is_published', true)
                ->select('title', 'seo_keyword', 'seo_description', 'seo_social_title', 'seo_social_description', 'cover_image')
                ->first();
            
            if ($page) {
                $seo = [
                    'title' => $page->title,
                    'seo_keyword' => $page->seo_keyword,
                    'seo_description' => $page->seo_description,
                    'seo_social_title' => $page->seo_social_title,
                    'seo_social_description' => $page->seo_social_description,
                    'cover_image_url' => $page->cover_image ? asset('storage/' . $page->cover_image) : null,
                ];
            }
        }
        
        // Устанавливаем значения по умолчанию, если SEO не найдено
        $title = ($seo && isset($seo['title'])) ? $seo['title'] : config('app.name', 'Laravel');
        $description = ($seo && isset($seo['seo_description'])) ? $seo['seo_description'] : '';
        $keywords = ($seo && isset($seo['seo_keyword'])) ? $seo['seo_keyword'] : '';
        $ogTitle = ($seo && isset($seo['seo_social_title'])) ? $seo['seo_social_title'] : $title;
        $ogDescription = ($seo && isset($seo['seo_social_description'])) ? $seo['seo_social_description'] : $description;
        $ogImage = ($seo && isset($seo['cover_image_url'])) ? $seo['cover_image_url'] : '';
    @endphp
    
    <title>{{ $title }}</title>
    
    <!-- Favicon -->
    @if($favicon)
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/' . $favicon) }}">
    @endif
    
    <!-- Базовые meta теги для SEO -->
    @if($description)
        <meta name="description" content="{{ $description }}">
    @endif
    @if($keywords)
        <meta name="keywords" content="{{ $keywords }}">
    @endif
    
    <!-- Open Graph теги -->
    @if($ogTitle)
        <meta property="og:title" content="{{ $ogTitle }}">
    @endif
    @if($ogDescription)
        <meta property="og:description" content="{{ $ogDescription }}">
    @endif
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="{{ config('app.name', 'Laravel') }}">
    @if($ogImage)
        <meta property="og:image" content="{{ $ogImage }}">
    @endif
    
    <!-- Twitter Card теги -->
    @if($ogTitle)
        <meta name="twitter:title" content="{{ $ogTitle }}">
    @endif
    @if($ogDescription)
        <meta name="twitter:description" content="{{ $ogDescription }}">
    @endif
    @if($ogImage)
        <meta name="twitter:image" content="{{ $ogImage }}">
    @endif
    <meta name="twitter:card" content="summary_large_image">
    <!-- Шаблон стили -->
    <link rel="stylesheet" href="{{ asset('rez/css/bootstrap/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('rez/css/fonts.css') }}" />
    <link rel="stylesheet" href="{{ asset('rez/css/style.css') }}" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Яндекс Метрика -->
    @if($yandexMetrica)
        {!! $yandexMetrica !!}
    @endif
</head>
<body>
    <div id="app"></div>
</body>
</html>

