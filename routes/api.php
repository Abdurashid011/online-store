<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('/users', UserController::class)
    ->middleware('auth:sanctum');

Route::resource('/categories', CategoryController::class)
    ->middleware('auth:sanctum');

Route::resource('/products', ProductController::class)
    ->middleware('auth:sanctum');

Route::resource('/carts', CartController::class)
    ->middleware('auth:sanctum');
