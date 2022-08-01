<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function login() {

        $isAuth = auth()->attempt([
            'name' => request()->email,
            'password' => request()->password,
        ]);

        if($isAuth) {
            return redirect()->route('home');
        }
        else {
            return redirect()->route('error.unauthorized');
        }
    }
}
