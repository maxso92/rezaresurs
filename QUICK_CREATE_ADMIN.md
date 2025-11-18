# Быстрое создание администратора через консоль

## Вариант 1: Через сидер (РЕКОМЕНДУЕТСЯ - самый быстрый)

```bash
cd /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru
PHP_PATH="/opt/alt/php83/usr/bin/php"

# Запустить только сидер админа
$PHP_PATH artisan db:seed --class=AdminUserSeeder
```

**Создаст админа с данными:**
- Email: `admin@admin.com`
- Пароль: `password`

---

## Вариант 2: Через tinker (ручное создание)

```bash
cd /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru
PHP_PATH="/opt/alt/php83/usr/bin/php"

$PHP_PATH artisan tinker
```

Затем в tinker выполните:

```php
use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::create([
    'name' => 'Admin',
    'email' => 'admin@admin.com',
    'password' => Hash::make('password'),
    'is_admin' => true,
    'status' => 'active',
]);

exit
```

---

## Вариант 3: Одна команда (если tinker не подходит)

```bash
cd /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru
PHP_PATH="/opt/alt/php83/usr/bin/php"

$PHP_PATH artisan tinker --execute="use App\Models\User; use Illuminate\Support\Facades\Hash; User::create(['name' => 'Admin', 'email' => 'admin@admin.com', 'password' => Hash::make('password'), 'is_admin' => true, 'status' => 'active']);"
```

---

## Самый быстрый способ (выполните на сервере):

```bash
cd /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru && /opt/alt/php83/usr/bin/php artisan db:seed --class=AdminUserSeeder
```

**Готово!** Админ создан: `admin@admin.com` / `password`

