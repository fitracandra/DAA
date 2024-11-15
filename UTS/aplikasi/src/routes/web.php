<?php



use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\TransactionController;
use Illuminate\Support\Facades\Route;


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


Route::prefix('api')->middleware('api')->group(function () {
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('transactions', TransactionController::class);
});

Route::prefix('api')->group(function () {
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('transactions', TransactionController::class);
});

Route::get('/', function () {
    return view('welcome');
});
