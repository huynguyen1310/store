<?php

namespace App\Http\Controllers;

use App\Category;
use App\ProductType;
use App\User;
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
        return view('client.pages.index');
    }


}
