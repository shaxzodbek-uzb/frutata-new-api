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
}