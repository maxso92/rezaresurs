<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::getAllSettings();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'cookie_message' => 'nullable|string',
            'cookie_enabled' => 'nullable|boolean',
            'bitrix_url' => 'nullable|url',
            'yandex_metrica_code' => 'nullable|string',
            'telegram_callback_token' => 'nullable|string|max:255',
            'telegram_callback_id' => 'nullable|string|max:255',
            'favicon' => 'nullable|image|mimes:png,jpg,ico|max:2048',
        ]);

        // Обработка favicon
        if ($request->hasFile('favicon')) {
            $file = $request->file('favicon');
            $filename = 'favicon.' . $file->getClientOriginalExtension();
            
            // Удаляем старый favicon если есть
            $oldFavicon = Setting::getValue('favicon');
            if ($oldFavicon && Storage::disk('public')->exists($oldFavicon)) {
                Storage::disk('public')->delete($oldFavicon);
            }
            
            // Сохраняем новый
            $path = $file->storeAs('settings', $filename, 'public');
            Setting::setValue('favicon', $path);
        }

        // Сохраняем остальные настройки
        Setting::setValue('cookie_message', $request->input('cookie_message'));
        Setting::setValue('cookie_enabled', $request->has('cookie_enabled') ? '1' : '0');
        Setting::setValue('bitrix_url', $request->input('bitrix_url'));
        Setting::setValue('yandex_metrica_code', $request->input('yandex_metrica_code'));
        Setting::setValue('telegram_callback_token', $request->input('telegram_callback_token'));
        Setting::setValue('telegram_callback_id', $request->input('telegram_callback_id'));

        return redirect()->route('admin.settings.index')->with('success', 'Настройки успешно обновлены');
    }

    public function deleteFavicon()
    {
        $favicon = Setting::getValue('favicon');
        if ($favicon && Storage::disk('public')->exists($favicon)) {
            Storage::disk('public')->delete($favicon);
        }
        Setting::setValue('favicon', null);

        return redirect()->route('admin.settings.index')->with('success', 'Favicon успешно удален');
    }
}

