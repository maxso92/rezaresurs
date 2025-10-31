<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Админ-панель')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--Bootstrap icons-->
    <link href="{{ asset('admin-dashboard/assets/fonts/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

    <!--Google web fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@100..900&family=IBM+Plex+Mono:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    
    <!--Main style-->
    <link rel="stylesheet" href="{{ asset('admin-dashboard/assets/css/style.min.css') }}">
    
    <!--Custom colors-->
    <link rel="stylesheet" href="{{ asset('admin-custom.css') }}">
    
    @stack('styles')
</head>
<body>
    @yield('content')

    <script src="{{ asset('admin-dashboard/assets/js/theme.bundle.min.js') }}"></script>
    @stack('scripts')
</body>
</html>

