# Решение проблемы с версией PHP в FastPanel

## Проблема
FastPanel показывает PHP 8.3 для сайта, но в CLI используется PHP 8.1.2

## Решения

### Вариант 1: Использовать конкретную версию PHP (РЕКОМЕНДУЕТСЯ)

```bash
# Найдите путь к PHP 8.3
which php8.3
# или
/usr/bin/php8.3 -v

# Если php8.3 найден, используйте его:
php8.3 $(which composer) install --no-dev --optimize-autoloader
```

### Вариант 2: Найти полный путь к PHP 8.3

```bash
# Проверьте где установлен PHP 8.3
ls -la /usr/bin/php*
ls -la /opt/alt/php*/usr/bin/php  # FastPanel иногда ставит сюда

# Найдите PHP 8.3
find /usr -name "php8.3" 2>/dev/null
find /opt -name "php8.3" 2>/dev/null

# Используйте найденный путь
/полный/путь/к/php8.3 $(which composer) install --no-dev --optimize-autoloader
```

### Вариант 3: Использовать альтернативы PHP (update-alternatives)

```bash
# Установите PHP 8.3 как версию по умолчанию (осторожно!)
sudo update-alternatives --config php

# Выберите PHP 8.3 из списка
```

### Вариант 4: Использовать полный путь к PHP из FastPanel

FastPanel часто устанавливает PHP в:
```
/opt/alt/php83/usr/bin/php
```

Проверьте:
```bash
ls /opt/alt/php*/usr/bin/php
```

Затем:
```bash
/opt/alt/php83/usr/bin/php $(which composer) install --no-dev --optimize-autoloader
```

## Проверка версии PHP

После настройки проверьте:
```bash
php8.3 -v
# или
/opt/alt/php83/usr/bin/php -v
```

Должно показать: PHP 8.3.x

## Для всех команд artisan используйте ту же версию PHP

```bash
php8.3 artisan key:generate
php8.3 artisan migrate
php8.3 artisan config:cache
# и т.д.
```

## Альтернатива: Создать алиас в .bashrc

```bash
echo 'alias php="php8.3"' >> ~/.bashrc
source ~/.bashrc
```

Тогда можно использовать просто `php` и `composer`

