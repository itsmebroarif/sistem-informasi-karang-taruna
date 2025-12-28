<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;        // ⬅️ INI YANG KURANG
use App\Models\Item;
use App\Models\EventItem;

class EventItemController extends Controller
{
    public function store(Request $request, Event $event)
    {
        $validated = $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity_taken' => 'required|integer|min:1',
        ]);

        $item = Item::findOrFail($validated['item_id']);

        $used = EventItem::where('item_id', $item->id)
            ->sum(\DB::raw('quantity_taken - quantity_returned'));

        $available = $item->total_quantity - $used;

        if ($validated['quantity_taken'] > $available) {
            return back()->withErrors('Stok barang tidak cukup');
        }

        EventItem::create([
            'event_id' => $event->id,
            'item_id' => $item->id,
            'quantity_taken' => $validated['quantity_taken'],
        ]);

        return back()->with('success', 'Barang berhasil dipinjam');
    }

    public function update(Request $request, EventItem $eventItem)
    {
        $maxReturn = $eventItem->quantity_taken - $eventItem->quantity_returned;

        $validated = $request->validate([
            'quantity_returned' => [
                'required',
                'integer',
                'min:1',
                'max:' . $maxReturn,
            ],
        ]);

        // tambah pengembalian (bukan replace)
        $eventItem->increment('quantity_returned', $validated['quantity_returned']);

        return back()->with('success', 'Barang berhasil dikembalikan');
    }   
}
