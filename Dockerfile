FROM php:8.2-fpm

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libjpeg-dev \
    libpng-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    sudo \
    supervisor\
    && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . .

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mysqli gd mbstring zip exif pcntl bcmath opcache \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN useradd -m appuser && \
    chown -R appuser:appuser /var/www/html && \
    echo "appuser ALL=(ALL) NOPASSWD:ALL" >> /etc/sudoers

USER appuser

RUN composer install --no-dev --optimize-autoloader --no-interaction

EXPOSE 9000
CMD ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisor/supervisord.conf"]
CMD ["php-fpm"]
