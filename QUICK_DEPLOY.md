# Быстрая инструкция по развертыванию (краткая версия)

## Подключение и переход в директорию
```bash
ssh rezaresurs_r_usr@your-server-ip
cd /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru
```

## Клонирование проекта
```bash
git clone https://github.com/maxso92/rezaresurs.git .
```

## Определение PHP пути
```bash
PHP_PATH=/opt/alt/php83/usr/bin/php
# Или проверьте: ls /opt/alt/php*/usr/bin/php
```

## Установка зависимостей
```bash
$PHP_PATH $(which composer) install --no-dev --optimize-autoloader
npm install && npm run build
```

## Настройка .env
```bash
cp .env.example .env
nano .env  # Настройте БД и другие параметры
```

## Настройка Laravel
```bash
$PHP_PATH artisan key:generate
$PHP_PATH artisan storage:link
chmod -R 775 storage bootstrap/cache
sudo chown -R rezaresurs_r_usr:www-data storage bootstrap/cache
```

## Миграции БД
```bash
$PHP_PATH artisan migrate --force
```

## Оптимизация
```bash
$PHP_PATH artisan config:cache
$PHP_PATH artisan route:cache
$PHP_PATH artisan view:cache
```

## В FastPanel:
1. Установите PHP 8.2 или 8.3 для сайта
2. Установите Document Root: `/var/www/rezaresurs_r_usr/data/www/rezaresurs.ru/public`
3. Настройте SSL сертификат

## Полная версия инструкции: см. DEPLOY_GUIDE.md

