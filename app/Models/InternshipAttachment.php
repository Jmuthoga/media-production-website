<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class InternshipAttachment extends Model
{
    protected $fillable = [
        'title',
        'description',
        'organization',
        'duration',
        'image',
        'apply_link',
        'icon',
        'type',
        'meta',
        'stat_value',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    // helper to get image url
    public function imageUrl()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    // convenience to test type
    public function isType($t)
    {
        return Str::lower($this->type) === Str::lower($t);
    }
}
