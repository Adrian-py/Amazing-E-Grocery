<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    /*
        Register Route Connect
    */
    public function index(){
        return view("auth.register");
    }

    /*
        Handle Register Account
    */
    public function store(Request $request){
        $validated = $request->validate([
            'first_name' => "required|max:25|regex:/^[\w-]*$/",
            'last_name' => "required|max:25|regex:/^[\w-]*$/",
            "email" => "required|email:dns|unique:accounts",
            "role" => "required|in:user,admin",
            "gender" => "required|in:male,female",
            "display_picture" => "required|mimes:jpg,png,jpeg",
            "password" => "required|min:8|regex:/[0-9]/|confirmed",
            "password_confirmation" => "required|min:8|regex:/[0-9]/"
        ]);

        $convertion = [
            "female" => 1,
            "male" => 2,
            "user" => 1,
            "admin" => 2,
        ];

        $validated["password"] = bcrypt($validated["password"]);
        $validated["gender_id"] = $convertion[$validated["gender"]];
        $validated["role_id"] = $convertion[$validated["role"]];

        $display_picture_name = $validated["first_name"] . " " . $validated["last_name"] . "." . $request->file('display_picture')->extension();
        Storage::putFileAs("/public/images", $request->file("display_picture"), $display_picture_name);
        $validated["display_picture_link"] = "/" . $display_picture_name;


        $newAccount = Account::create($validated);

        return redirect("/login")->with("register-success", "Register successful!");
    }
}
