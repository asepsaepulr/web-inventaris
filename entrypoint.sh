#!/bin/sh

set -e

npm install 
composer install 
php artisan migrate --force
php artisan db:seed --force

exec "$@";