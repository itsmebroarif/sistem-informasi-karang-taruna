<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index(){
        $items = Item::all();
        return view('items.index', compact('items'));
    }
    public function create(){
        return view('items.create');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string',
            'total_quantity' => 'required|integer|min:0',
            'damaged_quantity' => 'nullable|integer|min:0',
            'replacement_link' => 'nullable|url',
            'description' => 'nullable|string',
        ]);
        Item::create($validated);
        return redirect()->route('items.index')->with('success', 'Barang ditambahkan');
    }
    public function edit(Item $item){
        return view('items.edit', compact('item'));
    }
    public function update(Request $request, Item $item){
        $validated = $request->validate([
            'name' => 'required|string',
            'total_quantity' => 'required|integer|min:0',
            'damaged_quantity' => 'nullable|integer|min:0',
            'replacement_link' => 'nullable|url',
            'description' => 'nullable|string',
        ]);
        $item->update($validated);
        return redirect()->route('items.index')->with('success', 'Barang diperbarui');
    }
    public function destroy(Item $item){
        $item->delete();
        return back()->with('success', 'Barang dihapus');
    }
}

