<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    // index
    public function index()
    {
        $partners = Partner::all();
        return response()->json([
            'partners' => $partners
        ]);
    }
    // show
    public function show($id)
    {
        $partner = Partner::find($id);
        return response()->json([
            'partner' => $partner
        ]);
    }
    // store
    public function store(Request $request)
    {
        $partner = Partner::create($request->all());
        return response()->json([
            'partner' => $partner
        ]);
    }
    // update
    public function update(Request $request, $id)
    {
        $partner = Partner::find($id);
        $partner->update($request->all());
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