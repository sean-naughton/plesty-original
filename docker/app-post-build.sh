#!/bin/bash

ln -s /var/www/html/storage/app/public /var/www/html/public/storage

chown -R www-data:www-data \
        /var/www/html/storage \
        /var/www/html/bootstrap/cache

cp -R /var/www/html/engines /var/www/html/storage/app


composer install

echo "Waiting for mysql..."
while ! mysqladmin ping -hdb -pplestydbpassword --silent; do
  sleep 0.1
done
echo "MySQL started"

php artisan migrate --force

php-fpm

