# Gunakan PHP 8.2 dengan FPM
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy php.ini kalau ada
COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/php.ini

# Copy semua file Laravel ke container
COPY . .

# Set permission storage & bootstrap
RUN chown -R www-data:www-data storage bootstrap/cache && chmod -R 775 storage bootstrap/cache

# Expose port
EXPOSE 9000

CMD ["php-fpm"]
