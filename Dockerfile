FROM php:8.2-apache

WORKDIR /var/www/html

# Cambiar DocumentRoot a /public
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Instalar dependencias necesarias
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev

# Extensiones PHP
RUN docker-php-ext-install pdo pdo_mysql

# Instalar composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar proyecto
COPY . /var/www/html

# Instalar dependencias Laravel
RUN composer install --no-dev --optimize-autoloader

# Permisos
RUN chown -R www-data:www-data /var/www/html
