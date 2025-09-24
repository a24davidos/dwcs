FROM php:8.1-apache

# Instalar extensiones necesarias para PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copiar archivos del proyecto (si tienes)
# COPY ./src/ /var/www/html/

# Activar mod_rewrite (opcional)
RUN a2enmod rewrite

RUN chmod -R 755 /var/www/html && find /var/www/html -type f -name '*.php' -exec chmod 644 {} \;



