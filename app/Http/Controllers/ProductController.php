<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // index
    public function index()
    {

        $query = Product::query();
        if (request()->has('pack_type')) {
            $query->where('pack_type', request('pack_type'));
        }
        $count_pack = Product::where('pack_type', 'pack')->count();
        $total = Product::count();
        $products = $query->paginate(request()->get('limit', 3));
        return response()->json([
            'products' => $products,
            'total' => $total,
            'count_pack' => $count_pack
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