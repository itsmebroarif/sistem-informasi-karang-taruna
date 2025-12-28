@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3>Edit Anggota</h3>

    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $member->name) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Role</label>
            <input type="text" name="role" class="form-control" value="{{ old('role', $member->role) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $member->phone_number) }}" required>
        </div>
        <button class="btn btn-primary"><i class="bi bi-save me-1"></i> Update</button>
        <a href="{{ route('members.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
