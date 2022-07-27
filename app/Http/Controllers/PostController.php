<?php

namespace App\Http\Controllers;

use App\Models\PostModel\Post;

class PostController extends Controller
{

    function showString() {
        return 'Hello Post String';
    }

    function show() {
        return view('pages.post.index');
    }

    function create() {
        return view('pages.post.create');
    }

    function store() {
        
        request()->validate([
            'name' => 'required|max:10',
            'description' => 'required',
        ]);

        Post::create(request()->all());
        return redirect('post');
    }
}
