<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Provider\UserController;
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
    Route::get('category/edit/{id}',   [CategoryController::class, 'edit'])->name('category.edit');






});
