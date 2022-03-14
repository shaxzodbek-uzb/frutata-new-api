<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'name_ru', 'name_en', 'image', 'description', 'description_ru', 'description_en', 'price', 'pack_type'];
}