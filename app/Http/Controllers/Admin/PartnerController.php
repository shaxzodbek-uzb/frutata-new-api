<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    protected $model = Partner::class;

    // store
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'name_ru' => 'required',
            'name_en' => 'required',
            'image' => 'required|file|max:5120',
            'description' => 'required',
            'description_ru' => 'required',
            'description_en' => 'required',
        ]);


        $data['image'] = $this->uploadImageFile($request->file('image'));


        $partner = Partner::create($data);
        return response()->json([
            'partner' => $partner
        ]);
    }
    // update
    public function update(Request $request, $id)
    {

        $partner = Partner::findOrFail($id);
        $data = $this->validate($request, [
            'name' => 'required',
            'name_ru' => 'required',
            'name_en' => 'required',
            'image' => 'required|file|max:5120',
            'description' => 'required',
            'description_ru' => 'required',
            'description_en' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImageFile($request->file('image'));
        } else {
            unset($data['image']);
        }

        $partner->update($data);

        return response()->json([
            'partner' => $partner
        ]);
    }
    // destroy
    public function destroy($id)
    {
        $partner = Partner::find($id);
        $partner->delete();
        return response()->json([
            'success' => true
        ]);
    }
}