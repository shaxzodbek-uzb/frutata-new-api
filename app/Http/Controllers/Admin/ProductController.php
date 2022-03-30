<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $model = Product::class;

    // store
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'name_ru' => 'required',
            'name_en' => 'required',
            'description' => 'required',
            'description_ru' => 'required',
            'description_en' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required',
        ]);

        $data['image'] = '';//$this->uploadImageFile($request->file('image'));

        $product = Product::create($data);
        return response()->json([
            'product' => $product
        ]);
    }
    // update
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $data = $this->validate($request, [
            'name' => 'required',
            'name_ru' => 'required',
            'name_en' => 'required',
            'description' => 'required',
            'description_ru' => 'required',
            'description_en' => 'required',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImageFile($request->file('image'));
        } else {
            unset($data['image']);
        }
        $product->update($data);
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