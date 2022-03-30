<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function uploadImageFile($image)
    {
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $image_path = 'images/' . $new_name;
        return $image_path;
    }

    protected $model;
    protected $model_query;
    protected $model_name;
    protected $model_name_plural;

    public function __construct()
    {
        $this->model_name_plural = Str::of(class_basename($this->model))->snake()->plural()->__toString();
        $this->model_name = Str::of(class_basename($this->model))->snake()->__toString();
        $this->model_query = $this->model::query();
    }
    // index
    public function index()
    {
        $items = $this->model_query->get();
        return response()->json([
            $this->model_name_plural => $items
        ]);
    }
    // show
    public function show($id)
    {
        $item = $this->model_query->find($id);
        return response()->json([
            $this->model_name => $item
        ]);
    }
}