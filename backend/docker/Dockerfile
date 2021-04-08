# Install PHP and dependencies
# FROM php:7.4-fpm-alpine
FROM php:8.0-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql

# Add docker user to avoid permission issues
RUN addgroup doc
RUN adduser -S -D -u 1000 -G doc doc
USER doc
