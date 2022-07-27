<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    function showString() {
        return 'Hello Post String';
    }

    function show() {
        return view('post.index');
    }

    function create() {
        return view('post.create');
    }

    function store() {
        Post::create(request()->all());
        return redirect('post');
    }
}
