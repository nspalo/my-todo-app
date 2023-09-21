# Install PHP
FROM php:8.1-fpm-alpine

# Copy PHP configuration
#COPY ./containers/php/config/php-$SYS_ENV-$HOST_SECRET.ini /usr/local/etc/php/php.ini

# Install PHP Extension
RUN apk --no-cache add zip libzip-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip mysqli pdo pdo_mysql \
    && docker-php-ext-enable pdo_mysql \
