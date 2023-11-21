# Utiliza una imagen base con PHP 8.1.0 y Apache
FROM php:8.1.0-apache

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Mod Rewrite
RUN a2enmod rewrite

# Copia solo los archivos necesarios para la aplicación Laravel
COPY ./public ./public
COPY ./vendor ./vendor
COPY ./composer.json ./composer.json
COPY ./composer.lock ./composer.lock

# Instala las dependencias de Composer
RUN composer install --no-dev --optimize-autoloader

# Copia la configuración de Apache
COPY ./apache-config.conf /etc/apache2/sites-available/000-default.conf

# Ajuste de permisos
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Exponer el puerto si es necesario (puedes comentar esta línea si no es necesario)
EXPOSE 80

# Comando que se ejecutará cuando inicie el contenedor
CMD ["apache2-foreground"]
