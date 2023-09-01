FROM php:8.2-apache

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install zip extension and unzip command
RUN apt-get update && apt-get install -y \
    zip \
    unzip

RUN a2enmod rewrite

RUN echo "alias ll='ls -alF'" >> ~/.bashrc \
    echo "alias la='ls -A'" >> ~/.bashrc \
    echo "alias l='ls -CF'" >> ~/.bashrc