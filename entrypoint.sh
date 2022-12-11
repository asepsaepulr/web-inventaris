#!/bin/sh

set -e

npm install 
composer install 
php artisan migrate --force

exec "$@";