@extends('layouts.standard')
@section('content')
    <h1 class="text-primary text-4xl font-bold font-serif">{{ $headline }}</h1>
<div class="min-h-screen flex items-center justify-center my-16 gap-16">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($products as $product)
            @include('shop.product.product-teaser', ['detail' => true, ])
        @endforeach
    </div>
</div>
@endsection
