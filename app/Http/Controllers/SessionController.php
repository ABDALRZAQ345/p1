<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function check()
    {
        $validated = request()->validate([
            'email' => ['email', 'required'],
            'password' => ['required'],

        ]);
        if (! Auth::attempt($validated)) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'local' => 'password or email are not correct ',
            ]);
        }

        request()->session()->regenerate();

        return to_route('posts.index');
    }

    public function logout()
    {
        Auth::logout();

        return to_route('posts.index');
    }
}
