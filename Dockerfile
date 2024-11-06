# Utiliser l'image PHP officielle avec Apache
FROM php:8.1-apache

# Installer les extensions PHP nécessaires (ajuster selon les besoins)
RUN docker-php-ext-install pdo pdo_mysql

# Copier les fichiers de l'application dans le dossier du serveur web
COPY ./src /var/www/html

# Activer le module mod_rewrite si nécessaire
RUN a2enmod rewrite

# Exposer le port 80 pour accéder à l'application via le navigateur
EXPOSE 80

# Démarrer Apache
CMD ["apache2-foreground"]
