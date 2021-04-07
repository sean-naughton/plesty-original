FROM php:5.6-zts-alpine

#RUN apt-get update -y && apt-get install -y libmcrypt-dev && apt-get install -y sqlite3 libsqlite3-dev
RUN apk update && apk add libmcrypt-dev

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo mbstring

WORKDIR /app
COPY . /app

RUN composer install

EXPOSE 8000
CMD php artisan serve --host=0.0.0.0 --port=8000