@extends('layouts.standard')
<div>
    @section('title', 'Post Title')

    @section('content')
        <h1>This is a post title.</h1>
        <p>{{ dump($post) }}</p>
    @endsection
</div>

