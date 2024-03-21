@vite('resources/css/app.css')
<!-- display all orders -->
<div class="min-h-screen flex flex-col items-center justify-center my-16 gap-16">
    <h1 class="text-primary text-4xl font-bold font-serif">{{ $headline }}</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($orders as $order)
            @include('shop.order.order-teaser', [
              'order' => $order,
              'total' => $order->products->map(function($product) {
                    return ($product->rabattPrice ?? $product->price) * $product->pivot->quantity;
                })->sum()
            ])
        @endforeach
    </div>
</div>
