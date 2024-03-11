<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
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

});
