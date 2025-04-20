# Utilise l'image officielle PHP avec les extensions nécessaires
FROM php:8.3-fpm

# Installe les dépendances système
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd

# Installe Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définit le dossier de travail
WORKDIR /var/www

# Copie les fichiers de l'application dans le conteneur
COPY . .

# Donne les permissions à Laravel
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage

# Expose le port utilisé par le conteneur PHP-FPM
EXPOSE 9000
