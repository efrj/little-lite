FROM php:8.0-apache

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install zip extension and unzip command
RUN apt-get update && apt-get install -y \
    zip \
    unzip

WORKDIR /var/www
COPY . . 

# Install Dependencies
RUN composer install

# Apache
RUN a2enmod rewrite

EXPOSE 80
ENTRYPOINT ["apache2ctl", "-D", "FOREGROUND"]