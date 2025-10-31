<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'alias' => 'required|string|unique:pages,alias',
            'title' => 'nullable|string|max:255',
            'seo_keyword' => 'nullable|string',
            'seo_description' => 'nullable|string',
            'seo_social_title' => 'nullable|string',
            'seo_social_description' => 'nullable|string',
            'content' => 'nullable|string',
            'is_published' => 'boolean',
        ]);

        Page::create($validated);

        return redirect()->route('admin.pages.index')->with('success', 'Страница успешно создана');
    }

    public function show(string $id)
    {
        $page = Page::findOrFail($id);
        return view('admin.pages.show', compact('page'));
    }

    public function edit(string $id)
    {
        $page = Page::findOrFail($id);
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, string $id)
    {
        $page = Page::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'alias' => 'required|string|unique:pages,alias,' . $id,
            'title' => 'nullable|string|max:255',
            'seo_keyword' => 'nullable|string',
            'seo_description' => 'nullable|string',
            'seo_social_title' => 'nullable|string',
            'seo_social_description' => 'nullable|string',
            'content' => 'nullable|string',
            'is_published' => 'boolean',
        ]);

        $page->update($validated);

        return redirect()->route('admin.pages.index')->with('success', 'Страница успешно обновлена');
    }

    public function destroy(string $id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return redirect()->route('admin.pages.index')->with('success', 'Страница успешно удалена');
    }
}
