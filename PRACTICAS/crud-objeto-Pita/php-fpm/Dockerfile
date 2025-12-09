FROM php:8.2-fpm

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    libzip-dev \
    && rm -r /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql gd
