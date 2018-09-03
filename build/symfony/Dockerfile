FROM php:7.2-fpm

RUN apt-get update
RUN apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev curl bzip2 zip unzip libpq-dev libicu-dev libmagickwand-dev

RUN docker-php-ext-configure gd \
        --enable-gd-native-ttf \
        --with-freetype-dir=/usr/include/freetype2 \
        --with-png-dir=/usr/include \
        --with-jpeg-dir=/usr/include

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-configure intl
RUN docker-php-ext-install gd pdo opcache pdo_pgsql pgsql zip intl mysqli pdo_mysql exif

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN pecl install apcu imagick
RUN docker-php-ext-enable apcu imagick

WORKDIR /var/www/html