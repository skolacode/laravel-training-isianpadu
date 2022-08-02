<?php

namespace App\Http\Controllers;

use App\Models\PostModel\Post;

class PostController extends Controller
{

    function showString() {
        return 'Hello Post String';
    }

    function show() {
        $posts = Post::with("user")->orderBy('created_at', 'desc')->get();
        return view('pages.post.index', [ 'posts' => $posts ]);
    }

    function create() {
        return view('pages.post.create');
    }

    function store() {
        
        request()->validate([
            'name' => 'required|max:10',
            'description' => 'required',
        ]);

        $post = new Post;
        $post->fill(request()->all());
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('post');
    }

    function destroy($id) {
        Post::destroy($id);

        return redirect()->route('post');
    }

    function edit($id) {
        $post = Post::find($id);
        return view('pages.post.edit', compact('post'));
    }

    function update($id) {

        request()->validate([
            'name' => 'required|max:10',
            'description' => 'required',
        ]);

        $post = Post::find($id);
        
        $post->fill(request()->all());
        $post->save();
        
        return redirect()->route('post');
    }
}
