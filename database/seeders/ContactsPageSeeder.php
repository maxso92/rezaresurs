<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class ContactsPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Проверяем, существует ли уже страница контактов
        $existingPage = Page::where('alias', 'contacts')->orWhere('alias', 'contact')->first();
        
        if (!$existingPage) {
            Page::create([
                'name' => 'Контакты',
                'alias' => 'contacts',
                'title' => 'Контакты - РЕЗАРЕСУРС',
                'seo_keyword' => 'контакты, связаться, телефон, email, адрес офиса',
                'seo_description' => 'Свяжитесь с нами для обсуждения проектов. Контакты компании РЕЗАРЕСУРС: телефон, email, адрес офиса в Иркутске.',
                'seo_social_title' => 'Контакты - РЕЗАРЕСУРС',
                'seo_social_description' => 'Свяжитесь с нами для обсуждения проектов. Контакты компании РЕЗАРЕСУРС.',
                'content' => '<p>Страница контактов доступна по адресу <a href="/contact">/contact</a></p>',
                'is_published' => true,
            ]);
            
            $this->command->info('Страница "Контакты" успешно создана в админке!');
        } else {
            $this->command->info('Страница контактов уже существует.');
        }
    }
}

