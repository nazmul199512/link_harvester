# Link Harvester - Laravel 11


## Description

This repository contains a Laravel application that serves as a skeleton for building web applications using the Laravel framework.

## Features

- **Laravel Framework**: Built on top of the Laravel framework, a powerful PHP framework for web artisans.
- **Composer Dependencies**: Uses Composer to manage PHP dependencies.
- **Dockerized Environment**: Includes Docker configuration files for easy setup and deployment.
- **MySQL Database**: Configured to use a MySQL database.
- **Nginx Web Server**: Configured with Nginx web server.
- **Supervisor for Queue Processing**: Uses Supervisor for managing queue workers.
- **Composer Scripts**: Includes Composer scripts for common tasks such as autoloading, migrations, and more.

## Installation and Setup

### Prerequisites

Before you begin, ensure you have the following installed on your local machine:

- Docker
- Composer


   ```bash
## Getting Started

### Clone the Repository

```bash
git clone https://github.com/nazmul199512/link-harvester.git
cd link-harvester

cp .env.example .env


### Build and Start the Containers

docker-compose up --build


Accessing the Application
Web Application: The Laravel application will be accessible at http://localhost:8000.
Web Server: The Nginx web server will be accessible at http://localhost:8080.
MySQL Database: MySQL will be running on port 3306.

Services
`app`
Image: link-harvester-app
Ports: 8000:9000
Volumes: ./:/var/www/html
Environment File: .env
Depends On: db

`db`
Image: mysql:8.0.36
Ports: 3306:3306
Environment File: .env

`webserver`
Image: nginx:alpine
Ports: 8080:80, 443:443
Volumes: ./nginx/nginx.conf:/etc/nginx/nginx.conf:ro
Depends On: app
Container Name: webserver
Restart Policy: unless-stopped
TTY: true

`scheduler`
Image: link-harvester-scheduler
Volumes: ./:/var/www/html
Environment File: .env
Depends On: db




Dockerfile
The Dockerfile sets up the PHP 8.2 environment with necessary extensions and dependencies for running a Laravel application.


Key Points
Base Image: php:8.2-fpm
Work Directory: /var/www/html
Installed Packages: git, unzip, libpq-dev, libjpeg-dev, libpng-dev, libfreetype6-dev, libonig-dev, libxml2-dev, libzip-dev, zip, sudo, supervisor
PHP Extensions: pdo, pdo_mysql, mysqli, gd, mbstring, zip, exif, pcntl, bcmath, opcache
User: appuser
Composer: Installed globally
Exposed Port: 9000
Commands:
CMD ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisor/supervisord.conf"]
CMD ["php-fpm"]

Composer.json
The composer.json file contains the configuration for the Laravel 11 project.

Key Dependencies
PHP: ^8.2
Laravel Framework: ^11.0
Laravel Tinker: ^2.9
Dev Dependencies
Faker PHP: ^1.23
Laravel Pint: ^1.13
Laravel Sail: ^1.26
Mockery: ^1.6
Nunomaduro Collision: ^8.0
PHPUnit: ^10.5
Spatie Laravel Ignition: ^2.4

Autoloading
PSR-4:
"App\\": "app/"
"Database\\Factories\\": "database/factories/"
"Database\\Seeders\\": "database/seeders/"

Scripts

Post Autoload Dump:
"Illuminate\\Foundation\\ComposerScripts::postAutoloadDump"
"@php artisan package:discover --ansi"

Post Update Command:
"@php artisan vendor:publish --tag=laravel-assets --ansi --force"

Post Root Package Install:
"@php -r \"file_exists('.env') || copy('.env.example', '.env');\""
Post Create Project Command:
"@php artisan key:generate --ansi"
"@php artisan migrate --ansi"
