<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login() {

        $user = new User;
        $user = $user->where('email', '=', request()->email)->first();

        if($user && Hash::check( request()->password, $user->getAuthPassword())) {
            return $user->createToken(time())->plainTextToken;
        }

        return 'Wrong username or password';
    }

    public function logout() {

        auth()->user()->currentAccessToken()->delete();

        return 'You are logged out ;-)';
    }
}
