<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('shop.product.product-overview', [
            'products' => Product::all(),
        ]);
    }

    public function sales()
    {
        return view('shop.product.product-overview', [
            'products' => Product::whereNotNull('rabattPrice')->get(),
        ]);
    }

    public function checkout()
    {
        return view('shop.checkout.checkout', [
            'products' => session()->get('card') ?? [],
            'total' => session()->get('card') ? array_sum(array_map(function ($product) {
                return $product['product']->price * $product['quantity'];
            }, session()->get('card'))) : 0,
        ]);
    }

    // checkout for order.
    public function checkoutOrder()
    {
        $card = session()->get('card');

        if (!$card) {
            session()->flash('error', 'Warenkorb ist leer');
            return redirect()->back();
        }

        $order = User::find(1)->orders()->create([
            'payment_method' => 'paypal',
            'status' => 'pending'
        ]);

        foreach ($card as $id => $product) {
            $order->products()->attach($id, [
                'quantity' => $product['quantity'],
            ]);
        }

        session()->forget('card');
        session()->flash('success', 'Bestellung wurde erfolgreich abgeschlossen');

        return redirect()->route('home');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function addToCheckout(int $id)
    {
        $card = session()->get('card');

        $product = Product::find($id);

        if (!$product->exists()) {
            session()->flash('error', 'Produkt existiert nicht');
            return;
        }

        if (isset(session()->get('card')[$id])) {
            $card[$id]['quantity']++;
        } else {
            $card[$id] = [
                'quantity' => 1,
                'product' => $product,
            ];
        }

        session()->put('card', $card);
        session()->flash('success', 'Produkt wurde erfolgreich hinzugefügt');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function removeFromCheckout(int $id)
    {
        $card = session()->get('card');

        if (isset($card[$id])) {
            unset($card[$id]);
        }

        session()->put('card', $card);
        session()->flash('success', 'Produkt wurde erfolgreich entfernt');

        return redirect()->back();
    }

}
