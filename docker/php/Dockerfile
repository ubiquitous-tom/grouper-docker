FROM php:7.2.10-fpm-alpine

RUN apk --no-cache add $PHPIZE_DEPS icu-dev gettext-dev \
    && docker-php-ext-install intl gettext \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-ext-enable pdo_mysql \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && pecl install redis \
    && docker-php-ext-enable redis

RUN { \
        echo 'xdebug.remote_enable=1'; \
        echo 'xdebug.remote_autostart=1'; \
        echo 'xdebug.remote_handler=dbgp'; \
        echo 'xdebug.remote_port=9000'; \
        echo 'xdebug.remote_connect_back=0'; \
        echo 'xdebug.idekey=PHPSTORM'; \
        # echo 'xdebug.remote_log=/tmp/xdebug.log'; \
        echo 'xdebug.remote_host=host.docker.internal'; \
    } > /usr/local/etc/php/conf.d/xdebug-recommended.ini