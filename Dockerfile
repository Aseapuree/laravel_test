FROM php:8.2-apache

WORKDIR /var/www/html

# Dependencias
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev

# Extensiones PHP
RUN docker-php-ext-install pdo pdo_mysql

# Apache
RUN a2enmod rewrite

# Permitir .htaccess
RUN sed -i '/<Directory \/var\/www\/>/,/AllowOverride/s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# DocumentRoot -> public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar proyecto
COPY . .

# Instalar dependencias
RUN composer install --no-dev --optimize-autoloader

# Permisos Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage \
    && chmod -R 775 bootstrap/cache \
    && chmod -R 755 public
