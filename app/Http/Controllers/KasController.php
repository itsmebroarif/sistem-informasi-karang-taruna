<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\StreamedResponse;

class KasController extends Controller
{
    public function index()
{
    $totalMasuk = Kas::where('jenis', 'masuk')->sum('jumlah');
    $totalKeluar = Kas::where('jenis', 'keluar')->sum('jumlah');

    return view('kas.index', [
        'totalMasuk' => $totalMasuk,
        'totalKeluar' => $totalKeluar,
        'saldo' => $totalMasuk - $totalKeluar,
        'data' => Kas::orderBy('tanggal', 'desc')->get()
    ]);
}


public function store(Request $request)
{
    $request->validate([
        'tanggal' => 'required|date',
        'jenis' => 'required|in:masuk,keluar',
        'sumber' => 'required|string|max:100',
        'jumlah' => 'required|numeric|min:1',
        'keterangan' => 'nullable|string'
    ]);

    Kas::create([
        'tanggal' => $request->tanggal,
        'jenis' => $request->jenis,
        'sumber' => $request->sumber,
        'jumlah' => $request->jumlah,
        'keterangan' => $request->keterangan,
        'created_by' => Auth::id()
    ]);

    return redirect()
        ->route('kas.index')
        ->with('success', 'Transaksi kas berhasil disimpan');
}

public function destroy($id)
{
    Kas::findOrFail($id)->delete();

    return redirect()
        ->route('kas.index')
        ->with('success', 'Data kas berhasil dihapus');
}


    public function exportCsv()
    {
        $response = new StreamedResponse(function () {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, [
                'Tanggal',
                'Jenis',
                'Sumber',
                'Jumlah',
                'Keterangan'
            ]);

            Kas::orderBy('tanggal', 'asc')->chunk(100, function ($rows) use ($handle) {
                foreach ($rows as $row) {
                    fputcsv($handle, [
                        $row->tanggal->format('Y-m-d'),
                        strtoupper($row->jenis),
                        $row->sumber,
                        $row->jumlah,
                        $row->keterangan
                    ]);
                }
            });

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="kas_karang_taruna.csv"');

        return $response;
    }
}
