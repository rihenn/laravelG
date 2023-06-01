FROM phpdockerio/php:8.0-fpm
WORKDIR "/application"
COPY . .
ARG DEBIAN_FRONTEND=noninteractive
RUN apt-get update
RUN apt-get -y --no-install-recommends install php8.0-bcmath php8.0-bz2 php8.0-gd php8.0-igbinary php8.0-imagick php8.0-interbase php8.0-memcache php8.0-memcached php8.0-mongodb php8.0-mysql php8.0-pgsql php8.0-redis php8.0-xdebug php8.0-xmlrpc php8.0-xsl php8.0-yaml
RUN apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# ENV COMPOSER_ALLOW_SUPERUSER 1
RUN composer update
# RUN composer install
# RUN php -m
RUN chmod -R 777 storage
RUN chmod -R 777 bootstrap/cache
RUN php artisan key:generate
