<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CoffeeController;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart', [CartController::class, 'store']);
Route::put('/cart/amounts', [CartController::class, 'updateAmounts']);
Route::post('/cart/checkout', [CartController::class, 'checkout']);

Route::get('/coffee', [CoffeeController::class, 'index']);
Route::post('/coffee', [CoffeeController::class, 'store']);


