@extends('layouts.standard')

@section('content')
    @include('shop.product.product-teaser', ['detail' => false])
@endsection
