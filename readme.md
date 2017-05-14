# Laravel/Cordova test API

# Installation

Up docker containers and install dependencies
```
cd docker
docker-compose up -d
docker-compose exec cot_php bash
composer install
php artisan migrate
```