<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $cart_items = Order::where("account_id", Auth::user()->id)->get();

        $total_price = $cart_items->sum("price");

        return view("pages.cart", [
            "cart_items" => $cart_items,
            "total_price" => $total_price,
        ]);
    }

    public function add(Item $item){
        if(Order::where("item_id", $item->id)->where("account_id", Auth::user()->id)->exists()){
            return redirect()->back()->with("add-failed", "Item already in cart!");
        }

        Order::create([
            "account_id" => Auth::user()->id,
            "item_id" => $item->id,
            "price" => $item->price,
        ]);

        return redirect()->back()->with("add success", "Adding item to cart successful!");
    }

    public function remove(Order $order){
        if($order) $order->delete();

        return redirect()->back()->with("deletion-success", "Item was successfully deleted!");
    }

    public function checkout(){
        Order::where("account_id", Auth::user()->id)->delete();

        return view("pages.checkout-success");
    }
}
