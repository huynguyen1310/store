<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductType;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct() {
        $categories = Category::whereStatus(1)->get();
        $productTypes = ProductType::whereStatus(1)->get();
        view()->share(['categories'=> $categories,'productTypes' => $productTypes] );
    }

    public function index() {
        $cartCount = Cart::count();
        $products = Product::whereStatus(1)->take(8)->latest()->get();
        return view('client.pages.index',compact('products','cartCount'));
    }


}
