<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'event_date',
        'event_time',
        'description',
        'event_link',
        'status',
    ];

    protected $casts = [
        'event_date' => 'datetime', // otomatis jadi Carbon
    ];

    public function items()
    {
        return $this->belongsToMany(Item::class, 'event_items')
            ->withPivot('quantity_taken', 'quantity_returned')
            ->withTimestamps();
    }
}

