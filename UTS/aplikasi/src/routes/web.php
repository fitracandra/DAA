<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\PaymentController;

/* NOTE: Do Not Remove
/ Livewire asset handling if using sub folder in domain
*/
/*Livewire::setUpdateRoute(function ($handle) {
    return Route::post(env('ASSET_PREFIX', '').'/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(env('ASSET_PREFIX', '').'/livewire/livewire.js', $handle);
});
/*
/ END
*/

use App\Http\Controllers\ProductController;

Route::prefix('api')->group(function () {
    Route::apiResource('products', ProductController::class);
});

Route::middleware('api')->prefix('api')->group(function () {
    Route::apiResource('products', ProductController::class);
});

Route::apiResource('orders', OrderController::class);

Route::apiResource('order-items', OrderItemController::class);

Route::apiResource('payments', PaymentController::class);

Route::get('/', function () {
    return view('welcome');
});
