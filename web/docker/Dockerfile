FROM php:8.1.2-apache

ENV LANG C.UTF-8
ENV COMPOSER_ALLOW_SUPERUSER 1

COPY ./docker/php.ini /usr/local/etc/php/
COPY ./docker/*.conf /etc/apache2/sites-enabled/

RUN apt -y update \
    && apt -y upgrade \
    && apt -y install \
            libpq-dev \
            unzip \
            git \
            libzip-dev \
            zip

RUN docker-php-ext-install pdo_pgsql zip

# Install Composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN a2enmod rewrite

WORKDIR /var/www/html

