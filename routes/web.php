<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Api\PageController as ApiPageController;
use App\Http\Controllers\Api\ContactController;

// Тестовая страница иконок
Route::get('/test-icons', function () {
    return view('admin.test-icons');
});

// Главная страница (Vue SPA)
Route::get('/', function () {
    return view('app');
});

// API роуты для Vue frontend
Route::prefix('api')->group(function () {
    Route::get('/pages', [ApiPageController::class, 'index']);
    Route::get('/pages/{alias}', [ApiPageController::class, 'show']);
    Route::get('/pages/{alias}/seo', [ApiPageController::class, 'seo']);
    Route::post('/contact', [ContactController::class, 'submit']);
});

// Админ панель - авторизация
Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    
    // Защищенные маршруты админки
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');
        Route::resource('users', UserController::class)->names([
            'index' => 'admin.users.index',
            'create' => 'admin.users.create',
            'store' => 'admin.users.store',
            'show' => 'admin.users.show',
            'edit' => 'admin.users.edit',
            'update' => 'admin.users.update',
            'destroy' => 'admin.users.destroy',
        ]);
        Route::resource('pages', AdminPageController::class)->names([
            'index' => 'admin.pages.index',
            'create' => 'admin.pages.create',
            'store' => 'admin.pages.store',
            'show' => 'admin.pages.show',
            'edit' => 'admin.pages.edit',
            'update' => 'admin.pages.update',
            'destroy' => 'admin.pages.destroy',
        ]);
        Route::delete('/pages/{id}/cover', [AdminPageController::class, 'deleteCoverImage'])->name('admin.pages.delete-cover');
        
        // Настройки сайта
        Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings.index');
        Route::post('/settings', [SettingController::class, 'update'])->name('admin.settings.update');
        Route::delete('/settings/favicon', [SettingController::class, 'deleteFavicon'])->name('admin.settings.delete-favicon');
    });
});

// Catch-all route для Vue Router (должен быть последним)
Route::get('/{any}', function () {
    return view('app');
})->where('any', '^(?!admin|api).*$');
