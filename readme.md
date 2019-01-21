<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## add@config all branch
```bash
DB::connection()->getPdo();                         # check connect to db
composer require barryvdh/laravel-debugbar --dev    # i debugbar
```

## API
```bash
php artisan make:resource AccountsResource
php artisan make:resource AccountsResource --collection
$table->unsignedTinyInteger('age'); #max value 255

// echo date('Y-m-d');
// echo time(); // --> 1548082392
// echo date('Y-m-d H:i:s', '1548082392'); -> 2019-01-21 09:53:12
```