FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    git unzip zip libpq-dev libicu-dev libxml2-dev libzip-dev libonig-dev libxslt1-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Installation des extensions PHP nécessaires
# json amqp redis  iconv sodium curl session  openssl ctype tokenizer xml
RUN docker-php-ext-install pdo pdo_pgsql intl opcache zip xsl sockets

# Installation de XDebug
RUN pecl install xdebug && docker-php-ext-enable xdebug

# Installation de Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Symfony CLI
RUN curl -sS https://get.symfony.com/cli/installer | bash \
    && mv /root/.symfony*/bin/symfony /usr/local/bin/symfony

COPY .docker/php/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh
ENTRYPOINT ["entrypoint.sh"]

# Utilisation du cache d’opcode pour améliorer les performances
COPY .docker/php/conf.d/opcache.ini /usr/local/etc/php/conf.d/opcache.ini
