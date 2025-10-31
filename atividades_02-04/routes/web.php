<?php

/*
comandos para limpeza de caches do Laravel:

composer dump-autoload
php artisan route:clear
php artisan config:clear
php artisan view:clear

 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home_officeController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('home_offices', Home_officeController::class);

Route::resource('categories', CategoryController::class);

