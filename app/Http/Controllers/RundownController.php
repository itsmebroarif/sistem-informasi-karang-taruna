<?php

namespace App\Http\Controllers;

use App\Models\Rundown;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RundownController extends Controller
{
    public function index()
    {
        return view('rundown.index', [
            'data' => Rundown::orderBy('tanggal')
                ->orderBy('waktu_mulai')
                ->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'kegiatan' => 'required|string|max:255'
        ]);

        Rundown::create($request->all());

        return redirect()->back()->with('success', 'Rundown berhasil ditambahkan');
    }

    public function destroy($id)
    {
        Rundown::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Rundown dihapus');
    }

    public function print()
    {
        $data = Rundown::orderBy('tanggal')
            ->orderBy('waktu_mulai')
            ->get();

        $pdf = Pdf::loadView('rundown.print', compact('data'))
            ->setPaper('a4', 'portrait');

        return $pdf->stream('rundown-acara.pdf');
    }
}
