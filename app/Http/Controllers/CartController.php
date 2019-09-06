<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductType;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function __construct() {
        $categories = Category::whereStatus(1)->get();
        $productTypes = ProductType::whereStatus(1)->get();
        view()->share(['categories'=> $categories,'productTypes' => $productTypes] );
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $carts = Cart::content();
        return view('client.pages.cart',compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->ajax()) {
            if($request->qty == 0)
            {
                return response()->json(['error' => 'Update fail']);
            }else {
                Cart::update($id,$request->qty);
                return response()->json(['result' => 'Update success']);
            }
            
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        if($request->ajax()) {
            Cart::remove($id);
            return response()->json(['result' => 'Delete success']);
        }
    }

    public function addCart($id , Request $request) {
        $product = Product::find($id);

        $qty = $product->qty ? $product->qty : 1;
        $price = $product->promo > 0 ? $product->promo : $product->price;

        $cart = ['id' => $id, 'name' => $product->name , 'qty' => $qty , 'price' => $price , 'weight' => 0 ,'options' => ['img' => $product->image]];
        Cart::add($cart);
        return back()->with('message','Add to cart success');
    }

    public function destroyCart() {
        Cart::destroy();
    }
}
