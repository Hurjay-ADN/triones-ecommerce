<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SessionController;
use App\Models\Product;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [SessionController::class, 'destroy'])->name('session.destroy');

    Route::get('/carts', [CartController::class, 'index'])->name('carts.index');
    Route::post('/carts/{product}', [CartController::class, 'addToCart'])->name('carts.store');
    Route::put('/carts/{cart}', [CartController::class, 'updateQuantity'])->name('carts.update');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/carts', [CartController::class, 'checkOut'])->name('carts.checkout');

    Route::delete('/carts/{cart}', [CartController::class, 'destroy'])->name('carts.destroy');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.store');

    Route::get('/login', [SessionController::class, 'login'])->name('login');
    Route::post('/login', [SessionController::class, 'store'])->name('session.store');
});


Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->controller(AdminController::class)
    ->group(function () {

        Route::get('/dashboard', 'dashboard')->name('admin.dashboard');
        Route::get('/products/index', 'productsIndex')->name('admin.products.index');
        Route::get('/products/create', 'productsCreate')->name('admin.products.create');
        Route::post('/products', 'productsStore')->name('admin.products.store');
        Route::get('/products/{product}', 'productsShow')->name('admin.products.show');
        Route::get('/products/{product}/edit', 'productsEdit')->name('admin.products.edit');
        Route::put('/products/{product}', 'productsUpdate')->name('admin.products.update');
        Route::delete('/products/{product}', 'productsDestroy')->name('admin.products.destory');
        Route::get('/orders', 'ordersIndex')->name('admin.orders.index');
        Route::put('/orders/{order}', 'ordersUpdate')->name('admin.orders.update');
    });
