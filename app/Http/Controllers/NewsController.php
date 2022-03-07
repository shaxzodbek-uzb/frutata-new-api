<?php

namespace App\Http\Controllers;

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
}