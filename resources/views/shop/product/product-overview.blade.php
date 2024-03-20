@extends('layouts.standard')
@section('content')
<div class="min-h-screen flex items-center justify-center my-16 gap-16">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($products as $product)
            @include('shop.product.product-teaser')
        @endforeach
    </div>
</div>
@endsection
