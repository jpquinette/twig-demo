# Utilise PHP 8.3
FROM php:8.3-cli

# Installer dépendances système
RUN apt-get update && apt-get install -y \
    git unzip zip curl nodejs npm \
    && docker-php-ext-install mbstring \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Crée le dossier de travail
WORKDIR /app

# Copier tous les fichiers
COPY . .

# Installer Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && rm composer-setup.php

# Installer dépendances PHP et JS
RUN composer install && npm install

# Compiler les styles avec Gulp
RUN npx gulp styles && cp -r dist public/dist

# Exposer le port utilisé par Render
EXPOSE 10000

# Démarre le serveur PHP intégré
CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]
