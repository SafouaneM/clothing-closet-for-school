<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clothingitem extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'name',
        'image_path'
    ];
}
