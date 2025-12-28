<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Member; // <- ini yang kurang

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::with('members')->get();
        return view('teams.index', compact('teams'));
    }

    public function create()
    {
        return view('teams.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
        ]);

        Team::create($validated);

        return redirect()->route('teams.index')->with('success', 'Tim dibuat');
    }

    public function show(Team $team)
    {
        $members = Member::all();
        return view('teams.show', compact('team', 'members'));
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return back()->with('success', 'Tim dihapus');
    }
}
