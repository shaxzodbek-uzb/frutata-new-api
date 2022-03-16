<?php

namespace App\Http\Controllers;

use App\Models\Request;
use Illuminate\Http\Request as HttpRequest;

class RequestController extends Controller
{
    protected $model = Request::class;


    // store
    public function store(HttpRequest $request)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'organization' => 'required',
        ]);

        $request = $this->model_query->create($data);
        return response()->json([
            'request' => $request
        ]);
    }
}