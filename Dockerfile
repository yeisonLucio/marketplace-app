FROM php:8.1.10-fpm

RUN docker-php-ext-install pdo pdo_mysql exif pcntl bcmath

# instala composer en el contenedor
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# da permisos para editar los archivos en esta ruta del container
RUN chown -R www-data:www-data /var/www/
RUN chmod 755 -R /var/www/
RUN chown -R www-data: /var/www/html/storage
