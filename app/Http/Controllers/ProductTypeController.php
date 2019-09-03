<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreProductTypeRequest;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productType = ProductType::paginate(5);
        $categories = Category::whereStatus(1)->get();
        return view('admin.pages.productType.list', compact('productType','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereStatus(1)->get();
        return view('admin.pages.productType.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductTypeRequest $request)
    {
        ProductType::create([
            'name' => $request->name,
            'slug' => str_slug($request->name,'-'),
            'status' => $request->status,
            'idCategory' => $request->category
        ]);

        return redirect()->route('product-type.index')->with('message','Add success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $productType)
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
        $productType = ProductType::find($id);
        $categories = Category::whereStatus(1)->get();

        return response()->json($productType,200);
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
                'name' => 'required|min:2|max:255|unique:product_types,name',
            ],
            [
                'name.required' => 'Product type can\'t be blank',
                'name.min' => 'Product type must be more than 2 character',
                'name.max' => 'Product type can\'t be more 255 character',
                'name.unique' => 'Product type already exists'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()],200);
        }
        
        $productType = ProductType::find($id);
        $productType->update([
            'name' => $request->name,
            'slug' => str_slug($request->name , '-'),
            'idCategory' => $request->category,
            'status' => $request->status
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
        $productType = ProductType::find($id);
        $productType->delete();

        return response()->json(['success' => 'delete success'],200);
    }
}
