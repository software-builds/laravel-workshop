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
            'orders' => Order::orderBy('id', $sortOrder)->get(),
        ]);
    }

    public function view(int $id)
    {
        return view('shop.order.order-view', [
            'order' => Order::find($id),
        ]);
    }
}
