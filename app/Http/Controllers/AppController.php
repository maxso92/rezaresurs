<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index(Request $request)
    {
        $currentPath = $request->path();
        
        // Определяем alias страницы для проверки редиректа
        $pageAlias = null;
        if ($currentPath === '' || $currentPath === '/') {
            // Главная страница - пробуем несколько возможных алиасов
            $aliasesToTry = ['home', 'index', 'main', 'glavnaya'];
            foreach ($aliasesToTry as $alias) {
                $page = Page::where('alias', $alias)
                    ->whereNotNull('redirect_url')
                    ->where('redirect_url', '!=', '')
                    ->first();
                
                if ($page && $page->redirect_url) {
                    $redirectUrl = trim($page->redirect_url);
                    $currentUrl = url()->current();
                    
                    if ($redirectUrl !== $currentUrl) {
                        return redirect($redirectUrl, 301);
                    }
                }
                
                // Проверяем, существует ли опубликованная страница
                $publishedPage = Page::where('alias', $alias)
                    ->where('is_published', true)
                    ->first();
                if ($publishedPage) {
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
        
        // Проверяем редирект для найденной страницы
        if ($pageAlias) {
            $pageForRedirect = Page::where('alias', $pageAlias)
                ->whereNotNull('redirect_url')
                ->where('redirect_url', '!=', '')
                ->first();
            
            if ($pageForRedirect && $pageForRedirect->redirect_url) {
                $redirectUrl = trim($pageForRedirect->redirect_url);
                $currentUrl = url()->current();
                
                if ($redirectUrl !== $currentUrl) {
                    return redirect($redirectUrl, 301);
                }
            }
        }
        
        return view('app');
    }
}


