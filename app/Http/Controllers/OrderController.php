<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $sortOrder = $request->get('sort', 'asc');

        if (! in_array($sortOrder, ['asc', 'desc'])) {
            $sortOrder = 'asc';
        }

        return view('shop.order.order-overview', [
            'headline' => 'Bestellungen',
            'orders' => Order::orderBy('id', $sortOrder)->get(),
        ]);
    }

    public function view(int $id)
    {
        return view('shop.order.order-view', [
            'order' => Order::find($id),
            'total' => Order::find($id)->products->map(function ($product) {
                return ($product->rabattPrice ?? $product->price) * $product->pivot->quantity;
            })->sum(),
        ]);
    }
}
