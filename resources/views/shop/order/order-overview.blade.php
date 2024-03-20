@vite('resources/css/app.css')
<!-- display all orders -->
<div class="min-h-screen flex flex-col items-center justify-center my-16 gap-16">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($orders as $order)
            <div>
                <h1>{{ $order->id }} - {{ count($order->products) }}</h1>
            </div>
        @endforeach
    </div>
</div>
