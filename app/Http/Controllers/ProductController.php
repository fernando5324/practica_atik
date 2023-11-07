<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        $products = Product::where('is_deleted',0)->get();

        return view('Product.index', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $id = $id == 'new' ? 0 : $id;
        $product = null;
        if ($id != 0) {
            $product = Product::find($id);
        }

        return view('Product.create', compact('id', 'product'));
    }

    public function save(Request $request)
    {
        $product_id = $request->input('id');

        if ($product_id != 0) {
            $product = Product::find($product_id);
        } else {
            $product = new Product;
        }

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->save();

        return redirect()->route('index.product')
            ->with('message', 'Product created successfully.');
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function save_update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->save();

        return redirect()->route('index.product')
            ->with('message', 'Product update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        $product = Product::find($id);
        $product->is_deleted = 1;
        $product->save();

        return redirect()->route('index.product')
            ->with('message', 'Product delete successfully.');
    }
}
