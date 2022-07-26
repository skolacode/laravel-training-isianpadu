<?php

namespace App\Http\Controllers;

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

        // Store in database here;

        return redirect('post');
    }
}
