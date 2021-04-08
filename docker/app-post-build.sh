#!/bin/bash

chown -R www-data:www-data \
        /var/www/html/storage \
        /var/www/html/bootstrap/cache

echo "Waiting for mysql..."
while ! nc -z db 3306; do
  sleep 0.1
done
echo "MySQL started"

php artisan migrate

php-fpm

