<?php

namespace App\Http\Controllers;

use App\Category;
use App\ProductType;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getproducttype(Request $request) {
        $productType = ProductType::where('idCategory',$request->id)->get();
        return response()->json($productType,200);
    }
}
