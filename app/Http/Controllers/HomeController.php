<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /*
        Handle Show Home Page
    */
    public function index(){
        $item_list = Item::paginate(10);

        return view("pages.home", [
            "item_list" => $item_list,
        ]);
    }
}
