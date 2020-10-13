FROM php:7.4-apache

# Install PHP modules
RUN docker-php-ext-install  pdo pdo_mysql \
    && docker-php-ext-enable  pdo pdo_mysql

# INstall Apache Modules
RUN a2enmod rewrite
