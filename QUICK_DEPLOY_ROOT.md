# Быстрая инструкция по развертыванию через ROOT (краткая версия)

## Подключение и переход
```bash
ssh root@your-server-ip
cd /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru
```

## Настройка переменных
```bash
PHP_PATH="/opt/alt/php83/usr/bin/php"  # Проверьте: ls /opt/alt/php*/usr/bin/php
WEB_USER="www-data"  # или rezaresurs_r_usr - проверьте какой используется
```

## Клонирование проекта
```bash
git clone https://github.com/maxso92/rezaresurs.git .
```

## Установка зависимостей
```bash
$PHP_PATH /usr/local/bin/composer install --no-dev --optimize-autoloader
npm install && npm run build
```

## Настройка .env
```bash
cp .env.example .env
nano .env  # Настройте БД (DB_DATABASE, DB_USERNAME, DB_PASSWORD)
```

## Настройка Laravel
```bash
$PHP_PATH artisan key:generate
$PHP_PATH artisan storage:link
```

## Настройка прав доступа
```bash
chown -R $WEB_USER:$WEB_USER /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru
chmod -R 775 storage bootstrap/cache
find . -type f -exec chmod 644 {} \;
find . -type d -exec chmod 755 {} \;
chmod +x artisan
```

## Миграции БД и создание админа
```bash
# Миграции + создание администратора
$PHP_PATH artisan migrate --seed --force

# Или по отдельности:
# $PHP_PATH artisan migrate --force
# $PHP_PATH artisan db:seed
```

## Оптимизация
```bash
$PHP_PATH artisan config:cache
$PHP_PATH artisan route:cache
$PHP_PATH artisan view:cache
chown -R $WEB_USER:$WEB_USER bootstrap/cache
```

## В FastPanel:
1. PHP версия: 8.2 или 8.3
2. Document Root: `/var/www/rezaresurs_r_usr/data/www/rezaresurs.ru/public`
3. SSL сертификат

## Обновление проекта
```bash
cd /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru
git pull origin main
$PHP_PATH /usr/local/bin/composer install --no-dev --optimize-autoloader
npm install && npm run build
$PHP_PATH artisan migrate --force
$PHP_PATH artisan config:cache && $PHP_PATH artisan route:cache && $PHP_PATH artisan view:cache
chown -R $WEB_USER:$WEB_USER .
chmod -R 775 storage bootstrap/cache
```

## Полная версия: см. DEPLOY_ROOT.md

 