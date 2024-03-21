<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('shop.product.product-overview', [
            'headline' => 'Unsere Produkte',
            'products' => Product::all(),
        ]);
    }

    public function sales()
    {
        return view('shop.product.product-overview', [
            'headline' => 'Unsere Produkte im Angebot',
            'products' => Product::whereNotNull('rabattPrice')->get(),
        ]);
    }

    public function checkout()
    {
        $cards = session()->get('card') ?? [];
        return view('shop.checkout.checkout', [
            'products' => $cards,
            'total' => $cards ? array_sum(array_map(function ($product) {
                return ($product['product']->rabattPrice ?? $product['product']->price) * $product['quantity'];
            }, $cards)) : 0,
        ]);
    }

    public function detail(int $id)
    {
        return view('shop.product.product-detail', [
            'product' => Product::find($id),
        ]);
    }

    // checkout for order.
    public function checkoutOrder()
    {
        $card = session()->get('card');

        if (! $card) {
            session()->flash('error', 'Warenkorb ist leer');

            return redirect()->back();
        }

        $order = User::find(2)->orders()->create([
            'payment_method' => 'paypal',
            'status' => 'pending',
        ]);

        foreach ($card as $id => $product) {
            $order->products()->attach($id, [
                'quantity' => $product['quantity'],
            ]);

            if ($product['product']->stock >= $product['quantity']) {
                $product['product']->stock -= $product['quantity'];
                $product['product']->save();
            } else {
                session()->flash('error', 'Produkt nicht auf Lager');
                return redirect()->back();
            }
        }

        session()->forget('card');
        session()->flash('success', 'Bestellung wurde erfolgreich abgeschlossen');

        return redirect()->route('order-view', ['id' => $order->id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addToCheckout(int $id)
    {
        $card = session()->get('card');

        $product = Product::find($id);

        if (! $product->exists()) {
            session()->flash('error', 'Produkt existiert nicht');

            return;
        }

        if (isset($card[$id])) {
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
