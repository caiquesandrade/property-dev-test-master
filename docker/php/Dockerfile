FROM php:8.0-fpm-buster

WORKDIR /var/www/html

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && sync

RUN install-php-extensions mysqli
RUN install-php-extensions pdo_mysql
RUN install-php-extensions opcache
RUN install-php-extensions bcmath
RUN install-php-extensions amqp
RUN install-php-extensions zip
RUN install-php-extensions redis
RUN install-php-extensions apcu

RUN rm -rf /var/cache/apk/* && rm -rf /tmp/* && \
    curl --insecure https://getcomposer.org/composer-stable.phar -o /usr/bin/composer && chmod +x /usr/bin/composer

EXPOSE 9000
