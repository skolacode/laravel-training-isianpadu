<?php

namespace App\Http\Controllers;

use App\Mail\PostCreatead;
use App\Models\PostModel\Post;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;


class PostController extends Controller
{

    function showString() {
        return 'Hello Post String';
    }

    function show() {
        $posts = Post::with("user")->orderBy('created_at', 'desc')->paginate(5);

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

        Mail::to('bern2727@gmail.com')->send(new PostCreatead());
        
        return redirect()->route('post');
    }

    public function getfromAPI() {
        $res = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/vnd.BNM.API.v1+json'
        ])->get('https://api.bnm.gov.my/public/exchange-rate');
        
        $currencyResponse = $res->body();

        \Log::debug('res boyd: ', [ json_decode($currencyResponse) ]);


        $decodeData = json_decode($currencyResponse);

        return view('pages.currencyList', compact('decodeData'));
    }
}
