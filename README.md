Symfony Standard Edition
========================

to run API application you need to execute

```
cd docker
create .env from .env.dist 
run docker-compose build
run docker-compose up -d
run docker-compose exec php bash 
composer install
php bin/console doctrine:migration:migrate
php bin/console doctrine:fixtures:load

for runing tests:
php bin/console doctrine:migration:migrate --env=test
```