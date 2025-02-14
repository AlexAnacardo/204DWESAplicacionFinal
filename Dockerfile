# Usamos una imagen base de PHP con Apache
FROM php:8.3-apache

# Habilitamos mod_rewrite (si lo necesitas)
RUN a2enmod rewrite

# Copiamos los archivos de la aplicación al contenedor
COPY . /var/www/html/

# Configuramos el directorio de trabajo
WORKDIR /var/www/html

# Instalamos dependencias de PHP (si tu aplicación las requiere)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Exponemos el puerto 80
EXPOSE 80
