@vite('resources/css/app.css')
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<!-- make a cool checkout with products tailwindcss -->
<div class="min-h-screen flex flex-col items-center justify-center my-16 gap-16">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
            <div>
                <h1>{{ $product['quantity'] }}</h1>
                @include('shop.product.product-teaser', ['checkout' => true, 'product' => $product['product']])
            </div>
        @endforeach
    </div>

    <!-- add total price and checkout for payment button -->
    <div class="flex flex-col items-center justify-center w-full p-4">
        <div>
            <h3 class="text-lg font-semibold">Total Price</h3>
            <p class="text-sm text-gray-600 leading-relaxed">{{ $total }} €</p>
        </div>
        <div class="flex items-center justify-center w-full mt-2">
            <a href="{{ route('checkout-order') }}" class="mt-4 px-4 py-2 bg-red-500 text-white rounded-md focus:outline-none hover:bg-blue-600">Checkout for Payment</a>
        </div>
    </div>
</div>
