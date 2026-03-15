FROM php:8.2-apache

WORKDIR /var/www/html

# instalar dependencias
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev

# extensiones php
RUN docker-php-ext-install pdo pdo_mysql

# habilitar rewrite
RUN a2enmod rewrite

# permitir .htaccess
RUN sed -i '/<Directory \/var\/www\/>/,/AllowOverride/s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# cambiar document root a public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf

# instalar composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# copiar proyecto
COPY . .

# instalar dependencias laravel
RUN composer install --no-dev --optimize-autoloader

# crear enlace de storage
RUN php artisan storage:link

# permisos laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage \
    && chmod -R 775 bootstrap/cache



#FROM php:8.2-apache

#WORKDIR /var/www/html

# Cambiar DocumentRoot a /public
#RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Habilitar mod_rewrite
#RUN a2enmod rewrite

# Instalar dependencias necesarias
#RUN apt-get update && apt-get install -y \
#    git \
#    unzip \
#    libzip-dev

# Extensiones PHP
#RUN docker-php-ext-install pdo pdo_mysql

# Instalar composer
#COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar proyecto
#COPY . /var/www/html

# Instalar dependencias Laravel
#RUN composer install --no-dev --optimize-autoloader

# Permisos
#RUN chown -R www-data:www-data /var/www/html
