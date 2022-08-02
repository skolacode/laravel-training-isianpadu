<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/login', function () {
    return view('pages.auth.login');
})->name('login');


Route::post('/login', [UserController::class, 'login'])->name('auth.login.attempt');
Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');

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

Route::middleware('auth')->name('post')->controller(PostController::class)->prefix('post')->group(function() {
    Route::get('/string', 'showString')->name('.string');
    
    // Lesson 1
    Route::get('', 'show');
    
    // Lesson 2
    Route::get('/create', 'create')->name('.create');
    
    // Lesson 3
    Route::post('/store', 'store')->name('.store');
    
    // Lesson 4
    Route::delete('/destroy/{id}', 'destroy')->name('.destroy');

    // Lesson 5
    Route::get('/edit/{id}', 'edit')->middleware('log.url')->name('.edit');
    Route::patch('/update/{id}', 'update')->name('.update');
});

Route::get('/errors/unauthorized', function () {
    return view('errors.Unauthorized');
})->name('error.unauthorized');
