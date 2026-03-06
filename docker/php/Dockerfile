FROM dunglas/frankenphp:php8.4-bookworm
ARG DEV_USER_ID
RUN apt-get update
RUN apt-get install -y  libzip-dev libpq-dev git vim wget gpg unzip
RUN install-php-extensions \
    zip \
    pdo \
    pdo_pgsql

RUN apt-get clean && rm -rf /var/lib/apt/lists/*
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN curl -sS https://get.symfony.com/cli/installer | bash && mv /root/.symfony5/bin/symfony /usr/local/bin/symfony
RUN install-php-extensions xdebug
RUN useradd -u $DEV_USER_ID -m -U -s /bin/zsh developer
USER developer
WORKDIR /app
