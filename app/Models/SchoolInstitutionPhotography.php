<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolInstitutionPhotography extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'hero_image',
        'hero_right_image',
        'gallery',
    ];

    protected $casts = [
        'gallery' => 'array', // automatically cast JSON to array
    ];
}
