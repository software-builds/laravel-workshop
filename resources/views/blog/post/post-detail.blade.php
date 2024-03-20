@extends('layouts.standard')
<div>
    @section('title', 'Post Title')

    @section('header-post')
        <img src="https://via.placeholder.com/1920x400" alt="Header Image">
    @endsection

    @section('content')
        <div class="prose lg:prose-xl mb-16">
            <h1 class="mb-5 text-primary font-bold font-serif">{{ $post->title }}</h1>
            <span class="inline-block text-base  font-light">
                von <span class="font-bold">{{ $post->user->name }}</span>
                {{ $post->created_at->diffForHumans() }}
            </span>
            <p>{{ $post->content }}</p>
        </div>
    @endsection
</div>

