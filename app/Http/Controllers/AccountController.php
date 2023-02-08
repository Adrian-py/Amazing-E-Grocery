<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function manage(){
        return view("pages.account-maintenance", [
            "accounts" => Account::where("id", "!=", Auth::user()->id)->get(),
        ]);
    }

    public function change(Account $account){
        return view("pages.account-update", [
            "account" => $account,
        ]);
    }

    public function update(Request $request, Account $account){
        $convertion = [
            "user" => 1,
            "admin" => 2,
        ];

        $account->role_id = $convertion[$request->role];
        $account->save();

        return redirect("/account-maintenance");
    }

    public function delete(Account $account){
        $account->delete();

        return redirect()->back();
    }
}
