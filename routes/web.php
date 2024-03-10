<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
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
    Route::post('profile', [AdminProfileController::class, 'update'])->name('admin.profile');
    Route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    // Admins
    Route::get('index', [AdminController::class, 'index'])->name('admin.index');

});
