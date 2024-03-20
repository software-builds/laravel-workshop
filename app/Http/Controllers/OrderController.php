<?php

namespace App\Http\Controllers;

use App\Models\User;

class OrderController extends Controller
{
    public function index()
    {
        return view('shop.order.order-overview', [
            'orders' => User::find(2)->orders,
        ]);
    }
}
