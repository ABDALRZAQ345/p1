<?php

namespace App\Http\Controllers;

use App\Mail\Password_reset;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class PasswordController extends Controller
{
    public function update()
    {
        return view('password.update');
    }

    public function check()
    {
        request()->validate([
            'email' => ['required', 'email'],
        ]);

        $user = User::where('email', request('email'))->first();
        if ($user) {
            Mail::to($user->email)->send(new Password_reset($user));

            return "verification email has been sent to $user->email ";
        } else {
            throw ValidationException::withMessages([
                'email' => 'you dont have an account try to sign up ',
            ]);
        }

    }

    public function verify(User $user)
    {
        return view('password.verify', ['user' => $user]);
    }

    public function store(User $user)
    {
        request()->validate([
            'password' => ['required', 'min:8', 'confirmed'],
        ]);
        $user->update(
            [
                'password' => Hash::make(request('password')),
            ]
        );
        Auth::login($user);

        return to_route('posts.index');
    }
}
