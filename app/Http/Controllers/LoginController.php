<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
        Handle Login View
    */
    public function index(){
        return view("auth.login");
    }

    /*
        Handle Login Attempt
    */
    public function attempt(Request $request){
        $validated = $request->validate([
            "email" => "required|email:dns",
            "password" => "required",
        ]);

        if(Auth::attempt($validated)){
            return redirect()->intended("home");
        }

        return redirect('/login')->withInput()->with("invalid", "Wrong Email/Password. Please Check Again");
    }
}
