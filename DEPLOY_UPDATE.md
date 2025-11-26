# Инструкция по обновлению проекта с GitHub на продакшн

## Информация о сервере

- **SSH доступ**: `ssh rezaresurs_r_usr@194.58.98.77`
- **Пароль**: `E!%xuMTe`1xJ-:7``
- **Путь к сайту**: `/var/www/rezaresurs_r_usr/data/www/rezaresurs.ru`
- **Git репозиторий**: `https://github.com/maxso92/rezaresurs.git`

---

## Быстрое обновление (основные команды)

### ШАГ 1: Подключение к серверу

```bash
ssh rezaresurs_r_usr@194.58.98.77
```

Введите пароль: `E!%xuMTe`1xJ-:7``

---

### ШАГ 2: Переход в директорию проекта

```bash
cd /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru
```

---

### ШАГ 3: Получение изменений из GitHub

```bash
# Проверяем текущую ветку
git status

# Получаем последние изменения
git pull origin main
```

**Примечание**: Если Git запросит учетные данные, используйте:
- **Username**: ваш GitHub username
- **Password**: Personal Access Token (не обычный пароль)

---

### ШАГ 4: Обновление зависимостей PHP

```bash
# Определяем путь к PHP (FastPanel обычно использует /opt/alt/php83/)
PHP_PATH=$(ls /opt/alt/php8*/usr/bin/php 2>/dev/null | head -1)

# Если не найден, используем системный PHP
if [ -z "$PHP_PATH" ]; then
    PHP_PATH=$(which php8.3 || which php8.2 || which php)
fi

# Обновляем зависимости
$PHP_PATH $(which composer) install --no-dev --optimize-autoloader
```

**Альтернатива** (если знаете точный путь к PHP):
```bash
/opt/alt/php83/usr/bin/php $(which composer) install --no-dev --optimize-autoloader
```

---

### ШАГ 5: Обновление зависимостей фронтенда и сборка

```bash
# Устанавливаем зависимости (если package.json изменился)
npm install

# Собираем фронтенд для продакшена
npm run build
```

---

### ШАГ 6: Запуск миграций базы данных (если есть новые)

```bash
# Запускаем миграции
$PHP_PATH artisan migrate --force
```

**Внимание**: Эта команда изменит структуру базы данных. Убедитесь, что у вас есть резервная копия!

---

### ШАГ 7: Очистка и пересоздание кеша

```bash
# Очищаем весь кеш
$PHP_PATH artisan config:clear
$PHP_PATH artisan route:clear
$PHP_PATH artisan view:clear
$PHP_PATH artisan cache:clear

# Пересоздаем кеш для продакшена
$PHP_PATH artisan config:cache
$PHP_PATH artisan route:cache
$PHP_PATH artisan view:cache
$PHP_PATH artisan event:cache
```

---

### ШАГ 8: Проверка прав доступа

```bash
# Убеждаемся, что права установлены правильно
chmod -R 775 storage bootstrap/cache
chmod -R 755 public
```

---

## Полный скрипт обновления (одной командой)

Вы можете выполнить все команды последовательно:

```bash
cd /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru && \
PHP_PATH=$(ls /opt/alt/php8*/usr/bin/php 2>/dev/null | head -1) && \
if [ -z "$PHP_PATH" ]; then PHP_PATH=$(which php8.3 || which php8.2 || which php); fi && \
git pull origin main && \
$PHP_PATH $(which composer) install --no-dev --optimize-autoloader && \
npm install && \
npm run build && \
$PHP_PATH artisan migrate --force && \
$PHP_PATH artisan config:clear && \
$PHP_PATH artisan route:clear && \
$PHP_PATH artisan view:clear && \
$PHP_PATH artisan cache:clear && \
$PHP_PATH artisan config:cache && \
$PHP_PATH artisan route:cache && \
$PHP_PATH artisan view:cache && \
$PHP_PATH artisan event:cache && \
chmod -R 775 storage bootstrap/cache && \
echo "Обновление завершено!"
```

---

## Упрощенный вариант (без миграций и npm)

Если вы не меняли структуру БД и фронтенд:

