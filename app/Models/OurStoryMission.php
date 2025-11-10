<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurStoryMission extends Model
{
    use HasFactory;

    // Table name (optional if following Laravel convention)
    protected $table = 'our_story_sections';

    // Mass assignable fields
    protected $fillable = [
        'title',
        'description',
        'organization',
        'duration',
        'image',
        'type',
        'meta',
        'stat_value'
    ];

    // Cast 'meta' JSON column to array automatically
    protected $casts = [
        'meta' => 'array',
    ];
}

