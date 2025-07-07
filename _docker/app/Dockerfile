FROM php:8.4-fpm

# Установка системных зависимостей
RUN apt-get update && \
    apt-get install -y \
        git \
        unzip \
        && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Копирование Composer из официального образа
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Копирование пользовательского php.ini
COPY ./_docker/app/php.ini /usr/local/etc/php/conf.d/php.ini

# Установка рабочей директории
WORKDIR /var/www