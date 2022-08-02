<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PostModel\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function getAllPost() {
        $posts = Post::paginate(5);

        return response()->json([
            'msg' => 'All Post is here',
            'data'  => $posts
        ]);
    }

    public function createPost() {

        try {
        
            request()->validate([
                'name' => 'required | min:10',
                'description' => 'required | max:50'
            ]);

            Post::create(request()->all());

            return response()->json([
                'msg' => 'Post created',
            ]);
        }
        catch (\Exception $err) {

            return response()->json([
                'msg' => 'Error, please check your input',
                'errors' => $err->getMessage()
            ]);
        }
    }

    public function deletePost($id) {

        Post::destroy($id);
        
        return response()->json([
            'msg' => 'Post id > '. $id .' is deleted',
        ]);
    }

    public function updatePost($id) {
        $posts = Post::find($id);

        $posts->fill(request()->all());
        $posts->save();

        return response()->json([
            'msg' => 'Post id > '. $id .' is updated',
        ]);
    }
}
