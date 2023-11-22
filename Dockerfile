FROM php:8.2-apache

# ... (resto del Dockerfile)

# Instala las dependencias de Linux y las extensiones de PHP
RUN apt-get update -y && apt-get install -y \
    libicu-dev \
    libmariadb-dev \
    unzip zip \
    zlib1g-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    nano 

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia tu aplicación al contenedor
WORKDIR /var/www/html/
COPY . /var/www/html
RUN a2enmod rewrite
# Copia la configuración de Apache
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf 
COPY apache2.conf /etc/apache2/apache2.conf
RUN service apache2 restart

# Ajusta los permisos
RUN chmod -R 755 /var/www/html
RUN chown -R www-data:www-data /var/www/html
RUN chown -R www-data:www-data /var/www/html/api/storage
RUN chmod -R 755 /var/www/html/api/storage

# Instala extensiones de PHP necesarias
RUN docker-php-ext-install gettext intl pdo_mysql gd

# Configura la extensión GD
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

#RUN composer install
RUN chmod -R 755 /var/www/html/api

# Expone el puerto 80 para que pueda ser accesible desde el exterior
EXPOSE 80

CMD ["apache2-foreground"]
