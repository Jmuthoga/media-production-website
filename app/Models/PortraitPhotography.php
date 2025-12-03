<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortraitPhotography extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'hero_image',
        'hero_right_image',
        'gallery',
        'cta_title',
        'cta_description',
    ];

    protected $casts = [
        'gallery' => 'array', // Automatically converts JSON <-> array
    ];
}
