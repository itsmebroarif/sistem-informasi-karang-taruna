@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3>Edit Event</h3>

    <form action="{{ route('events.update', $event) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama Event</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $event->name) }}" required>
        </div>

        <div class="mb-3 row">
            <div class="col">
                <label class="form-label">Tanggal</label>
                <input type="date" name="event_date" class="form-control" value="{{ old('event_date', $event->event_date->format('Y-m-d')) }}" required>
            </div>
            <div class="col">
                <label class="form-label">Waktu</label>
                <input type="time" name="event_time" class="form-control" value="{{ old('event_time', $event->event_time) }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control">{{ old('description', $event->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Link Event (opsional)</label>
            <input type="url" name="event_link" class="form-control" value="{{ old('event_link', $event->event_link) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="upcoming" {{ old('status', $event->status)=='upcoming' ? 'selected' : '' }}>Upcoming</option>
                <option value="ongoing" {{ old('status', $event->status)=='ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option value="finished" {{ old('status', $event->status)=='finished' ? 'selected' : '' }}>Finished</option>
            </select>
        </div>

        <button class="btn btn-primary"><i class="bi bi-save me-1"></i> Update</button>
        <a href="{{ route('events.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
