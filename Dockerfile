FROM php:8.5-apache

# Enable Apache rewrite
RUN a2enmod rewrite

# Set public/ as document root
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf \
    /etc/apache2/conf-available/*.conf

# Install common PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Copy project
COPY . /var/www/html

# Permissions
RUN chown -R www-data:www-data /var/www/html

WORKDIR /var/www/html
