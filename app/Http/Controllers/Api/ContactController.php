<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:50',
            'message' => 'required|string',
        ]);

        // Здесь можно сохранить в БД или отправить email
        // Пока просто логируем
        Log::info('Contact form submitted', $validated);

        // TODO: Отправка email или сохранение в БД
        
        return response()->json([
            'success' => true,
            'message' => 'Спасибо за обращение! Мы свяжемся с вами в ближайшее время.'
        ]);
    }
}
