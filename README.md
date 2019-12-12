<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

docker-compose exec php bash

Создаем модель + миграцию
```
php artisan make:model Models/BlogCategory -m
```

Создаем сиды
```
php artisan make:seeder UsersTableSeeder
php artisan make:seeder BlogCategoriesTableSeeder
```

Сапуск сидов
```
php artisan db:seed
php artisan db:seed --class=UsersTableSeeder
php artisan migrate:refresh --seed
```

Создаем Rest-контроллер
```
php artisan make:controller RestTestController --resource
```

Список роутов
```
php artisan route:list
```

Cоздать свой обьект Request
```
php artisan make:request TestRequest
```




https://www.youtube.com/watch?v=q9_do7NdRhw&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=13