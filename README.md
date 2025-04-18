# Rent-a-Car

Bienvenue sur **Rent-a-Car**, une application web développée avec Laravel.

## 📦 Prérequis

Assure-toi d’avoir les éléments suivants installés :

- PHP >= 8.1
- Composer
- Laravel
- MySQL
- Git

## 🚀 Installation

Voici les étapes pour lancer ce projet en local :

```bash
# 1. Cloner le projet
git clone https://github.com/TryaNever/Rent-A-Car.git
cd Rent-A-Car

# 2. Installer les dépendances PHP
composer install

# 3. Copier le fichier d’environnement et le configurer
cp .env.example .env

# 4. Générer la clé de l'application
php artisan key:generate

# 5. Configurer la base de données dans le fichier .env
# Exemple :
# DB_DATABASE=nom_bdd
# DB_USERNAME=utilisateur
# DB_PASSWORD=motdepasse

# MAIL_MAILER=smtp
# MAIL_HOST=smtp.gmail.com
# MAIL_PORT=587
# MAIL_USERNAME=votre_mail_gmail
# MAIL_PASSWORD=votre_password_d'application_gmail
# MAIL_FROM_ADDRESS="votre_mail_gmail
# MAIL_ENCRYPTION=tls
# MAIL_FROM_NAME="${APP_NAME}"

# 6. Créer votre BDD avec le fichier sql

# 7. Lancer les migrations (et les seeders si besoin)
php artisan migrate --seed

# 8. Lancer le serveur de développement
php artisan serve
