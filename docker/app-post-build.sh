#!/bin/bash

php artisan migrate

chown -R www-data:www-data \
        /var/www/html/storage \
        /var/www/html/bootstrap/cache

php-fpm

