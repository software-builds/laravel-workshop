@php use Illuminate\Support\Facades\Hash;use Illuminate\Support\Str; @endphp
@extends('layouts.standard')

@section('content')
    <div class="flex flex-col w-full my-10">
        <h1 class="font-serif text-primary text-4xl font-bold mb-2">Bestellung</h1>
        <div class="w-full grid grid-cols-2 bg-white rounded-lg text-white shadow-md gap-10 p-6 mb-8">
            <!-- Title -->
            <div class="w-32 space-y-4">
                <h3 class="font-serif text-primary text-xl">Zahlungsmethode</h3>
                @switch($order->payment_method)
                    @case('paypal') <img
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/1024px-PayPal.svg.png">@break
                    @case('credit_card') <img
                        src="https://www.mastercard.de/content/dam/public/mastercardcom/eu/de/images/logo/mc-logo-52.svg">@break
                    @case('cash') <h1 class="text-xl text-gray-900 font-semibold mb-2">Barzahlung</h1>@break
                    @default <h1 class="text-xl text-gray-900 font-semibold mb-2">Offen</h1>@break
                @endswitch
            </div>
            <div class="space-y-2">
                <h3 class="font-serif text-primary text-xl">Zu leistener Betrag</h3>
                <p class="text-gray-600 font-light mb-2">{{ $total }} €</p>
            </div>
            <!-- Color Indicator -->
            <div class="space-y-2">
                <h3 class="font-serif text-primary text-xl">Bestellungstatus</h3>
                @switch($order->status)
                    @case('paid')
                        <div class="w-fit px-2 rounded-full mr-2" style="background-color: green">Bezahlt</div> @break
                    @case('pending')
                        <div class="w-fit px-2 shadow rounded-full mr-2" style="background-color: orange">In Arbeit
                        </div> @break
                    @case('delivered')
                        <div class="w-fit px-2 shadow rounded-full mr-2" style="background-color: blue">Geliefert
                        </div> @break
                    @case('shipped')
                        <div class="w-fit px-2 shadow rounded-full mr-2" style="background-color: blue">Versendet
                        </div> @break
                    @case('canceled')
                        <div class="w-fit px-2 shadow rounded-full mr-2" style="background-color: red">Abgebrochen
                        </div> @break
                    @default
                        <div class="w-fit px-2 shadow rounded-full mr-2" style="background-color: gray">Kein Status
                        </div> @break
                @endswitch
            </div>

            <!-- Order Information -->
            <div class="space-y-2">
                <h3 class="font-serif text-primary text-xl">Bestellnummer</h3>
                <p class="text-gray-600 font-light mb-2">{{
                      Str::of(((new \Carbon\Carbon($order->created_at))->timestamp + $order->id))->toBase64()->upper()->limit(10, '')
                }}</p>
            </div>
        </div>

        <!-- List all order products -->
        <h2 class="font-serif text-primary text-3xl">Bestellte Produkte</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @foreach($order->products as $product)
                @include('shop.product.product-teaser', ['product' => $product, 'order' => TRUE, 'detail' => TRUE, 'quantity' => $product->pivot->quantity])
            @endforeach
        </div>
    </div>

@endsection
