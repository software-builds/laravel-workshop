@extends('layouts.standard')

@section('content')
    <!-- make a cool checkout with products tailwindcss -->
    <div class="flex flex-col items-center justify-center my-16 gap-16">
        <h1 class="text-primary text-4xl font-bold font-serif">Warenkorb</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @if($products)
                @foreach($products as $product)
                    <div>
                        @include('shop.product.product-teaser', ['detail' => true, 'checkout' => true, 'product' => $product['product'], 'quantity' => $product['quantity']])
                    </div>
                @endforeach
            @else
                <div class="flex md:col-span-2 flex-col items-center justify-center p-4">
                    <h1 class="text-2xl font-semibold">Ihr Warenkorb ist leer!</h1>
                    <a href="{{ route('shop') }}" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md focus:outline-none hover:bg-blue-600">Zurück zum Shop!</a>
                </div>
            @endif
        </div>
        @if($products)
            <!-- add total price and checkout for payment button -->
            <div class="flex items-center justify-between w-full my-16">
                <div>
                    <h3 class="text-lg font-semibold">Gesamtbetrag</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">{{ $total }} €</p>
                </div>
                <a href="{{ route('checkout-order') }}" class="mt-4 px-4 py-2 bg-red-500 text-white rounded-md focus:outline-none hover:bg-blue-600">Jetzt bezahlen!</a>
            </div>
        @endif
    </div>

@endsection
