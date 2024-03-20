@vite('resources/css/app.css')
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<div class="min-h-screen flex items-center justify-center my-16 gap-16">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
            @include('shop.product.product-teaser')
        @endforeach
    </div>

</div>
