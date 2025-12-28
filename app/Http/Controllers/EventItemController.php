<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventItem;

class EventItemController extends Controller
{
    public function store(Request $request, Event $event)
    {
        $validated = $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity_taken' => 'required|integer|min:1',
        ]);

        $event->items()->attach($validated['item_id'], [
            'quantity_taken' => $validated['quantity_taken'],
        ]);

        return back()->with('success', 'Barang berhasil diambil untuk event');
    }

    public function update(Request $request, EventItem $eventItem)
    {
        $validated = $request->validate([
            'quantity_returned' => 'required|integer|min:0',
        ]);

        $eventItem->update($validated);

        return back()->with('success', 'Pengembalian barang diperbarui');
    }
}

