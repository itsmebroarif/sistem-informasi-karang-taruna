@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3>Buat Event Baru</h3>

    <form action="{{ route('events.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Event</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3 row">
            <div class="col">
                <label class="form-label">Tanggal</label>
                <input type="date" name="event_date" class="form-control" value="{{ old('event_date') }}" required>
            </div>
            <div class="col">
                <label class="form-label">Waktu</label>
                <input type="time" name="event_time" class="form-control" value="{{ old('event_time') }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Link Event (opsional)</label>
            <input type="url" name="event_link" class="form-control" value="{{ old('event_link') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="upcoming" {{ old('status')=='upcoming' ? 'selected' : '' }}>Upcoming</option>
                <option value="ongoing" {{ old('status')=='ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option value="finished" {{ old('status')=='finished' ? 'selected' : '' }}>Finished</option>
            </select>
        </div>

        <button class="btn btn-primary"><i class="bi bi-save me-1"></i> Simpan</button>
        <a href="{{ route('events.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
