<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Provider\UserController;
use App\Http\Controllers\Provider\ServiceController;
use App\Http\Controllers\Provider\CategoryController;
use App\Http\Controllers\ProviderDashboardController;
use App\Http\Controllers\Auth\Provider\ProviderLoginController;


Route::group(['prefix' => 'provider', 'middleware' => 'guest:provider'], function () {
    Route::get('login', [ProviderLoginController::class, 'getLogin'])->name('provider.login.form');
    Route::post('login', [ProviderLoginController::class, 'login'])->name('provider.login');
});

Route::group(['prefix' => 'provider', 'middleware' => 'auth:provider'], function () {
    Route::get('dashboard', [ProviderDashboardController::class, 'index'])->name('provider.dashboard');
    Route::get('logout', [ProviderLoginController::class, 'logout'])->name('provider.logout');
    Route::get('users/index', [UserController::class, 'index'])->name('users.index');

    // Categories
    Route::get('categories/index', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    // Services
    Route::get('services/index', [ServiceController::class, 'index'])->name('services.index');
    Route::get('service/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('service/store', [ServiceController::class, 'store'])->name('service.store');
    Route::get('service/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');
    Route::get('service/active/{id}', [ServiceController::class, 'active'])->name('service.active');
    Route::get('service/inactive/{id}', [ServiceController::class, 'inactive'])->name('service.inactive');
    Route::post('service/update/{id}', [ServiceController::class, 'update'])->name('service.update');
    Route::get('service/delete/{id}', [ServiceController::class, 'delete'])->name('service.delete');









});
