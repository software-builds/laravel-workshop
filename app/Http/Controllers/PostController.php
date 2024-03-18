<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function view()
    {
        return view('post.post-view', [
            'posts' => Post::all()->sortByDesc('created_at'),
        ]);
    }

    public function store(PostRequest $request)
    {
        $created = User::find(1)->posts()->create(
            $request->validated()
        );

        if ($created) {
            return redirect('/')->with('success', 'Post created successfully');
        }

        return redirect('/');
    }

    public function destroy(Post $post)
    {
        $redirect = redirect('/');

        if ($post->delete()) {
            return $redirect->with('success', 'Post deleted successfully');
        }

        return $redirect->with('error', 'Post could not be deleted');
    }

    public function update(PostRequest $request, Post $post)
    {
        if ($post->update($request->validated())) {
            return redirect('/')->with('success', 'Post updated successfully');
        }

        return redirect('/')->with('error', 'Post could not be updated');
    }

    public function updateForm(Post $post)
    {
        return view('post.post-update', [
            'post' => $post,
        ]);
    }

    public function show(Post $post)
    {
        return view('post.post-view', [
            'post' => $post,
        ]);
    }
}
