@extends('layouts.app')

@section('title', 'Uang Kas')

@section('content')
<div class="container-fluid mt-3">

    {{-- SUMMARY --}}
    <div class="row g-3 mb-4">

        {{-- TOTAL MASUK --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-success bg-gradient text-white">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3 fs-1 opacity-75">
                        <i class="bi bi-arrow-down-circle"></i>
                    </div>
                    <div>
                        <small class="text-uppercase">Total Masuk</small>
                        <h4 class="fw-bold mb-0">
                            Rp {{ number_format($totalMasuk, 0, ',', '.') }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    
        {{-- TOTAL KELUAR --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-danger bg-gradient text-white">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3 fs-1 opacity-75">
                        <i class="bi bi-arrow-up-circle"></i>
                    </div>
                    <div>
                        <small class="text-uppercase">Total Keluar</small>
                        <h4 class="fw-bold mb-0">
                            Rp {{ number_format($totalKeluar, 0, ',', '.') }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    
        {{-- SALDO --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-primary bg-gradient text-white">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3 fs-1 opacity-75">
                        <i class="bi bi-wallet2"></i>
                    </div>
                    <div>
                        <small class="text-uppercase">Saldo Akhir</small>
                        <h4 class="fw-bold mb-0">
                            Rp {{ number_format($saldo, 0, ',', '.') }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
    

    {{-- ACTION --}}
    <div class="mb-3 d-flex justify-content-between">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambah">
            + Tambah Kas
        </button>

        <a href="{{ route('kas.export.csv') }}" class="btn btn-outline-primary">
            Export CSV
        </a>
    </div>

    {{-- TABLE --}}
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Jenis</th>
                        <th>Sumber</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                    <tr>
                        <td>{{ $row->tanggal->format('d-m-Y') }}</td>
                        <td>
                            <span class="badge bg-{{ $row->jenis == 'masuk' ? 'success' : 'danger' }}">
                                {{ strtoupper($row->jenis) }}
                            </span>
                        </td>
                        <td>{{ $row->sumber }}</td>
                        <td>Rp {{ number_format($row->jumlah, 0, ',', '.') }}</td>
                        <td>{{ $row->keterangan }}</td>
                        <td>
                            <form action="{{ route('kas.destroy', $row->id) }}" method="POST"
                                onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('kas.modal-tambah')

@endsection
