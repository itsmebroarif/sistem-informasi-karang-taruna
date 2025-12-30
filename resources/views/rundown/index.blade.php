@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3 mt-2 py-4">
        <h4 class="fw-bold display-5">Rundown Acara</h4>
        <div>
            <a href="{{ route('rundown.print') }}" target="_blank" class="btn btn-secondary">
                <i class="bi bi-printer"></i> Cetak PDF
            </a>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                <i class="bi bi-plus"></i> Tambah
            </button>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Kegiatan</th>
                <th>PJ</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
            <tr>
                <td>{{ $row->tanggal }}</td>
                <td>{{ $row->waktu_mulai }} - {{ $row->waktu_selesai }}</td>
                <td>{{ $row->kegiatan }}</td>
                <td>{{ $row->penanggung_jawab }}</td>
                <td>
                    <form action="{{ route('rundown.destroy', $row->id) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

{{-- MODAL TAMBAH --}}
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('rundown.store') }}" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5>Tambah Rundown</h5>
            </div>
            <div class="modal-body">
                <input type="date" name="tanggal" class="form-control mb-2" required>
                <input type="time" name="waktu_mulai" class="form-control mb-2" required>
                <input type="time" name="waktu_selesai" class="form-control mb-2">
                <input type="text" name="kegiatan" class="form-control mb-2" placeholder="Nama kegiatan" required>
                <input type="text" name="penanggung_jawab" class="form-control mb-2" placeholder="Penanggung jawab">
                <textarea name="keterangan" class="form-control" placeholder="Keterangan"></textarea>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
