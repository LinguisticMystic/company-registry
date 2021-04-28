<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'main']);
Route::post('/search', [CompaniesController::class, 'search']);
