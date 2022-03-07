<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // index
    public function index()
    {
        $news = News::all();
        return response()->json([
            'news' => $news
        ]);
    }
    // show
    public function show($id)
    {
        $news = News::find($id);
        return response()->json([
            'news' => $news
        ]);
    }
    // store
    public function store(Request $request)
    {
        $news = News::create($request->all());
        return response()->json([
            'news' => $news
        ]);
    }
    // update
    public function update(Request $request, $id)
    {
        $news = News::find($id);
        $news->update($request->all());
        return response()->json([
            'news' => $news
        ]);
    }
    // destroy
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return response()->json([
            'success' => true
        ]);
    }
}