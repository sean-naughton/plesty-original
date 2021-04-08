#!/bin/bash

chown -R www-data:www-data \
        /var/www/html/storage \
        /var/www/html/bootstrap/cache

composer install
php artisan migrate

php-fpm

