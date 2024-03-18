<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Overview
Route::get('/', [PostController::class, 'view']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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

Auth::routes();

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
