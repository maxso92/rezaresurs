# Проект на Laravel + Vue.js

Сайт с админ-панелью на Laravel и фронтендом на Vue.js с возможностью управления страницами и пользователями.

## Требования

- PHP 8.2+
- Composer
- Node.js 20+
- NPM
- SQLite (или другая БД)

## Установка

Проект уже установлен. Если нужно переустановить:

```bash
# Установка зависимостей Composer
composer install

# Установка зависимостей NPM
npm install

# Копирование файла конфигурации (если нет .env)
cp .env.example .env

# Генерация ключа приложения
php artisan key:generate

# Запуск миграций
php artisan migrate

# Создание первого администратора
php artisan db:seed --class=AdminUserSeeder
```

## Запуск проекта

### Вариант 1: Два терминала

```bash
# Терминал 1 - Laravel сервер
php artisan serve

# Терминал 2 - Vite для сборки фронтенда
npm run dev
```

### Вариант 2: Один терминал (production)

```bash
# Сборка фронтенда
npm run build

# Запуск сервера
php artisan serve
```

## Доступ

- **Главная страница (Vue SPA)**: http://localhost:8000
- **Админ-панель**: http://localhost:8000/admin/login
  - Email: `admin@admin.com`
  - Пароль: `password`

## Структура проекта

### Backend (Laravel)

- **Модели**: `app/Models/`
  - `User.php` - пользователи
  - `Page.php` - страницы
  
- **Контроллеры**:
  - `app/Http/Controllers/Admin/` - контроллеры админки
    - `AuthController.php` - авторизация
    - `UserController.php` - управление пользователями
    - `PageController.php` - управление страницами
  - `app/Http/Controllers/Api/` - API для Vue
    - `PageController.php` - API страниц
    - `ContactController.php` - обработка форм обратной связи

- **Middleware**: `app/Http/Middleware/IsAdmin.php` - проверка прав администратора

- **Роуты**: `routes/web.php`

- **Views**: `resources/views/`
  - `app.blade.php` - главный layout для Vue SPA
  - `admin/` - шаблоны админки (Blade)

### Frontend (Vue.js)

- **Главный файл**: `resources/js/app.js`
- **Компоненты**: `resources/js/components/`
  - `App.vue` - главный компонент
  - `Home.vue` - главная страница
  - `PageView.vue` - просмотр страницы
  - `Contact.vue` - форма обратной связи

### База данных

Таблицы:
- `users` - пользователи (name, email, password, is_admin, status)
- `pages` - страницы (name, alias, title, seo_keyword, seo_description, seo_social_title, seo_social_description, content, is_published)

## API Endpoints

- `GET /api/pages` - список всех опубликованных страниц
- `GET /api/pages/{alias}` - получение страницы по алиасу
- `POST /api/contact` - отправка формы обратной связи

## Админ-панель

### Страницы
- `/admin/pages` - список страниц
- `/admin/pages/create` - создание страницы
- `/admin/pages/{id}/edit` - редактирование страницы
- `/admin/pages/{id}` - просмотр страницы

### Пользователи
- `/admin/users` - список пользователей
- `/admin/users/create` - создание пользователя
- `/admin/users/{id}/edit` - редактирование пользователя
- `/admin/users/{id}` - просмотр пользователя

## Возможности

### Frontend (Vue.js)
- ✅ SPA на Vue 3
- ✅ Vue Router для навигации без перезагрузки
- ✅ Динамическая подгрузка страниц через API
- ✅ Форма обратной связи с валидацией
- ✅ SEO meta-теги

### Backend (Laravel)
- ✅ Аутентификация
- ✅ Middleware для защиты админки
- ✅ CRUD для страниц
- ✅ CRUD для пользователей
- ✅ RESTful API

## Дальнейшее развитие

Сейчас созданы только базовая структура и простые стили. Вы можете:

1. Добавить HTML шаблоны к админке и Vue компонентам
2. Добавить Rich Text Editor для редактирования контента (например, TinyMCE или Quill)
3. Добавить загрузку изображений
4. Добавить дополнительные поля к страницам
5. Настроить отправку email из форм обратной связи
6. Добавить многоязычность
7. Настроить SEO оптимизацию

## Разработка

```bash
# Очистка кеша
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Проверка роутов
php artisan route:list

# Создание новой миграции
php artisan make:migration create_table_name

# Создание нового контроллера
php artisan make:controller ControllerName

# Создание новой модели
php artisan make:model ModelName
```

## Технологии

- **Backend**: Laravel 12
- **Frontend**: Vue 3 + Vue Router 4
- **Build**: Vite
- **CSS**: Tailwind CSS (настроен)
- **HTTP Client**: Axios
- **Database**: SQLite (по умолчанию)

## Лицензия

MIT
