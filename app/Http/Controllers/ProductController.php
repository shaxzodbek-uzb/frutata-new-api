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
}