# Решение проблемы с базой данных

## Проблема
```
could not find driver (Connection: sqlite, SQL: select exists...)
```

Это означает, что Laravel пытается использовать SQLite вместо MySQL.

---

## Решение 1: Настройка .env файла (ОСНОВНОЕ)

### Шаг 1: Проверьте существует ли .env файл

```bash
cd /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru
ls -la .env
```

### Шаг 2: Если .env нет, создайте его

```bash
cp .env.example .env
```

### Шаг 3: Отредактируйте .env файл

```bash
nano .env
```

### Шаг 4: Установите правильные параметры БД

Обязательно установите следующие параметры:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=имя_вашей_базы_данных
DB_USERNAME=имя_пользователя_бд
DB_PASSWORD=пароль_бд
```

**Где взять данные для БД:**
1. Зайдите в FastPanel
2. Найдите раздел "Базы данных" или "MySQL"
3. Создайте новую базу данных (если еще не создана)
4. Скопируйте имя БД, пользователя и пароль

**Пример правильного .env:**
```env
APP_NAME="Rezaresurs"
APP_ENV=production
APP_KEY=base64:ваш_ключ_будет_здесь
APP_DEBUG=false
APP_URL=https://rezaresurs.ru

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rezaresurs_db
DB_USERNAME=rezaresurs_user
DB_PASSWORD=ваш_пароль_здесь
```

### Шаг 5: Сохраните файл
- В nano: `Ctrl+O`, `Enter`, `Ctrl+X`

---

## Решение 2: Установка PHP расширений для MySQL

Проверьте установлены ли расширения MySQL:

```bash
# Определите путь к PHP
PHP_PATH="/opt/alt/php83/usr/bin/php"  # или php82

# Проверьте установленные расширения
$PHP_PATH -m | grep -i mysql
$PHP_PATH -m | grep -i pdo

# Должны быть:
# - pdo_mysql
# - mysql
# - mysqli
```

### Если расширения не установлены:

#### Для FastPanel (рекомендуется):

```bash
# Установите расширения через FastPanel:
# 1. Зайдите в FastPanel
# 2. Найдите раздел "PHP" или "Расширения PHP"
# 3. Для вашей версии PHP установите:
#    - php8.3-mysql (или php8.2-mysql)
#    - php8.3-pdo (или php8.2-pdo)
```

#### Или через командную строку:

```bash
# Для Ubuntu 24.04
apt-get update
apt-get install -y php8.3-mysql php8.3-pdo

# Или для FastPanel PHP
# Обычно FastPanel устанавливает PHP в /opt/alt/php83/
# Нужно установить расширения через панель управления
```

---

## Решение 3: Очистка кеша конфигурации

После изменения .env обязательно очистите кеш:

```bash
cd /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru
PHP_PATH="/opt/alt/php83/usr/bin/php"

# Очистите весь кеш
$PHP_PATH artisan config:clear
$PHP_PATH artisan cache:clear
$PHP_PATH artisan route:clear
$PHP_PATH artisan view:clear

# Теперь попробуйте снова
$PHP_PATH artisan migrate --force
```

---

## Решение 4: Проверка подключения к БД

Перед запуском миграций проверьте подключение:

```bash
$PHP_PATH artisan tinker
```

В tinker выполните:

```php
DB::connection()->getPdo();
// Должно вернуть: object(PDO) или сообщение об успехе

// Если ошибка - проверьте настройки .env
exit
```

---

## Быстрое решение (все шаги сразу)

```bash
cd /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru
PHP_PATH="/opt/alt/php83/usr/bin/php"

# 1. Создайте/обновите .env
nano .env
# Установите: DB_CONNECTION=mysql и данные БД

# 2. Очистите кеш
$PHP_PATH artisan config:clear
$PHP_PATH artisan cache:clear

# 3. Проверьте подключение
$PHP_PATH artisan migrate --force
```

---

## Создание базы данных через FastPanel

Если база данных еще не создана:

1. Зайдите в FastPanel
2. Найдите раздел "Базы данных MySQL" или "MySQL Databases"
3. Нажмите "Создать базу данных"
4. Введите имя (например: `rezaresurs_db`)
5. Создайте пользователя БД (например: `rezaresurs_user`)
6. Установите пароль
7. Назначьте все права пользователю на эту БД
8. Скопируйте данные в .env файл

---

## Альтернатива: Использование SQLite (не рекомендуется для продакшена)

Если по какой-то причине нужно использовать SQLite:

```bash
# 1. Установите расширение SQLite
apt-get install php8.3-sqlite3

# 2. Создайте файл БД
touch database/database.sqlite
chmod 664 database/database.sqlite
chown www-data:www-data database/database.sqlite

# 3. В .env установите:
# DB_CONNECTION=sqlite
# DB_DATABASE=/var/www/rezaresurs_r_usr/data/www/rezaresurs.ru/database/database.sqlite
```

**Но рекомендуется использовать MySQL для продакшена!**

---

## Проверка после исправления

```bash
# 1. Проверьте что .env правильно настроен
cat .env | grep DB_

# Должно показать:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_DATABASE=имя_бд
# DB_USERNAME=пользователь
# DB_PASSWORD=пароль

# 2. Очистите кеш
$PHP_PATH artisan config:clear

# 3. Попробуйте миграции
$PHP_PATH artisan migrate --force
```

Если все правильно настроено, миграции должны пройти успешно!

