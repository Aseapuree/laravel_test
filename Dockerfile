FROM php:8.2-apache

# Cambiar DocumentRoot a /public
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Habilitar mod_rewrite (Laravel lo necesita)
RUN a2enmod rewrite

# Instalar extensión MySQL para PDO
RUN docker-php-ext-install pdo pdo_mysql

#Ajustar permisos 
RUN chown -R www-data:www-data /var/www/html
