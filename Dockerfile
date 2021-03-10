# Install PHP and dependencies
# FROM php:7.4-fpm-alpine
FROM php:8.0-fpm-alpine
RUN docker-php-ext-install pdo pdo_mysql

# Install Composer
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY --from=composer /usr/bin/composer /usr/bin/composer
