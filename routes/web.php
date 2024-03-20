<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

// Overview
Route::get('/', [PostController::class, 'view'])
    ->name('home');

// products view
Route::get('/shop', [ShopController::class, 'index'])
    ->name('shop');

// products view
Route::get('/shop/sales', [ShopController::class, 'sales'])
    ->name('shop-sales');

Route::get('/addToCheckout/{id}', [ShopController::class, 'addToCheckout'])
    ->name('checkout-add');

Route::get('/removeFromCheckout/{id}', [ShopController::class, 'removeFromCheckout'])
    ->name('checkout-remove');

Route::get('/checkout', [ShopController::class, 'checkout'])
    ->name('checkout');

Route::get('/checkoutOrder', [ShopController::class, 'checkoutOrder'])
    ->name('checkout-order');

Route::get('/orders', [OrderController::class, 'index'])
    ->name('orders');

Route::middleware('auth')->group(function () {
    // Creation
    Route::post('/', [PostController::class, 'store'])
        ->name('store');

    // Deletion
    Route::delete('/{post}', [PostController::class, 'destroy'])
        ->name('destroy');

    // Update
    Route::get('/edit/{post}', [PostController::class, 'updateForm'])
        ->name('update-form');

    // Update
    Route::patch('/{post}', [PostController::class, 'update'])
        ->name('update');
});

// Show
Route::get('/{post}', [PostController::class, 'show'])
    ->name('show');
