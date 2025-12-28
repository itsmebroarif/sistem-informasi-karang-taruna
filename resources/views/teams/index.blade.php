@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Tim</h3>
        <a href="{{ route('teams.create') }}" class="btn btn-primary">
            <i class="bi bi-plus me-1"></i> Tambah Tim
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama Tim</th>
                        <th>Jumlah Anggota</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teams as $team)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->members->count() }}</td>
                            <td>
                                <a href="{{ route('teams.show', $team->id) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye me-1"></i> Detail
                                </a>
                                <form action="{{ route('teams.destroy', $team->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus tim ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash me-1"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada tim.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
