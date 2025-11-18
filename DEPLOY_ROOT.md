# Пошаговая инструкция по развертыванию проекта через ROOT

## Информация о сервере
- **ОС**: Ubuntu 24.04 LTS
- **Панель управления**: FastPanel
- **Путь к сайту**: `/var/www/rezaresurs_r_usr/data/www/rezaresurs.ru`
- **Пользователь веб-сервера**: `www-data` (обычно в Ubuntu)
- **Git репозиторий**: `https://github.com/maxso92/rezaresurs.git`
- **Требования**: PHP 8.2+ (Laravel 12)

---

## ШАГ 1: Подключение к серверу как root

```bash
ssh root@your-server-ip
# или
sudo su -
```

---

## ШАГ 2: Переход в директорию сайта

```bash
cd /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru
```

---

## ШАГ 3: Клонирование проекта из Git

```bash
# Если директория пустая - клонируем проект
git clone https://github.com/maxso92/rezaresurs.git .

# Или если проект уже существует, обновляем его
git pull origin main
```

---

## ШАГ 4: Проверка и настройка PHP версии

```bash
# Проверьте версии PHP в FastPanel
ls -la /opt/alt/php*/usr/bin/php

# Проверьте конкретно PHP 8.2 или 8.3
/opt/alt/php82/usr/bin/php -v 2>/dev/null || echo "PHP 8.2 не найден"
/opt/alt/php83/usr/bin/php -v 2>/dev/null || echo "PHP 8.3 не найден"

# Определите путь к PHP для использования
PHP_PATH="/opt/alt/php83/usr/bin/php"  # Замените на нужную версию
$PHP_PATH --version
```

**Важно**: В FastPanel настройте PHP версию для сайта через панель управления:
1. Зайдите в FastPanel
2. Найдите ваш сайт `rezaresurs.ru`
3. Установите PHP версию 8.2 или 8.3

---

## ШАГ 5: Установка Composer (если не установлен)

```bash
# Проверьте установлен ли Composer
composer --version

# Если не установлен, установите его
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
chmod +x /usr/local/bin/composer
```

---

## ШАГ 6: Установка зависимостей PHP

```bash
# Установите зависимости через Composer
$PHP_PATH /usr/local/bin/composer install --no-dev --optimize-autoloader

# Или если composer в другом месте
$PHP_PATH $(which composer) install --no-dev --optimize-autoloader
```

---

## ШАГ 7: Создание файла .env

```bash
# Создайте .env из примера
cp .env.example .env

# Откройте файл для редактирования
nano .env
```

Обязательно настройте следующие параметры в `.env`:

```env
APP_NAME="Rezaresurs"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://rezaresurs.ru

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

**Важно**: 
- Получите данные для базы данных из FastPanel (MySQL/MariaDB)
- `APP_DEBUG` должен быть `false` в продакшене
- Сохраните файл (Ctrl+O, Enter, Ctrl+X в nano)

---

## ШАГ 8: Генерация ключа приложения

```bash
$PHP_PATH artisan key:generate
```

---

## ШАГ 9: Настройка прав доступа и владельца

**ВНИМАНИЕ**: Важно установить правильного владельца для файлов!

```bash
# Определите пользователя веб-сервера (обычно www-data в Ubuntu)
WEB_USER="www-data"  # или rezaresurs_r_usr если FastPanel использует его

# Установите владельца всех файлов проекта
chown -R $WEB_USER:$WEB_USER /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru

# Установите права на файлы и папки
find /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru -type f -exec chmod 644 {} \;
find /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru -type d -exec chmod 755 {} \;

# Особые права для исполняемых файлов
chmod +x /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru/artisan

# Критически важные права для storage и bootstrap/cache
chmod -R 775 /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru/storage
chmod -R 775 /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru/bootstrap/cache
chown -R $WEB_USER:$WEB_USER /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru/storage
chown -R $WEB_USER:$WEB_USER /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru/bootstrap/cache
```

**Проверка пользователя веб-сервера**:
```bash
# Проверьте какой пользователь используется веб-сервером
ps aux | grep -E 'nginx|apache|httpd' | head -1

# Или проверьте конфигурацию FastPanel
cat /etc/passwd | grep www-data
cat /etc/passwd | grep rezaresurs_r_usr
```

---

## ШАГ 10: Создание симлинка для storage

```bash
# Переключитесь на пользователя веб-сервера для создания симлинка
su - $WEB_USER -s /bin/bash -c "cd /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru && $PHP_PATH artisan storage:link"

