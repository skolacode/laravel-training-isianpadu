<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        
        request()->validate([
            'name' => 'required|max:10|numeric',
            'description' => 'required',
        ]);

        Post::create(request()->all());
        return redirect('post');
    }
}
