# a pantheon centric wordpress image
FROM wordpress:6.6.1-php8.3-fpm
LABEL Author="h.adamlenz<hadamlenz@me.com>"

RUN apt-get update && \
    apt-get install libldap2-dev nano subversion wget default-mysql-client nodejs npm -y

RUN curl -LO https://phar.phpunit.de/phpunit.phar && \
    chmod +x phpunit.phar && \
    mv phpunit.phar /usr/local/bin/phpunit

RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && \
    chmod +x wp-cli.phar && \
    mv wp-cli.phar /usr/local/bin/wp

COPY ./docker/conf/php.ini /usr/local/etc/php/conf.d/extra.ini
COPY ./docker/conf/php-fpm.conf /usr/local/etc/php-fpm.d/extra.conf
COPY ./docker/conf/cacert.pem /etc/ssl/certs/cacert.pem

RUN rm -rf /var/lib/apt/lists/* 

RUN pecl install redis && docker-php-ext-enable redis

ENV PHP_OPCACHE_VALIDATE_TIMESTAMPS="0" \
    PHP_OPCACHE_MAX_ACCELERATED_FILES="10000" \
    PHP_OPCACHE_MEMORY_CONSUMPTION="192" \
    PHP_OPCACHE_MAX_WASTED_PERCENTAGE="10"

RUN docker-php-ext-install mysqli ldap pdo_mysql 

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# opcache
RUN mkdir -m 777 /var/www/tmp
WORKDIR /var/www/html/web