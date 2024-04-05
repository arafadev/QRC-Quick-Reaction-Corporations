<?php

use App\Http\Controllers\Admin\NotificationController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\IntroController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewOrderController;
use App\Http\Controllers\Admin\ProviderController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\FinishOrderController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\CancelledOrderController;
use App\Http\Controllers\Admin\InProgressOrderController;


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

    // Intros
    Route::get('intros', [IntroController::class, 'index'])->name('intros.index');
    Route::get('intro/create', [IntroController::class, 'create'])->name('intro.create');
    Route::post('intro/store', [IntroController::class, 'store'])->name('intro.store');
    Route::get('intro/edit/{id}', [IntroController::class, 'edit'])->name('intro.edit');
    Route::post('intro/update/{id}', [IntroController::class, 'update'])->name('intro.update');
    Route::get('intro/delete/{id}', [IntroController::class, 'delete'])->name('intro.delete');

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
    Route::get('users/index', [UserController::class, 'index'])->name('admins.users.index');
    Route::get('user/create', [UserController::class, 'create'])->name('admins.user.create');
    Route::post('user/store', [UserController::class, 'store'])->name('admins.user.store');
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('admins.user.edit');
    Route::post('user/update/{id}', [UserController::class, 'update'])->name('admins.user.update');
    Route::get('user/delete/{id}', [UserController::class, 'delete'])->name('admins.user.delete');
    Route::get('user/active/{id}', [UserController::class, 'active'])->name('admins.user.active');
    Route::get('user/inactive/{id}', [UserController::class, 'inactive'])->name('admins.user.inactive');

    // Providers
    Route::get('providers/index', [ProviderController::class, 'index'])->name('providers.index');
    Route::get('provider/create', [ProviderController::class, 'create'])->name('provider.create');
    Route::post('provider/store', [ProviderController::class, 'store'])->name('provider.store');
    Route::get('provider/edit/{id}', [ProviderController::class, 'edit'])->name('provider.edit');
    Route::post('provider/update/{id}', [ProviderController::class, 'update'])->name('provider.update');
    Route::get('provider/delete/{id}', [ProviderController::class, 'delete'])->name('provider.delete');
    Route::get('provider/active/{id}', [ProviderController::class, 'active'])->name('provider.active');
    Route::get('provider/inactive/{id}', [ProviderController::class, 'inactive'])->name('provider.inactive');

    // Categories
    Route::get('categories/index', [CategoryController::class, 'index'])->name('admins.categories.index');
    Route::get('category/create', [CategoryController::class, 'create'])->name('admins.category.create');
    Route::post('category/store', [CategoryController::class, 'store'])->name('admins.category.store');
    Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('admins.category.edit');
    Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('admins.category.update');
    Route::get('category/active/{id}', [CategoryController::class, 'active'])->name('admins.category.active');
    Route::get('category/inactive/{id}', [CategoryController::class, 'inactive'])->name('admins.category.inactive');
    Route::get('category/delete/{id}', [CategoryController::class, 'delete'])->name('admins.category.delete');

    // Services
    Route::get('services/index', [ServiceController::class, 'index'])->name('admins.services.index');
    Route::get('service/create', [ServiceController::class, 'create'])->name('admins.service.create');
    Route::post('service/store', [ServiceController::class, 'store'])->name('admins.service.store');
    Route::get('service/edit/{id}', [ServiceController::class, 'edit'])->name('admins.service.edit');
    Route::post('service/update/{id}', [ServiceController::class, 'update'])->name('admins.service.update');
    Route::get('service/active/{id}', [ServiceController::class, 'active'])->name('admins.service.active');
    Route::get('service/inactive/{id}', [ServiceController::class, 'inactive'])->name('admins.service.inactive');
    Route::get('service/delete/{id}', [ServiceController::class, 'delete'])->name('admins.service.delete');

    // NewOrders 
    Route::get('orders/new_orders', [NewOrderController::class, 'index'])->name('admins.new_orders.index');
    Route::get('orders/new_order/show/{id}', [NewOrderController::class, 'show'])->name('admins.new_order.show');
    // InProgress Order 
    Route::get('orders/inprogress', [InProgressOrderController::class, 'index'])->name('admins.inprogress_orders.index');
    Route::get('orders/inprogress_order/show/{id}', [InProgressOrderController::class, 'show'])->name('admins.inprogress_order.show');

    // Finished Order 
    Route::get('orders/finished', [FinishOrderController::class, 'index'])->name('admins.finished_orders.index');
    Route::get('orders/finished/show/{id}', [FinishOrderController::class, 'show'])->name('admins.finished_order.show');

    // Cancelled Order 
    Route::get('orders/cancelled', [CancelledOrderController::class, 'index'])->name('admins.cancelled_orders.index');
    Route::get('orders/cancelled/show/{id}', [CancelledOrderController::class, 'show'])->name('admins.cancelled_order.show');

    // Notification
    Route::get('notifications', [NotificationController::class, 'index'])->name('admins.notifications');
});

