#!/bin/sh

set -e

npm install 
composer install 
php artisan migrate:fresh --force
php artisan db:seed

exec "$@";