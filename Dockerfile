FROM php:8.0-apache

# Install necessary packages and dependencies

# Install necessary packages and dependencies
RUN apt-get update && apt-get install -y \
    autoconf \
    libssl-dev \
    && rm -rf /var/lib/apt/lists/*
# Enable necessary PHP extensions
RUN pecl install mongodb && docker-php-ext-enable mongodb
# RUN composer require jenssegers/mongodb


# Set working directory
WORKDIR /var/www/html