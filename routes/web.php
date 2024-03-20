<?php

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

Route::get('/checkout/{id}', [ShopController::class, 'checkout'])
    ->name('checkout');

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

    Route::get('/shop/sales', [PostController::class, 'shop'])
        ->name('shop-sale');
});

// Show
Route::get('/{post}', [PostController::class, 'show'])
    ->name('show');
