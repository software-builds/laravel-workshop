<?php

use App\Http\Controllers\AuthController;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:api'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/products', function() {
        return ProductResource::collection(Product::all());
    });

    Route::get('/orders', function() {
        return OrderResource::collection(Order::all());
    });

    Route::get('/logout', [AuthController::class, 'logout']);
});
