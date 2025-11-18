<?php

if (!function_exists('setting')) {
    /**
     * Получить значение настройки по ключу
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function setting(string $key, $default = null)
    {
        return \App\Models\Setting::getValue($key, $default);
    }
}

if (!function_exists('settings')) {
    /**
     * Получить все настройки
     *
     * @return array
     */
    function settings(): array
    {
        return \App\Models\Setting::getAllSettings();
    }
}

