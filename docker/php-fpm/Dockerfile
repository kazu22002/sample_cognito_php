FROM php:7.3-fpm

# Install PHP extensions
RUN apt-get update && apt-get install -y \
      libpq-dev git unzip \
    && rm -r /var/lib/apt/lists/* \
    && docker-php-ext-install \
      opcache

# Xdebug のインストールと有効化
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
