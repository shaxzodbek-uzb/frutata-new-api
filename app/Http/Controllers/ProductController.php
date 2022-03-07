<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // index
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'products' => $products
        ]);
    }
    // show
    public function show($id)
    {
        $product = Product::find($id);
        return response()->json([
            'product' => $product
        ]);
    }
    // store
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json([
            'product' => $product
        ]);
    }
    // update
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return response()->json([
            'product' => $product
        ]);
    }
    // destroy
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json([
            'success' => true
        ]);
    }
}