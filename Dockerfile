# Utilise l'image officielle PHP 8.3 CLI
FROM php:8.3-cli

# Installer les extensions PHP nécessaires
RUN docker-php-ext-install mbstring

# Définir le répertoire de travail
WORKDIR /app

# Copier tous les fichiers du projet dans le conteneur
COPY . /app

# Installer Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN composer install

# Exposer le port
EXPOSE 10000

# Lancer le serveur PHP
CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]
