<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('admin.pages.product.list',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::whereStatus(1)->get();
        $productTypes = ProductType::whereStatus(1)->get();
        return view('admin.pages.product.add',compact('categories','productTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('image')) {
            $file = $request->image;
            $file_name = $file->getClientOriginalName();
            $file_type = $file->getMimeType();
            $file_size = $file->getSize();

            if($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif') {
                if($file_size <= 1048576) {
                    $file_name = date('DD-mm-yyyy'). '_' . $file_name;
                    if($file->move('img/upload/product', $file_name)) {
                        $data = $request->all();
                        $data['slug'] = str_slug($data['name'],'-');
                        $data['image'] = $file_name;
                        Product::create($data);
                        return redirect()->route('product.index')->with('message','Add Success');
                    };
                }else {
                    return back()->with('error','Image is too large');
                }
            }else {
                return back()->with('error','File is not image');
            }
        }else {
            return back()->with('error','Image is required');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
