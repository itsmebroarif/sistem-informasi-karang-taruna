<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function index(){
        $members = Member::all();
        return view('members.index', compact('members'));
    }
    public function create(){
        return view('members.create');
    }
    public function show(){
        return view('members.show');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string',
            'role' => 'required|string',
            'phone_number' => 'required|string',
        ]);
        Member::create($validated);
        return redirect()->route('members.index')->with('success', 'Anggota ditambahkan');
    }
    public function edit(Member $member){
        return view('members.edit', compact('member'));
    }
    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'role' => 'required|string',
            'phone_number' => 'required|string',
        ]);
        $member->update($validated);
        return redirect()->route('members.index')->with('success', 'Anggota diperbarui');
    }

    public function destroy(Member $member){
        $member->delete();
        return back()->with('success', 'Anggota dihapus');
    }
}

