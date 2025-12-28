<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name',
        'total_quantity',
        'damaged_quantity',
        'replacement_link',
        'description',
    ];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_items')
            ->withPivot('quantity_taken', 'quantity_returned')
            ->withTimestamps();
    }
}

