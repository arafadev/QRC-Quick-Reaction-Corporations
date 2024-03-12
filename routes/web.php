<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProviderController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;


Route::redirect('/', '/admin/login');

Route::group(['prefix' => 'admin', 'middleware' => 'guest:admin'], function () {
    Route::get('login', [AdminLoginController::class, 'getLogin'])->name('admin.login.form');
    Route::post('login', [AdminLoginController::class, 'login'])->name('admin.login');
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('profile', [AdminProfileController::class, 'index'])->name('admin.profile');
    Route::post('profile/{id}', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    Route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    // Admins
    Route::get('/index', [AdminController::class, 'index'])->name('admin.index');
    Route::get('create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::get('delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
    Route::get('inactive/{id}', [AdminController::class, 'inactive'])->name('admin.inactive');
    Route::get('active/{id}', [AdminController::class, 'active'])->name('admin.active');

    // Users
    Route::get('users/index', [UserController::class, 'index'])->name('users.index');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('user/edit/{id}',   [UserController::class, 'edit'])->name('user.edit');
    Route::post('user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    Route::get('user/active/{id}', [UserController::class, 'active'])->name('user.active');
    Route::get('user/inactive/{id}', [UserController::class, 'inactive'])->name('user.inactive');

    // Providers
    Route::get('providers/index', [ProviderController::class, 'index'])->name('providers.index');
    Route::get('provider/create', [ProviderController::class, 'create'])->name('provider.create');
    Route::post('provider/store', [ProviderController::class, 'store'])->name('provider.store');
    Route::get('provider/edit/{id}',   [ProviderController::class, 'edit'])->name('provider.edit');
    Route::post('provider/update/{id}',   [ProviderController::class, 'update'])->name('provider.update');
    Route::get('provider/delete/{id}', [ProviderController::class, 'delete'])->name('provider.delete');
    Route::get('provider/active/{id}', [ProviderController::class, 'active'])->name('provider.active');
    Route::get('provider/inactive/{id}', [ProviderController::class, 'inactive'])->name('provider.inactive');
    
    // Categories
    Route::get('categories/index', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category/edit/{id}',   [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('category/update/{id}',   [CategoryController::class, 'update'])->name('category.update');
    Route::get('category/active/{id}', [CategoryController::class, 'active'])->name('category.active');
    Route::get('category/inactive/{id}', [CategoryController::class, 'inactive'])->name('category.inactive');
    Route::get('category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    // Services
    Route::get('services/index', [ServiceController::class, 'index'])->name('services.index');
    Route::get('service/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('service/store', [ServiceController::class, 'store'])->name('service.store');
    Route::get('service/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');
    Route::post('service/update/{id}', [ServiceController::class, 'update'])->name('service.update');
    Route::get('service/active/{id}', [ServiceController::class, 'active'])->name('service.active');
    Route::get('service/inactive/{id}', [ServiceController::class, 'inactive'])->name('service.inactive');
    Route::get('service/delete/{id}', [ServiceController::class, 'delete'])->name('service.delete');




});
