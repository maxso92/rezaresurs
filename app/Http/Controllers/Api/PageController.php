<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::where('is_published', true)
            ->select('id', 'name', 'alias', 'title')
            ->get();
            
        return response()->json($pages);
    }

    public function show($alias)
    {
        $page = Page::where('alias', $alias)
            ->where('is_published', true)
            ->firstOrFail();
            
        return response()->json($page);
    }

    public function seo($alias)
    {
        $page = Page::where('alias', $alias)
            ->where('is_published', true)
            ->select('title', 'seo_keyword', 'seo_description', 'seo_social_title', 'seo_social_description', 'cover_image')
            ->first();
            
        if (!$page) {
            return response()->json([
                'title' => null,
                'seo_keyword' => null,
                'seo_description' => null,
                'seo_social_title' => null,
                'seo_social_description' => null,
                'cover_image' => null
            ]);
        }
        
        // Добавляем полный URL к изображению обложки
        if ($page->cover_image) {
            $page->cover_image_url = asset('storage/' . $page->cover_image);
        } else {
            $page->cover_image_url = null;
        }
            
        return response()->json($page);
    }

    public function checkRedirect($alias)
    {
        // Декодируем alias (может быть закодирован как %2F для главной)
        $alias = urldecode($alias);
        
        // Для главной страницы пробуем несколько алиасов
        if ($alias === '' || $alias === '/' || $alias === '%2F') {
            $aliasesToTry = ['home', 'index', 'main', 'glavnaya'];
            foreach ($aliasesToTry as $tryAlias) {
                $page = Page::where('alias', $tryAlias)
                    ->whereNotNull('redirect_url')
                    ->where('redirect_url', '!=', '')
                    ->first();
                
                if ($page && $page->redirect_url) {
                    return response()->json([
                        'has_redirect' => true,
                        'redirect_url' => trim($page->redirect_url)
                    ]);
                }
            }
        } else {
            $page = Page::where('alias', $alias)
                ->whereNotNull('redirect_url')
                ->where('redirect_url', '!=', '')
                ->first();
            
            if ($page && $page->redirect_url) {
                return response()->json([
                    'has_redirect' => true,
                    'redirect_url' => trim($page->redirect_url)
                ]);
            }
        }
        
        return response()->json([
            'has_redirect' => false,
            'redirect_url' => null
        ]);
    }
}
