@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Detail Tim: {{ $team->name }}</h3>
        <a href="{{ route('teams.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="mb-3">Anggota Tim</h5>

            @if($team->members->count() > 0)
                <ul class="list-group mb-3">
                    @foreach($team->members as $member)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $member->name }} ({{ $member->role }})
                            <form action="{{ route('team-members.destroy', $member->pivot->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin mengeluarkan anggota?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash me-1"></i> Keluarkan</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">Belum ada anggota di tim ini.</p>
            @endif

            <form action="{{ route('team-members.store', $team->id) }}" method="POST" class="row g-2 align-items-center">
                @csrf
                <div class="col-auto">
                    <select name="member_id" class="form-select" required>
                        <option value="">-- Pilih Anggota --</option>
                        @foreach($members as $member)
                            @if(!$team->members->contains($member))
                                <option value="{{ $member->id }}">{{ $member->name }} ({{ $member->role }})</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary"><i class="bi bi-plus me-1"></i> Tambah Anggota</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
