#!/bin/bash

set -e

# Installer les dépendances PHP si le dossier vendor est absent
echo "📦 Installation des dépendances..."
composer install --no-interaction --prefer-dist

# Nettoyage du cache Symfony
echo "🧹 Nettoyage du cache Symfony..."
php bin/console cache:clear
php bin/console cache:warmup

# Démarrer PHP-FPM
exec docker-php-entrypoint php-fpm
