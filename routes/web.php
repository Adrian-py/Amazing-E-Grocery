<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route to change localization
Route::get('/lang/{loc}', function($loc){
    App::setLocale($loc);
    session()->put("loc", $loc);
    session()->save();

    return redirect()->back();
});

Route::middleware("guest")->group(function(){
    Route::get('/', function () {
        return view('welcome');
    });

    // Login Page
    Route::get('/login', [LoginController::class, 'index'])->name("login");
    Route::post("/login", [LoginController::class, "attempt"]);

    // Register Page
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::middleware("auth")->group(function () {
    Route::get("/home", [HomeController::class, "index"]);

    // Logout
    Route::post("/logout", [LogoutController::class, "logout"]);

    // Product Detail
    Route::get("/product/{item:item_slug}", [ItemController::class, "detail"]);
    Route::post("/product-buy/{item:item_slug}", [OrderController::class, "add"]);

    // Cart
    Route::get("/cart", [OrderController::class, "index"]);
    Route::post("/remove-item/{order:id}", [OrderController::class, "remove"]);
    Route::post("/checkout", [OrderController::class, "checkout"]);

    // Profile
    Route::get("/profile", [ProfileController::class, "index"]);
    Route::post("/profile", [ProfileController::class, "update"]);
});

Route::middleware("admin")->group(function (){
    // Account Maintenance
    Route::get("/account-maintenance", [AccountController::class, "manage"]);
    Route::get("/update-profile/{account:id}", [AccountController::class, "change"]);
    Route::post("/update-profile/{account:id}", [AccountController::class, "update"]);
    Route::post("/delete-account/{account:id}", [AccountController::class, "delete"]);
});

