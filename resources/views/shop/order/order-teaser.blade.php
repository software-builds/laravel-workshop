<div class="bg-white rounded-lg shadow-md">
    <div class="px-4 py-3 bg-gray-200 rounded-t-lg">
        <h4 class="text-lg font-semibold">Order #{{ $order->id }}</h4>
    </div>
    <div class="p-4">
        <h5 class="text-xl font-semibold mb-4">Order Details</h5>
        <p class="text-sm mb-2">Placed on: {{ $order->created_at }}</p>
        <p class="text-sm mb-2">Total Amount: {{ $total }} €</p>
        <p class="text-sm mb-2">Status: {{ $order->status }}</p>
        <p class="text-sm mb-2">Payment Method: {{ $order->payment_method }}</p>
        <a href="{{ route('order-view', ['id' => $order->id]) }}" class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">View Order</a>
    </div>
</div>
