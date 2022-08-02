<?php

use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/v1/status-check', function () {
    return 'API is Alive';
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/post/get-all-post', [PostController::class, 'getAllPost'])->name('api.post.all');
Route::post('/post/create', [PostController::class, 'createPost'])->name('api.post.create');
Route::delete('/post/delete/{id}', [PostController::class, 'deletePost'])->name('api.post.delete');
Route::patch('/post/update/{id}', [PostController::class, 'updatePost'])->name('api.post.update');
