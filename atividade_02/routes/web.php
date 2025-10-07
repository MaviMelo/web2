<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home_officeController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('home_offices', Home_officeController::class);


/*
comandos para limpeza de caches do Laravel:

composer dump-autoload
php artisan route:clear
php artisan config:clear
php artisan view:clear

 */

