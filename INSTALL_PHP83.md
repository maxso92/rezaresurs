# Установка PHP 8.3 на Ubuntu 22.04

## Проверка пути FastPanel

Сначала проверьте, установлен ли PHP 8.3 через FastPanel:

```bash
# Проверьте пути FastPanel
ls /opt/alt/php*/usr/bin/php

# Проверьте конкретно PHP 8.3
ls -la /opt/alt/php83/usr/bin/php 2>/dev/null || echo "PHP 8.3 не найден в FastPanel"
```

## Если PHP 8.3 найден в /opt/alt/php83/

Используйте его напрямую:
```bash
/opt/alt/php83/usr/bin/php $(which composer) install --no-dev --optimize-autoloader
```

## Если PHP 8.3 не найден - установите его

### Вариант 1: Через FastPanel (РЕКОМЕНДУЕТСЯ)

1. Зайдите в FastPanel
2. Найдите раздел "PHP" или "Установленные версии PHP"
3. Установите PHP 8.3 через интерфейс панели

### Вариант 2: Через командную строку (если FastPanel не позволяет)

```bash
# Добавьте репозиторий PHP 8.3
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update

# Установите PHP 8.3 и необходимые модули
sudo apt install php8.3 php8.3-cli php8.3-fpm php8.3-mysql php8.3-xml php8.3-mbstring php8.3-curl php8.3-zip php8.3-gd php8.3-bcmath -y

# Проверьте установку
php8.3 -v

# Используйте для composer
php8.3 $(which composer) install --no-dev --optimize-autoloader
```

## После установки

Создайте симлинк или используйте полный путь:
```bash
# Временный алиас (только для текущей сессии)
alias php='/opt/alt/php83/usr/bin/php'  # для FastPanel
# или
alias php='/usr/bin/php8.3'  # для стандартной установки

# Проверьте
php -v
```

