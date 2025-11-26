<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Application;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Передаем количество непросмотренных заявок в layout админки
        View::composer('admin.layouts.app', function ($view) {
            $newApplicationsCount = 0;
            
            // Проверяем, что пользователь авторизован и является админом
            if (auth()->check() && auth()->user()->is_admin) {
                $newApplicationsCount = Application::where('is_viewed', false)->count();
            }
            
            $view->with('newApplicationsCount', $newApplicationsCount);
        });
    }
}
