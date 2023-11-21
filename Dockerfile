# Utiliza una imagen base con PHP 8.2.3 y sin Node.js
FROM php:8.2.3-apache

# Copia los archivos del proyecto al contenedor
COPY . /var/www/html

# Instala dependencias y realiza configuraciones adicionales
RUN apt-get update && \
    apt-get install -y \
        # Agrega cualquier paquete necesario para tu aplicación aquí

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Expon el puerto si tu aplicación necesita ser accesible desde fuera del contenedor
EXPOSE 80

# Comando que se ejecutará cuando inicie el contenedor
CMD ["apache2-foreground"]
