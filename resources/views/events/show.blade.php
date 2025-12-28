@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3>Detail Event: {{ $event->name }}</h3>

    <div class="card shadow mb-3">
        <div class="card-body">
            <p><strong>Tanggal:</strong> {{ $event->event_date->format('d M Y') }}</p>
            <p><strong>Waktu:</strong> {{ $event->event_time }}</p>
            <p><strong>Status:</strong> 
                <span class="badge bg-{{ $event->status=='upcoming' ? 'primary' : ($event->status=='ongoing' ? 'success' : 'secondary') }}">
                    {{ ucfirst($event->status) }}
                </span>
            </p>
            <p><strong>Deskripsi:</strong> {{ $event->description ?? '-' }}</p>
            <p><strong>Link:</strong> 
                @if($event->event_link)
                    <a href="{{ $event->event_link }}" target="_blank">{{ $event->event_link }}</a>
                @else
                    -
                @endif
            </p>

            @if($event->items->count() > 0)
                <h5 class="mt-3">Barang Terkait:</h5>
                <ul>
                    @foreach($event->items as $item)
                        <li>{{ $item->name }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <a href="{{ route('events.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
</div>
@endsection
