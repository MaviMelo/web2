<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home_officeController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('home_offices', Home_officeController::class);
