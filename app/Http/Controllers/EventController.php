<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Item;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('event_date')->get();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'event_date' => 'required|date',
            'event_time' => 'required',
            'description' => 'nullable|string',
            'event_link' => 'nullable|url',
            'status' => 'required|in:upcoming,ongoing,finished',
        ]);

        Event::create($validated);

        return redirect()->route('events.index')
            ->with('success', 'Event berhasil dibuat');
    }

    public function show(Event $event)
    {
        // load barang yang sudah dipinjam event ini
        $event->load('items');

        // ambil semua item untuk form peminjaman
        $items = Item::with('eventItems')->get();

        return view('events.show', compact('event', 'items'));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'event_date' => 'required|date',
            'event_time' => 'required',
            'description' => 'nullable|string',
            'event_link' => 'nullable|url',
            'status' => 'required|in:upcoming,ongoing,finished',
        ]);

        $event->update($validated);

        return redirect()->route('events.index')
            ->with('success', 'Event diperbarui');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return back()->with('success', 'Event dihapus');
    }
}
