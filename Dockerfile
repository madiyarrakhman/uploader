FROM php:7.2-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
RUN docker-php-ext-install gd

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

RUN mkdir -p /tmp
RUN mkdir -p /var/www
RUN mkdir -p /var/www/runtime/cache
RUN mkdir -p /var/www/public/uploads

RUN chown -R www:www /var/www/runtime/cache
RUN chmod 775 /var/www/runtime/cache

RUN chown -R www:www /var/www/public/uploads
RUN chmod 776 /var/www/public/uploads

RUN chown -R www:www /tmp
RUN chmod 776 /tmp

USER www

EXPOSE 9000
CMD ["php-fpm"]