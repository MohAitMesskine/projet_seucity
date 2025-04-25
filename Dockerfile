# Utilise l'image PHP avec Apache
FROM php:8.2-apache

# Copier tous tes fichiers PHP dans le dossier du serveur web
COPY . /var/www/html/

# Activer les extensions PHP nécessaires pour MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql
