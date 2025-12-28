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
        'description'
    ];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_items')
            ->withPivot(['quantity_taken', 'quantity_returned'])
            ->withTimestamps();
    }

    public function eventItems()
    {
        return $this->hasMany(EventItem::class);
    }

    public function getUsedQuantityAttribute()
    {
        return $this->eventItems()
            ->sum(\DB::raw('quantity_taken - quantity_returned'));
    }

    public function getAvailableStockAttribute()
    {
        return $this->total_quantity - $this->used_quantity;
    }   
}
