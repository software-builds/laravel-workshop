<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function view()
    {
        return view('blog.post.post-view', [
            'posts' => Post::all()->sortByDesc('created_at'),
        ]);
    }

    public function store(PostRequest $request)
    {
        $created = User::find(1)->posts()->create(
            $request->validated()
        );

        if ($created) {
            return redirect('/')->with('success', 'Beitrag erfolgreich erstellt');
        }

        return redirect('/');
    }

    public function destroy(Post $post)
    {
        $redirect = redirect('/');

        if ($post->delete()) {
            return $redirect->with('success', 'Beitrag erfolgreich gelöscht');
        }

        return $redirect->with('error', 'Beitrag konnte nicht gelöscht werden');
    }

    public function update(PostRequest $request, Post $post)
    {
        if ($post->update($request->validated())) {
            return redirect('/')->with('success', 'Beitrag erfolgreich aktualisiert');
        }

        return redirect('/')->with('error', 'Beitrag konnte nicht aktualisiert werden');
    }

    public function updateForm(Post $post)
    {
        return view('blog.post.post-update', [
            'post' => $post,
        ]);
    }

    public function show(Post $post)
    {
        return view('blog.post.post-detail', [
            'post' => $post,
        ]);
    }
}