```bash
cd /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru && \
PHP_PATH=$(ls /opt/alt/php8*/usr/bin/php 2>/dev/null | head -1) && \
if [ -z "$PHP_PATH" ]; then PHP_PATH=$(which php8.3 || which php8.2 || which php); fi && \
git pull origin main && \
$PHP_PATH $(which composer) install --no-dev --optimize-autoloader && \
$PHP_PATH artisan config:clear && \
$PHP_PATH artisan route:clear && \
$PHP_PATH artisan view:clear && \
$PHP_PATH artisan cache:clear && \
$PHP_PATH artisan config:cache && \
$PHP_PATH artisan route:cache && \
$PHP_PATH artisan view:cache && \
echo "Обновление завершено!"
```

---

## Проверка после обновления

### 1. Проверка логов на ошибки

```bash
tail -n 50 storage/logs/laravel.log
```

### 2. Проверка работы сайта

Откройте в браузере: `https://rezaresurs.ru`

### 3. Проверка версии PHP

```bash
$PHP_PATH --version
```

Должна быть версия 8.2 или выше.

---

## Решение проблем

### Проблема: Git требует пароль/токен

**Решение**: Создайте Personal Access Token в GitHub:
1. Зайдите в GitHub → Settings → Developer settings → Personal access tokens → Tokens (classic)
2. Создайте новый токен с правами `repo`
3. Используйте токен вместо пароля при запросе Git

Или настройте SSH ключ:
```bash
# На сервере
ssh-keygen -t ed25519 -C "your_email@example.com"
# Скопируйте публичный ключ и добавьте в GitHub → Settings → SSH keys
```

### Проблема: Ошибки при composer install

**Решение**:
```bash
# Очистите кеш Composer
composer clear-cache

# Попробуйте снова
$PHP_PATH $(which composer) install --no-dev --optimize-autoloader
```

### Проблема: Ошибки при npm build

**Решение**:
```bash
# Удалите node_modules и переустановите
rm -rf node_modules package-lock.json
npm install
npm run build
```

### Проблема: Ошибка 500 на сайте после обновления

**Решение**:
```bash
# Временно включите отладку в .env
nano .env
# Измените APP_DEBUG=true

# Проверьте логи
tail -f storage/logs/laravel.log

# Проверьте права доступа
ls -la storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
```

### Проблема: Конфликты при git pull

**Решение**:
```bash
# Посмотрите статус
git status

# Если есть конфликты, решите их вручную или откатите локальные изменения
git stash
git pull origin main
git stash pop

# Или сбросьте локальные изменения (ОСТОРОЖНО!)
git reset --hard origin/main
```

---

## Рекомендации

1. **Всегда делайте резервную копию БД перед миграциями**:
   ```bash
   # Через FastPanel или:
   mysqldump -u username -p database_name > backup_$(date +%Y%m%d_%H%M%S).sql
   ```

2. **Проверяйте изменения перед обновлением**:
   ```bash
   git log origin/main..HEAD  # Посмотреть что будет обновлено
   ```

3. **Обновляйте в нерабочее время** (если возможно)

4. **Проверяйте сайт сразу после обновления**

---

## Быстрые команды для копирования

### Минимальное обновление (только код)
```bash
cd /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru
git pull origin main
/opt/alt/php83/usr/bin/php artisan config:clear && /opt/alt/php83/usr/bin/php artisan route:clear && /opt/alt/php83/usr/bin/php artisan view:clear && /opt/alt/php83/usr/bin/php artisan cache:clear && /opt/alt/php83/usr/bin/php artisan config:cache && /opt/alt/php83/usr/bin/php artisan route:cache && /opt/alt/php83/usr/bin/php artisan view:cache
```

### Полное обновление (с зависимостями)
```bash
cd /var/www/rezaresurs_r_usr/data/www/rezaresurs.ru
git pull origin main
/opt/alt/php83/usr/bin/php $(which composer) install --no-dev --optimize-autoloader
npm install && npm run build
/opt/alt/php83/usr/bin/php artisan migrate --force
/opt/alt/php83/usr/bin/php artisan config:clear && /opt/alt/php83/usr/bin/php artisan route:clear && /opt/alt/php83/usr/bin/php artisan view:clear && /opt/alt/php83/usr/bin/php artisan cache:clear
/opt/alt/php83/usr/bin/php artisan config:cache && /opt/alt/php83/usr/bin/php artisan route:cache && /opt/alt/php83/usr/bin/php artisan view:cache
```

---

**Успешных обновлений! 🚀**

