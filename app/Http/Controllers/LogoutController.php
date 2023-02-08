<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    /*
        Handle Logout Request
    */
    public function logout(){
        Session::flush();

        Auth::logout();

        return view("pages.logout-success");
    }
}
