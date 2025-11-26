<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Сначала непросмотренные, затем по дате создания
        $applications = Application::orderBy('is_viewed', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        return view('admin.applications.index', compact('applications'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $application = Application::findOrFail($id);
        
        // Помечаем заявку как просмотренную при открытии
        if (!$application->is_viewed) {
            $application->update(['is_viewed' => true]);
        }
        
        return view('admin.applications.edit', compact('application'));
    }
    
    /**
     * Mark application as viewed/unviewed
     */
    public function toggleViewed(string $id)
    {
        $application = Application::findOrFail($id);
        $newStatus = !$application->is_viewed;
        $application->update(['is_viewed' => $newStatus]);
        
        return redirect()->back()->with('success', $newStatus ? 'Заявка отмечена как просмотренная' : 'Заявка отмечена как новая');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $application = Application::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'position' => 'nullable|string|max:255',
        ]);

        $application->update($validated);

        return redirect()->route('admin.applications.index')->with('success', 'Заявка успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $application = Application::findOrFail($id);
        $application->delete();

        return redirect()->route('admin.applications.index')->with('success', 'Заявка успешно удалена');
    }
}
