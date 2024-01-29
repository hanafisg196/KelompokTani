<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register()
    {
        return view("login.register");
    }

    public function getRegister(Request $request)
    {

         $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
            
        ]) ;



        $user = User::create([
            "name"=> $request->name,
            "email"=> $request->email,
            "password"=> bcrypt($request->password),
            'password_confirmation' => $request->password_confirmation,
        ]);

        event(new Registered($user));
        Auth::login($user);
        return redirect ("/email/verify");

    }
}
