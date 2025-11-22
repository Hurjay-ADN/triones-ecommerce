<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SessionController;
use App\Models\Product;

Route::get('/', function () {

    $products = Product::all();
    return view('home', compact('products'));


})->name('home');



Route::middleware('auth')->group(function () {
    Route::post('/logout', [SessionController::class, 'destroy'])->name('session.destroy');

    Route::get('/carts', [CartController::class, 'index'])->name('carts.index');
    Route::post('/carts/{product}', [CartController::class, 'addToCart'])->name('carts.store');

    Route::get('/orders',[OrderController::class,'index'])->name('orders.index');


    Route::post('/carts', [CartController::class, 'checkOut'])->name('carts.checkout');

    

});

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.store');

    Route::get('/login', [SessionController::class, 'login'])->name('login');
    Route::post('/login', [SessionController::class, 'store'])->name('session.store');
});


Route::middleware(['auth', 'admin'])->group(function () {
    
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/products/index', [AdminController::class, 'productsIndex'])->name('admin.products.index');
    Route::get('/admin/products/create', [AdminController::class, 'productsCreate'])->name('admin.products.create');
    Route::post('/admin/products', [AdminController::class, 'productsStore'])->name('admin.products.store');
    Route::get('/admin/products/{product}/edit', [AdminController::class, 'productsEdit'])->name('admin.products.edit');
    Route::put('/admin/products/{product}', [AdminController::class, 'productsUpdate'])->name('admin.products.update');
    Route::delete('/admin/products/{product}', [AdminController::class, 'productsDestroy'])->name('admin.products.destory');
    
   
    Route::get('/admin/orders', [AdminController::class, 'ordersIndex'])->name('admin.orders.index');
    Route::put('/admin/orders/{order}', [AdminController::class, 'ordersUpdate'])->name('admin.orders.update');



});