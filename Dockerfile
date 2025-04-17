
FROM php:8.3-fpm

RUN apt-get update && apt-get install -y nginx \
    curl git unzip libpng-dev libjpeg-dev libfreetype6-dev libzip-dev \
    && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo_mysql

WORKDIR /var/www/html
COPY ./api /var/www/html

COPY ./nginx/default.conf /etc/nginx/conf.d/default.conf

EXPOSE 80

CMD service nginx start && php-fpm -F


RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
