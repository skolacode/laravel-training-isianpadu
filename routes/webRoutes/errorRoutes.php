<?php

use Illuminate\Support\Facades\Route;


Route::get('/errors/unauthorized', function () {
    return view('errors.Unauthorized');
})->name('error.unauthorized');
