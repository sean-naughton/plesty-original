#!/bin/bash

chown -R www-data:www-data \
        /var/www/html/storage \
        /var/www/html/bootstrap/cache

composer install

echo "Waiting for mysql..."
while ! mysqladmin ping -hdb -pplestydbpassword --silent; do
  sleep 0.1
done
echo "MySQL started"

php artisan migrate

php-fpm

