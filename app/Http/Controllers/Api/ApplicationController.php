<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'position' => 'nullable|string|max:255',
        ]);

        $application = Application::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Заявка успешно отправлена. В ближайшее время с вами свяжется специалист.'
        ], 201);
    }
}
