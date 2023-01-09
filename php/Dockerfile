# laravel9使用時にはphpを8~以上にする必要あり
FROM php:8.1-fpm

# install gd
# RUN apt-get update \
#   && apt-get install -y wget git unzip libzip-dev libpq-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
#   && docker-php-ext-install zip pdo_mysql \
#   && docker-php-ext-configure gd --with-freetype --with-jpeg \
#   && docker-php-ext-install -j$(nproc) gd

# vite用の設定
EXPOSE 5173

RUN apt-get update \
    && apt-get install -y \
    git \
    zip \
    unzip \
    vim \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng-dev \
    libfontconfig1 \
    libxrender1
# install composer
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install pdo_mysql mysqli exif
RUN apt-get update \
    && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo_mysql pdo_pgsql mysqli 
RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer

# laravel9使用時にはnodeは16以上にする必要あり
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get install -y nodejs

RUN echo "alias ll='ls -la'" >> ~/.bashrc && . ~/.bashrc
WORKDIR /var/www/html/app

# Laravel自身が生成する諸ファイル(ログファイルやコンパイルされたbladeファイルなど)をstorageディレクトリに書き込めるようにする必要がある
# RUN composer install && \ 
# 		php artisan cache:clear && \
# 		php artisan config:clear && \
# 		php artisan config:cache && \
# RUN	chmod -R 777 storage