# Или от root напрямую (если нужно)
cd /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru
$PHP_PATH artisan storage:link

# Убедитесь что симлинк создан с правильными правами
ls -la public/storage
chown -h $WEB_USER:$WEB_USER public/storage 2>/dev/null || true
```

---

## ШАГ 11: Запуск миграций базы данных

**ВНИМАНИЕ**: Убедитесь, что база данных создана в FastPanel!

```bash
# Запустите миграции и создайте администратора
cd /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru
$PHP_PATH artisan migrate --seed --force

# Это создаст:
# - Все таблицы базы данных
# - Администратора с данными:
#   Email: admin@admin.com
#   Пароль: password
#
# ВАЖНО: После первого входа обязательно измените пароль!

# Или по отдельности:
# $PHP_PATH artisan migrate --force
# $PHP_PATH artisan db:seed
```

---

## ШАГ 12: Установка Node.js и npm (если не установлены)

```bash
# Проверьте версию Node.js
node --version
npm --version

# Если не установлены, установите
curl -fsSL https://deb.nodesource.com/setup_20.x | bash -
apt-get install -y nodejs
```

---

## ШАГ 13: Установка зависимостей фронтенда и сборка

```bash
cd /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru

# Установите зависимости
npm install

# Соберите фронтенд для продакшена
npm run build

# Установите правильные права на собранные файлы
chown -R $WEB_USER:$WEB_USER public/build
```

---

## ШАГ 14: Настройка Document Root в FastPanel

**КРИТИЧЕСКИ ВАЖНО**: В FastPanel настройте Document Root на папку `public`:

1. Зайдите в FastPanel
2. Найдите сайт `rezaresurs.ru`
3. В настройках сайта найдите "Document Root" или "Корневая директория"
4. Установите значение:
   ```
   /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru/public
   ```
5. Сохраните изменения

---

## ШАГ 15: Оптимизация Laravel для продакшена

```bash
cd /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru

# Очистите старый кеш
$PHP_PATH artisan config:clear
$PHP_PATH artisan route:clear
$PHP_PATH artisan view:clear
$PHP_PATH artisan cache:clear

# Создайте кеш для продакшена
$PHP_PATH artisan config:cache
$PHP_PATH artisan route:cache
$PHP_PATH artisan view:cache
$PHP_PATH artisan event:cache

# Убедитесь что кеш имеет правильные права
chown -R $WEB_USER:$WEB_USER bootstrap/cache
chmod -R 775 bootstrap/cache
```

---

## ШАГ 16: Финальная проверка прав доступа

```bash
# Проверьте владельца всех файлов
ls -la /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru

# Убедитесь что все файлы принадлежат правильному пользователю
chown -R $WEB_USER:$WEB_USER /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru

# Проверьте права на критические директории
ls -la storage/
ls -la bootstrap/cache/
ls -la public/

# Если нужно, исправьте права
find /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru -type f -exec chmod 644 {} \;
find /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru -type d -exec chmod 755 {} \;
chmod -R 775 storage bootstrap/cache
```

---

## ШАГ 17: Проверка работы сайта

Откройте в браузере: `https://rezaresurs.ru`

Если возникли ошибки, проверьте логи:

```bash
# Логи Laravel
tail -f /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru/storage/logs/laravel.log

# Логи веб-сервера (nginx)
tail -f /var/log/nginx/error.log

# Или apache
tail -f /var/log/apache2/error.log
```

---

## ШАГ 18: Настройка SSL сертификата (если нужно)

В FastPanel:
1. Зайдите в настройки сайта
2. Найдите раздел SSL/TLS
3. Активируйте Let's Encrypt или загрузите свой сертификат

---

## Возможные проблемы и решения

### Проблема 1: Ошибка прав доступа 500

```bash
# Проверьте владельца файлов
ls -la /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru

# Исправьте владельца
WEB_USER="www-data"  # или rezaresurs_r_usr
chown -R $WEB_USER:$WEB_USER /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru
chmod -R 775 storage bootstrap/cache
```

### Проблема 2: PHP версия неправильная

```bash
# Проверьте доступные версии
ls /opt/alt/php*/usr/bin/php

# Используйте конкретную версию
PHP_PATH="/opt/alt/php83/usr/bin/php"
$PHP_PATH artisan --version
```

