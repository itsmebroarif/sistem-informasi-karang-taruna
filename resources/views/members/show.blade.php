@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Detail Anggota</h3>
        <a href="{{ route('members.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">Nama</div>
                <div class="col-md-9">{{ $member->name }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">Role</div>
                <div class="col-md-9">{{ $member->role }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">Phone Number</div>
                <div class="col-md-9">{{ $member->phone_number }}</div>
            </div>
            <div class="mt-3">
                <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning me-2">
                    <i class="bi bi-pencil me-1"></i> Edit
                </a>
                <form action="{{ route('members.destroy', $member->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><i class="bi bi-trash me-1"></i> Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
