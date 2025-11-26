<!DOCTYPE html>
<html lang="ru" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Админ-панель') - Резаресурс</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--Bootstrap icons-->
    <link href="{{ asset('admin-dashboard/assets/fonts/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

    <!--Google web fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@100..900&family=IBM+Plex+Mono:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">

    <!--Simplebar css-->
    <link rel="stylesheet" href="{{ asset('admin-dashboard/assets/vendor/css/simplebar.min.css') }}">

    <!--Main style-->
    <link rel="stylesheet" href="{{ asset('admin-dashboard/assets/css/style.min.css') }}">

    <!--Custom colors-->
    <link rel="stylesheet" href="{{ asset('admin-custom.css') }}">

    @stack('styles')
</head>
<body>
    <div class="d-flex flex-column flex-root">
        <!--Page-->
        <div class="page d-flex flex-row flex-column-fluid">

            <!--///////////Page sidebar begin///////////////-->
            <aside class="page-sidebar">
                <div class="h-100 flex-column d-flex justify-content-start">

                    <!--Aside-logo-->
                    <div class="aside-logo d-flex align-items-center flex-shrink-0 justify-content-start px-5 position-relative">
                        <a href="{{ route('admin.dashboard') }}" class="d-block">
                            <div class="d-flex align-items-center flex-no-wrap text-truncate">
                                <span class="sidebar-text">
                                    <!--Sidebar-text-->
                                    <span class="sidebar-text text-truncate fs-3 fw-bold">
                                        Резаресурс
                                    </span>
                                </span>
                            </div>
                        </a>
                    </div>

                    <!--Sidebar-Menu-->
                    <div class="aside-menu px-3 my-auto" data-simplebar>
                        <nav class="flex-grow-1 h-100" id="page-navbar">
                            <!--:Sidebar nav-->
                            <ul class="nav flex-column collapse-group collapse d-flex">
                                <li class="nav-item sidebar-title text-truncate opacity-50 small">
                                    <i class="bi bi-three-dots"></i>
                                    <span>Меню</span>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.dashboard') }}" class="nav-link d-flex align-items-center text-truncate @if(request()->routeIs('admin.dashboard')) active @endif">
                                        <span class="sidebar-icon">
                                            <span class="material-symbols-rounded">dashboard</span>
                                        </span>
                                        <span class="sidebar-text">Главная</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.pages.index') }}" class="nav-link d-flex align-items-center text-truncate @if(request()->routeIs('admin.pages.*')) active @endif">
                                        <span class="sidebar-icon">
                                            <span class="material-symbols-rounded">article</span>
                                        </span>
                                        <span class="sidebar-text">Страницы</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.users.index') }}" class="nav-link d-flex align-items-center text-truncate @if(request()->routeIs('admin.users.*')) active @endif">
                                        <span class="sidebar-icon">
                                            <span class="material-symbols-rounded">group</span>
                                        </span>
                                        <span class="sidebar-text">Пользователи</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.applications.index') }}" class="nav-link d-flex align-items-center text-truncate @if(request()->routeIs('admin.applications.*')) active @endif">
                                        <span class="sidebar-icon">
                                            <span class="material-symbols-rounded">inbox</span>
                                        </span>
                                        <span class="sidebar-text">Заявки</span>
                                        @if($newApplicationsCount > 0)
                                            <span class="badge bg-danger rounded-pill ms-auto" style="font-size: 11px; min-width: 20px; height: 20px; line-height: 20px; padding: 0 6px;">
                                                {{ $newApplicationsCount }}
                                            </span>
                                        @endif
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.settings.index') }}" class="nav-link d-flex align-items-center text-truncate @if(request()->routeIs('admin.settings.*')) active @endif">
                                        <span class="sidebar-icon">
                                            <span class="material-symbols-rounded">settings</span>
                                        </span>
                                        <span class="sidebar-text">Настройки</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </aside>
            <!--///////////Page Sidebar End///////////////-->

            <!--///Sidebar close button for 991px or below devices///-->
            <div class="sidebar-close d-lg-none">
                <a href="#"></a>
            </div>
            <!--///.Sidebar close end///-->

            <!--///////////Page content wrapper///////////////-->
            <main class="page-content d-flex flex-column flex-row-fluid">

                <!--//page-header//-->
                <header class="navbar mb-3 px-3 px-lg-6 align-items-center page-header navbar-expand navbar-light">
                    <a href="{{ route('admin.dashboard') }}" class="navbar-brand d-block d-lg-none">
                        <div class="d-flex align-items-center flex-no-wrap text-truncate">
                            <span class="sidebar-icon bg-gradient-primary rounded-3 size-40 fw-bolder text-white">РР</span>
                        </div>
                    </a>

                    <ul class="navbar-nav d-flex align-items-center h-100">
                        <li class="nav-item d-none d-lg-flex flex-column h-100 me-2 align-items-center justify-content-center">
                            <a href="javascript:void(0)" class="sidebar-trigger nav-link size-40 d-flex align-items-center justify-content-center p-0">
                                <span class="material-symbols-rounded">menu_open</span>
                            </a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto d-flex align-items-center h-100">
                        <!--:Dark Mode:-->
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" id="bs-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static">
                                <span class="theme-icon-active d-flex align-items-center">
                                    <span class="material-symbols-rounded align-middle"></span>
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bs-theme" style="--bs-dropdown-min-width: 9rem;">
                                <li class="mb-1">
                                    <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="light">
                                        <span class="theme-icon d-flex align-items-center">
                                            <span class="material-symbols-rounded align-middle me-2">lightbulb</span>
                                        </span>
                                        Светлая
                                    </button>
                                </li>
                                <li class="mb-1">
                                    <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark">
                                        <span class="theme-icon d-flex align-items-center">
                                            <span class="material-symbols-rounded align-middle me-2">dark_mode</span>
                                        </span>
                                        Темная
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto">
                                        <span class="theme-icon d-flex align-items-center">
                                            <span class="material-symbols-rounded align-middle me-2">invert_colors</span>
                                        </span>
                                        Авто
                                    </button>
                                </li>
                            </ul>
                        </li>

                        <!--:User dropdown:-->
                        <li class="nav-item dropdown ms-3">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle d-flex align-items-center py-0 pe-0">
                                <div class="position-relative d-none d-md-block me-2">
                                    <span>{{ auth()->user()->name }}</span>
                                </div>
                                <div class="avatar-status status-online avatar">
                                    <span class="avatar-text rounded-circle bg-gradient-primary text-white d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                    </span>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <h6 class="dropdown-header">{{ auth()->user()->name }}</h6>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('admin.logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item d-flex align-items-center">
                                            <span class="material-symbols-rounded me-2">logout</span>
                                            Выход
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </header>
                <!--//page-header//-->

                <!--//content//-->
                <div class="content px-3 px-lg-6 d-flex flex-column-fluid">
                    <div class="container-fluid px-0">

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @yield('content')
                    </div>
                </div>

                <!--//Page-footer//-->
                <footer class="pb-3 pb-lg-5 px-3 px-lg-6">
                    <div class="container-fluid px-0">
                        <span class="d-block lh-sm small text-body-secondary text-end">&copy;
                            <script>document.write(new Date().getFullYear())</script>. Резаресурс
                        </span>
                    </div>
                </footer>
                <!--/.Page Footer End-->
            </main>
        </div>
    </div>

    <script src="{{ asset('admin-dashboard/assets/vendor/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin-dashboard/assets/js/theme.bundle.min.js') }}"></script>
    @stack('scripts')
</body>
</html>

