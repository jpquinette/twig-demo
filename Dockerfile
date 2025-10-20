# Utilise PHP 8.3 CLI
FROM php:8.3-cli

# Installer dépendances système + mbstring (libonig-dev nécessaire)
RUN apt-get update && apt-get install -y \
    git unzip zip curl nodejs npm \
    libonig-dev \
    && docker-php-ext-install mbstring \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Définir le répertoire de travail
WORKDIR /app

# Copier tous les fichiers du projet
COPY . .

# Installer Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && rm composer-setup.php

# Installer les dépendances PHP et Node
RUN composer install && npm install

# Compiler les styles avec Gulp
RUN npx gulp styles && cp -r dist public/dist

# Exposer le port pour Render
EXPOSE 10000

# Démarrer le serveur PHP intégré
CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]
