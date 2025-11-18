<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });
        
        // Вставляем дефолтные значения
        DB::table('settings')->insert([
            ['key' => 'favicon', 'value' => null, 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'cookie_message', 'value' => 'Мы используем файлы cookie для улучшения работы сайта', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'cookie_enabled', 'value' => '0', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'bitrix_url', 'value' => null, 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'yandex_metrica_code', 'value' => null, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
