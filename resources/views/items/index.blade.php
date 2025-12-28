@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Barang</h3>
        <a href="{{ route('items.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i> Tambah Barang</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama Barang</th>
                        <th>Total Quantity</th>
                        <th>Damaged</th>
                        <th>Replacement Link</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->total_quantity }}</td>
                            <td>{{ $item->damaged_quantity ?? 0 }}</td>
                            <td>
                                @if($item->replacement_link)
                                    <a href="{{ $item->replacement_link }}" target="_blank" class="text-decoration-none">Link</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $item->description ?? '-' }}</td>
                            <td>
                                <a href="{{ route('items.edit', $item->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($items->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center">Belum ada data</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
