<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //
    public function index(){
        return view("pages.profile", [
            "account" => Auth::user(),
        ]);
    }

    public function update(Request $request){
        $validated = $request->validate([
            'first_name' => "required|max:25|regex:/^[\w-]*$/",
            'last_name' => "required|max:25|regex:/^[\w-]*$/",
            "email" => "required|email:dns",
            "role" => "required|in:user,admin",
            "gender" => "required|in:male,female",
            "display_picture" => "mimes:jpg,png,jpeg",
            "password" => "required|min:8|regex:/[0-9]/|confirmed",
            "password_confirmation" => "required|min:8|regex:/[0-9]/"
        ]);

        $updatedCredentials = [
            "first_name" => $validated["first_name"],
            "last_name" => $validated["last_name"],
            "email" => $validated["email"],
        ];


        $convertion = [
            "female" => 1,
            "male" => 2,
            "user" => 1,
            "admin" => 2,
        ];
        $updatedCredentials["gender_id"] = $convertion[$validated["gender"]];
        $updatedCredentials["role_id"] = $convertion[$validated["role"]];

        if(!Hash::check($validated["password"], Auth::user()->password))$updatedCredentials["password"] = bcrypt($validated["password"]);

        // Change display picture if a new one is uploaded
        if($request->hasFile("display_picture")){
            $display_picture_name = $validated["first_name"] . " " . $validated["last_name"] . "." . $request->file('display_picture')->extension();
            Storage::putFileAs("/public/images", $request->file("display_picture"), $display_picture_name);
            $updatedCredentials["display_picture_link"] = "/" . $display_picture_name;
        }else{
            $updatedCredentials["display_picture_link"] = Auth::user()->display_picture_link;
        }

        Account::where('id', Auth::user()->id)->update($updatedCredentials);

        return view("pages.profile-success");
    }
}
