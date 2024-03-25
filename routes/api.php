<?php

use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\ProviderController;


Route::get('intros', [SettingController::class, 'intros']);
Route::post('home', [ProviderController::class, 'home']);
Route::post('provider-details', [ProviderController::class, 'providerDetails']);
Route::post('show-provider-categories', [OrderController::class, 'showProviderServices']);
Route::post('calculate-order', [OrderController::class, 'calculateOrder']);
Route::post('create-order', [OrderController::class, 'createOrder']);
Route::post('order-details', [OrderController::class, 'orderDetails']);

