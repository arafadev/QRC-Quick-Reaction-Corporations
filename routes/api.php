<?php

use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\ProviderController;
use App\Http\Controllers\Api\OrderStatusController;


Route::get('intros', [SettingController::class, 'intros']);
Route::post('home', [ProviderController::class, 'home']);
Route::post('provider-details', [ProviderController::class, 'providerDetails']);
Route::post('show-provider-services', [OrderController::class, 'showProviderServices']);
Route::post('calculate-order', [OrderController::class, 'calculateOrder']);
Route::post('create-order', [OrderController::class, 'createOrder']);
Route::post('order-details', [OrderController::class, 'orderDetails']);

Route::get('/inprogress-order', [OrderStatusController::class, 'ShowInprogress']);
Route::get('/finished-order', [OrderStatusController::class, 'ShowFinished']);
Route::get('/cancelled-order', [OrderStatusController::class, 'ShowCancelled']);
Route::post('order-infos/{id}', [OrderController::class, 'orderInfos']);


Route::get('user-profile/{id}', [UserController::class, 'get_profile']);
Route::put('update-profile/{id}', [UserController::class, 'update_Profile']);
Route::post('delete-profile/{id}', [UserController::class, 'delete_profile']);

// Route::post('logout' , [AuthController::class , 'logout']);
// Route::post('login', [AuthController::class, 'handleCallback']);
// Route::middleware('jwt.auth')->group(function () {

// });