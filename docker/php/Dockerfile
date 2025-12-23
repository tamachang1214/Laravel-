FROM php:8.2-fpm

# OSライブラリ
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    libonig-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev

# PHP拡張（←ここ超重要）
RUN docker-php-ext-install pdo_mysql

# Node.js (すでに入れているならそのままでOK)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
