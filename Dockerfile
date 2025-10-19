# Utilise l'image officielle PHP 8.3 CLI
FROM php:8.3-cli

# Installer les dépendances pour mbstring et autres extensions
RUN apt-get update && apt-get install -y \
    libonig-dev \
    git \
    unzip \
    zip \
    && docker-php-ext-install mbstring \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Définir le répertoire de travail
WORKDIR /app

# Copier le projet
COPY . /app

# Installer Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && composer install

# Exposer le port
EXPOSE 10000

# Lancer le serveur PHP
CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]
