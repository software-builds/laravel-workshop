@vite('resources/css/app.css')
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<!-- make a cool checkout with products tailwindcss -->
<div class="min-h-screen flex items-center justify-center my-16 gap-16">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($order->products as $product)
            @include('shop.product.product-teaser', ['checkout' => true])
        @endforeach
    </div>
    <!-- calc full price of products -->
    <div class="fixed bottom-0 left-0 right-0 bg-white shadow-lg p-4">
        <p class="text-lg font-semibold text-gray-800">Total: {{ $totalPrice }} €</p>
    </div>
    <!-- add infors from order: payment_method, status -->
    <div class="fixed bottom-0 left-0 right-0 bg-white shadow-lg p-4">
        <p class="text-lg font-semibold text-gray-800">Payment Method: {{ $order->payment_method }}</p>
        <p class="text-lg font-semibold text-gray-800">Status: {{ $order->status }}</p>
    </div>
</div>
