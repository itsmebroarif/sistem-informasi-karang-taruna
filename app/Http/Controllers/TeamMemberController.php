<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Member;
use App\Models\TeamMember;

class TeamMemberController extends Controller
{
    // Tambah anggota ke tim
    public function store(Request $request, Team $team)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
        ]);

        // Cek kalau anggota sudah ada
        if (!$team->members->contains($request->member_id)) {
            $team->members()->attach($request->member_id);
        }

        return back()->with('success', 'Anggota masuk tim');
    }

    // Hapus anggota dari tim
    public function destroy(TeamMember $teamMember)
    {
        $teamMember->delete();
        return back()->with('success', 'Anggota dikeluarkan dari tim');
    }

    // Reorder anggota
    public function reorder(Request $request)
    {
        foreach ($request->positions as $position => $id) {
            TeamMember::where('id', $id)->update(['position' => $position]);
        }

        return response()->json(['status' => 'ok']);
    }
}
