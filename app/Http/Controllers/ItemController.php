<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /*
        Handle View Item Detail
    */
    public function detail(Item $item){
        return view("pages.item-detail", [
            "item_detail" => $item,
        ]);
    }
}
