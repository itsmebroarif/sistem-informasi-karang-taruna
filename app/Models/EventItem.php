<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventItem extends Model
{
    protected $fillable = [
        'event_id',
        'item_id',
        'quantity_taken',
        'quantity_returned',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}

