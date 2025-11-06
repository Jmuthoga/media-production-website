<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'service_item_id',
        'status'
    ];

    public function serviceItem()
    {
        return $this->belongsTo(ServiceItem::class);
    }
}