### Проблема 3: Ошибки при миграциях

```bash
# Проверьте подключение к БД
$PHP_PATH artisan tinker
# В tinker выполните:
# DB::connection()->getPdo();
# exit
```

### Проблема 4: Storage симлинк не работает

```bash
# Удалите старый симлинк
rm -f public/storage

# Создайте новый от имени пользователя веб-сервера
su - $WEB_USER -s /bin/bash -c "cd /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru && $PHP_PATH artisan storage:link"

# Или вручную
ln -s /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru/storage/app/public /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru/public/storage
chown -h $WEB_USER:$WEB_USER public/storage
```

### Проблема 5: SELinux блокирует доступ

Если SELinux активен:

```bash
# Проверьте статус SELinux
getenforce

# Если Enforcing, установите контекст для веб-файлов
chcon -R -t httpd_sys_content_t /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru
chcon -R -t httpd_sys_rw_content_t /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru/storage
chcon -R -t httpd_sys_rw_content_t /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru/bootstrap/cache
```

---

## Команды для быстрого обновления проекта (от root)

После первоначальной настройки, для обновления проекта используйте:

```bash
cd /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru

# Определите PHP путь и пользователя веб-сервера
PHP_PATH="/opt/alt/php83/usr/bin/php"
WEB_USER="www-data"  # или rezaresurs_r_usr

# Обновите код из Git
git pull origin main

# Обновите зависимости PHP
$PHP_PATH /usr/local/bin/composer install --no-dev --optimize-autoloader

# Обновите зависимости фронтенда
npm install
npm run build

# Запустите миграции (если есть новые)
# Если нужен новый админ, добавьте --seed:
$PHP_PATH artisan migrate --force
# или
$PHP_PATH artisan migrate --seed --force

# Пересоздайте кеш
$PHP_PATH artisan config:cache
$PHP_PATH artisan route:cache
$PHP_PATH artisan view:cache

# Исправьте права на новые файлы
chown -R $WEB_USER:$WEB_USER .
chmod -R 775 storage bootstrap/cache
```

---

## Скрипт автоматического развертывания (для root)

Вы можете создать скрипт для упрощения процесса:

```bash
cat > /root/deploy_rezaresurs.sh << 'EOF'
#!/bin/bash

# Настройки
SITE_PATH="/var/www/rezaresurs_r_usr/data/www/rezaresurs.ru"
PHP_PATH="/opt/alt/php83/usr/bin/php"
WEB_USER="www-data"  # Замените на нужного пользователя
GIT_REPO="https://github.com/maxso92/rezaresurs.git"

cd $SITE_PATH

# Обновление кода
echo "Обновление кода из Git..."
git pull origin main

# Зависимости PHP
echo "Установка зависимостей PHP..."
$PHP_PATH /usr/local/bin/composer install --no-dev --optimize-autoloader

# Зависимости фронтенда
echo "Сборка фронтенда..."
npm install
npm run build

# Миграции
echo "Запуск миграций..."
$PHP_PATH artisan migrate --force

# Оптимизация
echo "Оптимизация Laravel..."
$PHP_PATH artisan config:cache
$PHP_PATH artisan route:cache
$PHP_PATH artisan view:cache

# Права доступа
echo "Установка прав доступа..."
chown -R $WEB_USER:$WEB_USER $SITE_PATH
chmod -R 775 $SITE_PATH/storage
chmod -R 775 $SITE_PATH/bootstrap/cache

echo "Готово!"
EOF

chmod +x /root/deploy_rezaresurs.sh
```

Затем просто запускайте:
```bash
/root/deploy_rezaresurs.sh
```

---

## Финальная проверка

Убедитесь, что все работает:

1. ✅ Сайт открывается в браузере
2. ✅ Нет ошибок в консоли браузера (F12)
3. ✅ База данных подключена (проверьте работу форм/API)
4. ✅ Статические файлы (CSS, JS, изображения) загружаются
5. ✅ Логи не содержат критических ошибок
6. ✅ Права доступа корректны (владелец и права)

**Важные моменты при работе от root:**
- Всегда устанавливайте правильного владельца файлов (пользователь веб-сервера)
- Не запускайте команды artisan от root без необходимости
- Проверяйте права доступа после каждого обновления
- Логи Laravel должны быть доступны для записи пользователю веб-сервера

**Удачи с развертыванием! 🚀**

