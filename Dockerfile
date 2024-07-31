# Menggunakan php image
FROM php:8.1-apache

# Setting loc html
WORKDIR /var/www/html

# Install dep in linux
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    libonig-dev \
    libxml2-dev \
    supervisor \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl gd

# Enable Apache supaya bisa rewrite URL
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy app
COPY . /var/www/html

# Copy permission
COPY --chown=www-data:www-data . /var/www/html

# Memindahkan Queue Worker ke linux supervisor
COPY ./docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Laravel env
RUN cp .env.example .env
RUN composer install --no-dev --optimize-autoloader
RUN php artisan key:generate
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache
RUN php artisan migrate --force

# Buka port 80
EXPOSE 80

# Jalankan Apache
CMD ["apache2-foreground"]
