<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('shop.product.product-overview', [
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function checkout(int $id)
    {
        $order = Order::find($id);

        if (!$order->exists()) {
           $order = new Order();
        }

        return view('shop.checkout.checkout', [
            'order' => $order,
            'totalPrice' => $order->products->sum('price')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addToCheckout(Request $request)
    {
        $product = Product::find($request->id);
        $product->orders()->attach($request->id);
        return redirect()->route('checkout');
    }

    /**
     * Display the specified resource.
     */
    public function removeFromCheckout(string $id)
    {
        $product = Product::find($id);
        $product->orders()->detach($id);
        return redirect()->route('checkout');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
