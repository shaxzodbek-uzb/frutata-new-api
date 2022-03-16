<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $model = Product::class;
    // index
    public function index()
    {
        $query = $this->model_query;
        if (request()->has('pack_type')) {
            $query->where('pack_type', request('pack_type'));
        }
        $count_pack = $this->model::where('pack_type', 'pack')->count();
        $total = $this->model::count();
        $products = $query->paginate(request()->get('limit', 3));
        return response()->json([
            'products' => $products,
            'total' => $total,
            'count_pack' => $count_pack
        ]);
    }
}