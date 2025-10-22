FROM php:8.2-apache

# 1. Copia el código fuente al contenedor
COPY . /var/www/html/

# 2. 🚨 SOLUCIÓN: Cambia el propietario del directorio /var/www/html
#    El usuario www-data es el que usa Apache dentro del contenedor.
RUN chown -R www-data:www-data /var/www/html/

EXPOSE 80