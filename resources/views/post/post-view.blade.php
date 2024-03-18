@extends('layouts.standard')
<div>
    @section('title', 'Post Title')

    @auth
        @include('post.post-store')
    @endauth

    @section('content')
        <!-- print suceess -->
        @if (session('success') || session('error'))
            <div class="alert alert-success">
                {{ session('success') }}
                {{ session('error') }}
            </div>
        @endif

        @foreach($posts as $post)
            <hr />
            @include('post.post-show', ['post' => $post])
        @endforeach
    @endsection
</div>

