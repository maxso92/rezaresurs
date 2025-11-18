# Решение проблемы с SQLite

## Проблема
```
could not find driver (Connection: sqlite, SQL: select exists...)
```

Это означает, что PHP расширение для SQLite не установлено или не активировано.

---

## Решение: Установка SQLite расширения для PHP

### Шаг 1: Определите версию PHP

```bash
cd /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru
PHP_PATH="/opt/alt/php83/usr/bin/php"  # или php82

# Проверьте версию
$PHP_PATH -v

# Проверьте установленные расширения
$PHP_PATH -m | grep -i sqlite
```

### Шаг 2: Установите SQLite расширение

#### Вариант A: Через FastPanel (РЕКОМЕНДУЕТСЯ)

1. Зайдите в FastPanel
2. Найдите раздел "PHP" → "Расширения" или "PHP Extensions"
3. Выберите вашу версию PHP (8.2 или 8.3)
4. Найдите и активируйте расширения:
   - `sqlite3`
   - `pdo_sqlite`
5. Сохраните и перезапустите PHP-FPM через панель

#### Вариант B: Через командную строку

```bash
# Для системного PHP
apt-get update
apt-get install -y php8.3-sqlite3 php8.3-pdo-sqlite

# Или для php8.2
apt-get install -y php8.2-sqlite3 php8.2-pdo-sqlite
```

**Примечание:** Если используете PHP из FastPanel (`/opt/alt/php83/`), лучше устанавливать расширения через панель управления, так как FastPanel может использовать собственные пути.

### Шаг 3: Проверьте установку

```bash
PHP_PATH="/opt/alt/php83/usr/bin/php"

# Проверьте что расширения загружены
$PHP_PATH -m | grep -i sqlite

# Должны быть:
# - sqlite3
# - pdo_sqlite
```

### Шаг 4: Настройте .env файл

```bash
cd /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru

# Убедитесь что .env существует
cp .env.example .env

# Откройте для редактирования
nano .env
```

В файле `.env` установите:

```env
DB_CONNECTION=sqlite
# DB_DATABASE должен указывать на путь к файлу SQLite
# Можно оставить пустым (будет использован database/database.sqlite)
# Или указать полный путь:
# DB_DATABASE=/var/www/rezaresurs_r_usr/data/www/rezaresurs.ru/database/database.sqlite
```

### Шаг 5: Создайте файл базы данных SQLite

```bash
cd /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru

# Создайте файл базы данных (если не существует)
touch database/database.sqlite

# Установите правильные права
WEB_USER="www-data"  # или rezaresurs_r_usr
chmod 664 database/database.sqlite
chown $WEB_USER:$WEB_USER database/database.sqlite
```

### Шаг 6: Очистите кеш конфигурации

```bash
PHP_PATH="/opt/alt/php83/usr/bin/php"

$PHP_PATH artisan config:clear
$PHP_PATH artisan cache:clear
```

### Шаг 7: Запустите миграции

```bash
$PHP_PATH artisan migrate --force
```

---

## Быстрое решение (все команды сразу)

```bash
cd /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru

# 1. Установите SQLite расширение (через FastPanel или):
apt-get update
apt-get install -y php8.3-sqlite3 php8.3-pdo-sqlite

# 2. Создайте файл БД
touch database/database.sqlite
chmod 664 database/database.sqlite
chown www-data:www-data database/database.sqlite

# 3. Настройте .env
nano .env
# Установите: DB_CONNECTION=sqlite

# 4. Очистите кеш и запустите миграции
PHP_PATH="/opt/alt/php83/usr/bin/php"
$PHP_PATH artisan config:clear
$PHP_PATH artisan migrate --force
```

---

## Проверка работы SQLite

После установки проверьте:

```bash
PHP_PATH="/opt/alt/php83/usr/bin/php"

# 1. Проверьте расширения
$PHP_PATH -m | grep sqlite

# 2. Проверьте подключение через tinker
$PHP_PATH artisan tinker

# В tinker выполните:
# DB::connection()->getPdo();
# exit

# 3. Проверьте файл БД
ls -la database/database.sqlite
```

---

## Важные моменты для SQLite в продакшене

1. **Права доступа**: Веб-сервер должен иметь права на запись в файл БД
   ```bash
   chmod 664 database/database.sqlite
   chown www-data:www-data database/database.sqlite
   ```

2. **Путь к файлу**: Убедитесь что путь правильный в `.env` или используйте относительный путь

3. **Бэкапы**: Регулярно делайте бэкапы файла `database/database.sqlite`

4. **Производительность**: SQLite подходит для небольших проектов. Для больших нагрузок лучше использовать MySQL

---

## Если расширения все еще не работают

Проверьте конфигурацию PHP:

```bash
# Проверьте загруженные ini файлы
PHP_PATH="/opt/alt/php83/usr/bin/php"
$PHP_PATH --ini

# Проверьте есть ли sqlite в конфигурации
$PHP_PATH -i | grep -i sqlite

# Перезапустите PHP-FPM
systemctl restart php8.3-fpm
# Или через FastPanel перезапустите PHP
```

---

## Альтернатива: Переключение на MySQL

Если SQLite вызывает проблемы, можно переключиться на MySQL:

1. Создайте БД в FastPanel
2. В `.env` установите:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_DATABASE=имя_бд
   DB_USERNAME=пользователь
   DB_PASSWORD=пароль
   ```
3. Очистите кеш: `php artisan config:clear`
4. Запустите миграции: `php artisan migrate --force`

Но если вы решили использовать SQLite, следуйте инструкциям выше!

