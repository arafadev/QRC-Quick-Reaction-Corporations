<?php
use App\Http\Controllers\Provider\ProviderProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Provider\UserController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Provider\ServiceController;
use App\Http\Controllers\Provider\CategoryController;
use App\Http\Controllers\Provider\NewOrderController;
use App\Http\Controllers\ProviderDashboardController;
use App\Http\Controllers\Admin\CancelledOrderController;
use App\Http\Controllers\Provider\FinishOrderController;
use App\Http\Controllers\Provider\ContactMessageController;
use App\Http\Controllers\Provider\InProgressOrderController;
use App\Http\Controllers\Auth\Provider\ProviderLoginController;


Route::group(['prefix' => 'provider', 'middleware' => 'guest:provider'], function () {
    Route::get('login', [ProviderLoginController::class, 'getLogin'])->name('provider.login.form');
    Route::post('login', [ProviderLoginController::class, 'login'])->name('provider.login');
});

Route::group(['prefix' => 'provider', 'middleware' => 'auth:provider'], function () {
    Route::get('dashboard', [ProviderDashboardController::class, 'index'])->name('provider.dashboard');
    Route::get('profile', [ProviderProfileController::class, 'index'])->name('provider.profile');
    Route::post('profile/{id}', [ProviderProfileController::class, 'update'])->name('provider.profile.update');
    Route::get('logout', [ProviderLoginController::class, 'logout'])->name('provider.logout');
    Route::get('users/index', [UserController::class, 'index'])->name('users.index');

    // Categories
    Route::get('categories/index', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('category/active/{id}', [CategoryController::class, 'active'])->name('category.active');
    Route::get('category/inactive/{id}', [CategoryController::class, 'inactive'])->name('category.inactive');
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

    // NewOrders 
    Route::get('orders/new_orders', [NewOrderController::class, 'index'])->name('new_orders.index');
    Route::get('orders/new_order/show/{id}', [NewOrderController::class, 'show'])->name('new_order.show');
    Route::get('orders/accept/order/{id}', [NewOrderController::class, 'accept_order'])->name('order.accept');
    Route::get('orders/accept/order_finished/{id}', [NewOrderController::class, 'finished_order'])->name('order.accept_finished');
    Route::get('orders/accept/order_cancelled/{id}', [NewOrderController::class, 'cancelled_order'])->name('order.cancelled');

    // InProgress Order 
    Route::get('orders/inprogress', [InProgressOrderController::class, 'index'])->name('inprogress_orders.index');
    Route::get('orders/inprogress_order/show/{id}', [InProgressOrderController::class, 'show'])->name('inprogress_order.show');

    // Finished Order 
    Route::get('orders/finished', [FinishOrderController::class, 'index'])->name('finished_orders.index');
    Route::get('orders/finished/show/{id}', [FinishOrderController::class, 'show'])->name('finished_order.show');

    // Cancelled Order 
    Route::get('orders/cancelled', [CancelledOrderController::class, 'index'])->name('cancelled_orders.index');
    Route::get('orders/cancelled/show/{id}', [CancelledOrderController::class, 'show'])->name('cancelled_order.show');

    // Contact Message 
    Route::get('create/message', [ContactMessageController::class, 'createMessage'])->name('providers.create_message');
    Route::post('contact_us/{id}', [ContactMessageController::class, 'create'])->name('providers.contact_us.create');


});
