// Inastalation

- php artisan storage:link
- php artisan migrate

Debugbar:
composer require barryvdh/laravel-debugbar --dev
APP_DEBUG=true

Laravel Telescope: //отслеживать количество запросов
composer require laravel/telescope

php artisan telescope:install
 
php artisan migrate

Пам'ятка:
exists:tags,id - в валидаторе проверяем, что это значение есть в таблице tags в столбце id