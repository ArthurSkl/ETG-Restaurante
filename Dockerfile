FROM composer:2 AS build
WORKDIR /app
COPY composer.json ./
RUN composer install --no-dev --prefer-dist --no-interaction

FROM php:8.2-apache
RUN docker-php-ext-install pdo_mysql \
    && a2enmod rewrite

COPY --from=build /app/vendor /var/www/html/vendor
COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 777 /var/www/html/storage \
    && chmod -R 777 /var/www/html/assets/imgs/users

EXPOSE 80
