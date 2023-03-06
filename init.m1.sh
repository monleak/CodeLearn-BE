docker-compose -f docker-compose.m1.yml up --build -d
docker-compose exec app composer install
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan optimize
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed


