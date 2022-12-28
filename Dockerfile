FROM php:7.3-fpm-alpine
# FROM php:8.2.0-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql sockets
RUN curl -sS https://getcomposer.org/installer​ | php -- \
     --install-dir=/usr/local/bin --filename=composer

RUN apk update && apk add nodejs npm

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN chmod +x entrypoint.sh
ENTRYPOINT ["./entrypoint.sh"]

CMD ["php","artisan","serve","--host=0.0.0.0"]
#RUN npm run dev
#RUN composer install
