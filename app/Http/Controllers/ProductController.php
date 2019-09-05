<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreProductRequest;
use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;


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
        $categories = Category::whereStatus(1)->get();
        return view('admin.pages.product.list',compact('products','categories'));
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
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
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
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return response()->json($product,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|min:2|max:255|unique:products,name',
                'description' => 'required|min:2',
                'qty' => 'required|numeric',
                'price' => 'required|numeric',
                'promo' => 'required|numeric',
                'image' => 'image',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()],200);
        }

        $product = Product::find($id);
        $product->update([
            'name' => $request->name,
            'slug' => str_slug($request->name , '-'),
            'idCategory' => $request->category,
            'status' => $request->status,
            'qty' => $request->qty,
            'price' => $request->price,
            'promo' => $request->promo,
            'description' => $request->description
        ]);

        return response()->json(['success' => 'Update success'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if(File::exists('img/upload/product/'.$product->image)) {
            unlink('img/upload/product/'.$product->image);
        };
        $product->delete();

        return response()->json(['success' => 'Delete success'],200);
    }
}
