# Pull from PHP from previous Dockerfile - php/Dockerfile
# - use the image tag for php - php:php-<version>-fpm-alpine
# - see docker/docker-compose.yml for more info
FROM php:php-8.1-fpm-alpine

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version=2.6.1

# Add composer bin path to environment variable
RUN export PATH=$PATH":/usr/bin"
