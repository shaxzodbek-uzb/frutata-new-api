<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    protected $model = News::class;

    // store
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            // 'image' => 'required|image|max:5120',
            'content' => 'required',
            'content_ru' => 'required',
            'content_en' => 'required',
        ]);

        // image upload
        // $data['image'] = $this->uploadImageFile($request->file('image'));
        $data['image'] = '';
        $news = News::create($data);
        return response()->json([
            'news' => $news
        ]);
    }
    // update
    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        // validate 
        $data = $this->validate($request, [
            'title' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            // 'image' => 'image|max:5120',
            'content' => 'required',
            'content_ru' => 'required',
            'content_en' => 'required',
        ]);
        // image upload if exists
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImageFile($request->file('image'));
        } else {
            unset($data['image']);
        }
        $news->update($data);

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