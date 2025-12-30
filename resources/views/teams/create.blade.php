@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <h3>Buat Tim Baru</h3>

    <form action="{{ route('teams.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Tim</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <button class="btn btn-primary"><i class="bi bi-save me-1"></i> Simpan</button>
        <a href="{{ route('teams.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
