<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LiveEvent extends Model
{
    protected $fillable = [
        'title',
        'description',
        'video_url',
        'start_time',
        'end_time',
        'is_live'
    ];
}
