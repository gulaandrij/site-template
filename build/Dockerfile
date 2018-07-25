FROM php:7.2-fpm

RUN apt-get update
RUN apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev curl bzip2 zip unzip libpq-dev

RUN docker-php-ext-configure gd \
        --enable-gd-native-ttf \
        --with-freetype-dir=/usr/include/freetype2 \
        --with-png-dir=/usr/include \
        --with-jpeg-dir=/usr/include

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install gd pdo opcache pdo_pgsql pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN pecl install apcu
RUN docker-php-ext-enable apcu

#RUN a2enmod rewrite

#ADD build/vhost.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html