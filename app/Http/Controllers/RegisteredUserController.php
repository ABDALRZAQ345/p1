<?php

namespace App\Http\Controllers;

use App\Mail\CheckRegistration;
use Illuminate\Http\Request;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class RegisteredUserController extends Controller
{
    //
    public function create(){
        return view('auth.register');
    }

    public function store(){
        $validated=request()->validate([
'name' =>['required','min:3'],
'email'=>['required','email','unique:users'],
'password' =>['required','min:8','confirmed']
]);
$logo=request()->validate([
    'logo'=>['image']
]);
  $logopath="logos/Untitled.png";
if(request()->logo!=null){
   $logopath=request()->logo->store('logos');

}

        $user=User::create([
            'name'=>$validated['name'],
            'email'=>$validated['email'],
            'password'=>Hash::make($validated['password']),
            'logo'=>$logopath
        ]);


        $str=str()->random(6);
       Mail::to($user->email)->send(new CheckRegistration($user,$str));
    Auth::login($user);
    return to_route('posts.index');
        }

}
