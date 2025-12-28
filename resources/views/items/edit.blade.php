@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3>Edit Barang</h3>

    <form action="{{ route('items.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama Barang</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $item->name) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Total Quantity</label>
            <input type="number" name="total_quantity" class="form-control" value="{{ old('total_quantity', $item->total_quantity) }}" required min="0">
        </div>
        <div class="mb-3">
            <label class="form-label">Damaged Quantity</label>
            <input type="number" name="damaged_quantity" class="form-control" value="{{ old('damaged_quantity', $item->damaged_quantity) }}" min="0">
        </div>
        <div class="mb-3">
            <label class="form-label">Replacement Link</label>
            <input type="url" name="replacement_link" class="form-control" value="{{ old('replacement_link', $item->replacement_link) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea name="description" class="form-control">{{ old('description', $item->description) }}</textarea>
        </div>
        <button class="btn btn-primary"><i class="bi bi-save me-1"></i> Update</button>
        <a href="{{ route('items.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
