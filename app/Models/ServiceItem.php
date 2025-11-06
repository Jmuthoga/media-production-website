<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceItem extends Model
{
    protected $fillable = ['category_id', 'title', 'slug', 'description', 'price', 'is_active'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
    public function inquiries()
    {
        return $this->hasMany(Inquiry::class);
    }
}
