FROM php:8.0-apache

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Apache
RUN a2enmod rewrite

# Permissions
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 777 /var/www/html