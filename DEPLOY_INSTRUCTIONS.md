# Инструкции по развертыванию на FastPanel

## Если проект в папке rezaresurs (текущая ситуация)

### Вариант 1: Настроить Document Root (РЕКОМЕНДУЕТСЯ)

В FastPanel измените Document Root на:
```
/var/www/site_user/data/www/5932701-tu43884.twc1.net/rezaresurs/public
```

### Вариант 2: Переместить проект

Если нельзя изменить Document Root в FastPanel, выполните на сервере:

```bash
cd /var/www/site_user/data/www/5932701-tu43884.twc1.net

# Сделайте резервную копию index.php если нужен
# mv index.php index.php.backup

# Переместите содержимое rezaresurs в текущую папку
mv rezaresurs/* .
mv rezaresurs/.[!.]* . 2>/dev/null || true
rmdir rezaresurs

# Убедитесь что document root указывает на public
# В FastPanel установите Document Root на:
# /var/www/site_user/data/www/5932701-tu43884.twc1.net/public
```

### Вариант 3: Симлинк (альтернатива)

```bash
cd /var/www/site_user/data/www/5932701-tu43884.twc1.net

# Удалите стандартный index.php или переименуйте
mv index.php index.php.backup

# Создайте симлинк из public в текущую папку (если FastPanel использует эту папку как document root)
# Или создайте симлинк на rezaresurs/public если document root не меняется
ln -s rezaresurs/public public_laravel

# Затем в FastPanel укажите document root:
# /var/www/site_user/data/www/5932701-tu43884.twc1.net/public_laravel
```

## После настройки Document Root выполните:

```bash
cd /var/www/site_user/data/www/5932701-tu43884.twc1.net/rezaresurs

# Установите зависимости
composer install --no-dev --optimize-autoloader

# Создайте .env
cp .env.example .env

# Сгенерируйте ключ
php artisan key:generate

# Создайте симлинк storage
php artisan storage:link

# Настройте права
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache

# Запустите миграции
php artisan migrate --force

# Соберите фронтенд (если нужно)
npm install
npm run build

# Оптимизируйте
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

