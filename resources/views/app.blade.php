<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Базовые meta теги для SEO (будут обновляться динамически через Vue) -->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- Open Graph теги -->
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
    <!-- Twitter Card теги -->
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <!-- Шаблон стили -->
    <link rel="stylesheet" href="{{ asset('rez/css/bootstrap/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('rez/css/fonts.css') }}" />
    <link rel="stylesheet" href="{{ asset('rez/css/style.css') }}" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div id="app"></div>
</body>
</html>

