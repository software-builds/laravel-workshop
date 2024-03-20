@extends('layouts.standard')

@section('content')
    <div class="flex flex-col w-full p-4">
        <div class="max-w-lg bg-white rounded-lg text-white shadow-md p-6 mb-8">
            <!-- Title -->
            @switch($order->payment_method)
                @case('paypal') <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/1024px-PayPal.svg.png">@break
                @case('credit_card') <img src="https://www.mastercard.de/content/dam/public/mastercardcom/eu/de/images/logo/mc-logo-52.svg">@break
                @case('cash') <h1 class="text-xl text-gray-900 font-semibold mb-2">Barzahlung</h1>@break
                @default <h1 class="text-xl text-gray-900 font-semibold mb-2">Offen</h1>@break
            @endswitch
            <!-- Description -->
            <p class="text-gray-600 font-light mb-2">{{ $order->price }}</p>
            <!-- Color Indicator -->
            @switch($order->status)
                @case('paid') <div class="w-fit p-2 rounded-full mr-2" style="background-color: green">Bezahlt</div> @break
                @case('pending') <div class="w-fit p-2 rounded-full mr-2" style="background-color: orange">In Arbeit</div> @break
                @case('delivered') <div class="w-fit p-2 rounded-full mr-2" style="background-color: blue">Geliefert</div> @break
                @case('shipped') <div class="w-fit p-2 rounded-full mr-2" style="background-color: blue">Versendet</div> @break
                @case('canceled') <div class="w-fit p-2 rounded-full mr-2" style="background-color: red">Abgebrochen</div> @break
                @default <div class="w-fit p-2 rounded-full mr-2" style="background-color: gray">Kein Status</div> @break
            @endswitch
        </div>

        <!-- List all order products -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @foreach($order->products as $product)
                @include('shop.product.product-teaser', ['product' => $product, 'order' => true])
            @endforeach
        </div>
    </div>

@endsection
