<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['title', 'type', 'mime', 'path', 'service_item_id', 'county_id', 'description', 'is_public'];
    public function serviceItem()
    {
        return $this->belongsTo(ServiceItem::class);
    }
    public function county()
    {
        return $this->belongsTo(County::class);
    }
}
