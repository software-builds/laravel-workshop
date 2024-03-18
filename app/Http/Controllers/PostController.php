<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function view()
    {
        return view('post.post-view', [
            'post' => new Post,
        ]);
    }
}
