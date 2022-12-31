#!/bin/sh

set -e

composer install 
php artisan migrate --force
# php artisan db:seed --force

exec "$@";
