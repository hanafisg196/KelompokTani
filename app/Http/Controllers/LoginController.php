<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function doLogin(Request $request)
    {
        $user = $request->all();
        $this->validate($request,[
            "email"=> "required|email",
            "password"=> "required"
        ]);

        if(auth()->attempt(["email"=> $user["email"],"password"=> $user["password"]]))
        {
            if(auth()->user()->is_admin == 1)
            {
                return redirect()->route('dashboard');
            } else {
                if(auth()->check())
                {
                    return redirect()->route('home');
                }
            }

        }else{
            return redirect('/login')->with('error',"Password atau Email Salah");
        }
    }

    public function doLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
