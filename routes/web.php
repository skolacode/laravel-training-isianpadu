<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
-
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/user/{id}', function ($id) {
    return 'User id is: '.$id. ' :'. request()->hello;
})->name('user.id');

Route::name('about')->prefix('about')->group(function() {
    Route::get('/contact', function () {
        return view('about.contact');
    })->name('.contact');
    
    Route::get('', function () {
        return 'About';
    });
});

Route::resource('members', MemberController::class);

Route::name('post')->controller(PostController::class)->prefix('post')->group(function() {
    Route::get('', 'show');
    Route::get('/create', 'create')->name('.create');
    Route::post('/store', 'store')->name('.store');
    Route::get('/string', 'showString')->name('.string');
});
