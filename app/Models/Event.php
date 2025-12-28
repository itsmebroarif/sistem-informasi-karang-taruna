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
        'event_date' => 'date',
    ];

    public function isActive()
    {
        return $this->status === 'active';
    }


    public function items()
    {
        return $this->belongsToMany(Item::class, 'event_items')
            ->withPivot('id', 'quantity_taken', 'quantity_returned')
            ->withTimestamps();
    }
}
