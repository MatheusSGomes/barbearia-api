<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        // https://laravel.com/docs/9.x/authentication#authenticating-users

        if (Auth::attempt($credentials)) {
            $request->
        }

    }
}
