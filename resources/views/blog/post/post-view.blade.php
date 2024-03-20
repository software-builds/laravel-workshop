@extends('layouts.standard')
<div>
    @section('title', 'Post Title')

    @section('header-post')
        <a href="{{ route('show', $posts->first()) }}">
            <img src="https://via.placeholder.com/1920x400" alt="Header Image">
        </a>
    @endsection

    @section('content')
        @auth
            @include('blog.post.post-store')
        @endauth
        @if (session('success'))
            <div class="w-full p-4 bg-green-600 text-white">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="w-full p-4 bg-red-600 text-white">
                {{ session('error') }}
            </div>
        @endif

        @foreach($posts as $post)
            <div class="my-5">
                @include('blog.post.post-teaser', ['post' => $post])
            </div>

            @if(!$loop->last)
                <div class="w-full border-b-4 border-dotted border-b-gray-600"></div>
            @endif
        @endforeach
    @endsection
</div>

