<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function view(Request $request)
    {
        $sortOrder = $request->get('sort', 'asc');

        if (! in_array($sortOrder, ['asc', 'desc'])) {
            $sortOrder = 'asc';
        }

        $posts = Post::orderBy('created_at', $sortOrder)->with('user')->get();

        return view('blog.post.post-view', [
            'posts' => $posts,
        ]);
    }

    public function store(PostRequest $request)
    {
        $created = Auth::user()->posts()->create(
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

        if (Auth::user()->can('delete', $post) && $post->delete()) {
            return $redirect->with('success', 'Beitrag erfolgreich gelöscht');
        } else {
            return $redirect->with('error', 'Beitrag konnte nicht gelöscht werden');
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
