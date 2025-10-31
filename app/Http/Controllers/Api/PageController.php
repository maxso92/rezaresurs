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
            ->select('title', 'seo_keyword', 'seo_description', 'seo_social_title', 'seo_social_description')
            ->first();
            
        if (!$page) {
            return response()->json([
                'title' => null,
                'seo_keyword' => null,
                'seo_description' => null,
                'seo_social_title' => null,
                'seo_social_description' => null
            ]);
        }
            
        return response()->json($page);
    }
}
