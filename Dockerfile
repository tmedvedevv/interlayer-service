# Используем официальный образ PHP 8.2 с FPM и Alpine
FROM php:7.4.23-fpm-alpine3.13 as base

# Задаем расположение рабочей директории
ENV WORK_DIR /var/www/application

# Устанавливаем необходимые зависимости
RUN apk update && apk add --no-cache \
    bash \
    libpng-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    libxml2-dev \
    git \
    unzip \
    && docker-php-ext-install pdo pdo_mysql gd

# Копируем исходный код в контейнер
COPY . ${WORK_DIR}

# Устанавливаем рабочую директорию
WORKDIR ${WORK_DIR}

# Открываем порт 9000 и запускаем php-fpm
EXPOSE 9000
CMD ["php-fpm"]