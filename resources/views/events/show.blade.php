@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-2">
        <h3>Detail Event: {{ $event->name }}</h3>

        <div class="card shadow mb-3">
            <div class="card-body">
                <p><strong>Tanggal:</strong> {{ $event->event_date->format('d M Y') }}</p>
                <p><strong>Waktu:</strong> {{ $event->event_time }}</p>
                <p><strong>Status:</strong>
                    <span
                        class="badge bg-{{ $event->status == 'upcoming' ? 'primary' : ($event->status == 'ongoing' ? 'success' : 'secondary') }}">
                        {{ ucfirst($event->status) }}
                    </span>
                </p>
                <p><strong>Deskripsi:</strong> {{ $event->description ?? '-' }}</p>

                @if ($event->event_link)
                    <p>
                        <strong>Link:</strong>
                        <a href="{{ $event->event_link }}" target="_blank">
                            {{ $event->event_link }}
                        </a>
                    </p>
                @endif
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col">
                    {{-- ===== DAFTAR BARANG DI EVENT ===== --}}
                    <div class="card shadow mb-3">
                        <div class="card-header">
                            <strong>Barang Dipinjam</strong>
                        </div>
                        <div class="card-body p-0">
                            @if ($event->items->count())
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>Barang</th>
                                            <th>Diambil</th>
                                            <th>Dikembalikan</th>
                                            <th>Sisa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($event->items as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->pivot->quantity_taken }}</td>
                                                <td>{{ $item->pivot->quantity_returned }}</td>
                                                <td>
                                                    {{ $item->pivot->quantity_taken - $item->pivot->quantity_returned }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="p-3 text-muted">Belum ada barang dipinjam.</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col">
                    @if ($event->status !== 'completed' && $event->items->count())
                        <div class="card shadow mb-3">
                            <div class="card-header">
                                <strong>Kembalikan Barang</strong>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>Barang</th>
                                            <th>Sisa Dipinjam</th>
                                            <th>Jumlah Kembali</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($event->items as $item)
                                            @php
                                                $sisa = $item->pivot->quantity_taken - $item->pivot->quantity_returned;
                                            @endphp

                                            @if ($sisa > 0)
                                                <tr>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $sisa }}</td>
                                                    <td>
                                                        <form action="{{ route('event-items.update', $item->pivot->id) }}"
                                                            method="POST" class="d-flex gap-2">
                                                            @csrf
                                                            @method('PATCH')

                                                            <input type="number" name="quantity_returned"
                                                                class="form-control" min="1"
                                                                max="{{ $sisa }}" required>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-success btn-sm">
                                                            Kembalikan
                                                        </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- ===== FORM PINJAM BARANG ===== --}}
        @if ($event->status !== 'completed')
            <div class="card shadow mb-3">
                <div class="card-header">
                    <strong>Pinjam Barang</strong>
                </div>
                <div class="card-body">
                    <form action="{{ route('event-items.store', $event->id) }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <label>Barang</label>
                                <select name="item_id" class="form-control" required>
                                    @foreach ($items as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->available_stock <= 0 ? 'disabled' : '' }}>
                                            {{ $item->name }}
                                            (Sisa: {{ $item->available_stock }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label>Jumlah</label>
                                <input type="number" name="quantity_taken" class="form-control" min="1" required>
                            </div>

                            <div class="col-md-3 d-flex align-items-end">
                                <button class="btn btn-primary w-100">
                                    Pinjam
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif

        <a href="{{ route('events.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>
@endsection
