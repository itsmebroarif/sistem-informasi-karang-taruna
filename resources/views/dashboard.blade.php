@extends('layouts.app')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-sm-6">
                <h3 class="mb-0">Halaman Dashboard</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </div>
        </div>

        <!-- Shortcut Quick Links -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <a href="{{ route('items.index') }}" class="text-decoration-none">
                    <div class="card text-center shadow h-100">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-box-seam display-4 text-primary mb-2"></i>
                            <h5 class="card-title text-primary">Barang</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{ route('members.index') }}" class="text-decoration-none">
                    <div class="card text-center shadow h-100">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-people display-4 text-success mb-2"></i>
                            <h5 class="card-title text-success">Anggota</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{ route('teams.index') }}" class="text-decoration-none">
                    <div class="card text-center shadow h-100">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-diagram-3 display-4 text-warning mb-2"></i>
                            <h5 class="card-title text-warning">Tim</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{ route('events.index') }}" class="text-decoration-none">
                    <div class="card text-center shadow h-100">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-calendar-event display-4 text-info mb-2"></i>
                            <h5 class="card-title text-info">Event</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        {{-- ================= ADMINISTRASI ================= --}}
<div class="row">
    <div class="col-12 mb-2">
        <h5 class="fw-semibold text-muted">Administrasi (Online Mode)</h5>
    </div>

    {{-- TODO LIST --}}
    <div class="col-md-4 mb-3">
        <a href="https://freelancertoolkit-livid.vercel.app/todo"
           target="_blank"
           class="text-decoration-none">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body text-center">
                    <i class="bi bi-check2-square fs-1 text-secondary"></i>
                    <h6 class="mt-2 mb-0">Todo List</h6>
                </div>
            </div>
        </a>
    </div>

    {{-- FINANCE TRACKER --}}
    <div class="col-md-4 mb-3">
        <a href="https://freelancertoolkit-livid.vercel.app/finance"
           target="_blank"
           class="text-decoration-none">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body text-center">
                    <i class="bi bi-cash-coin fs-1 text-success"></i>
                    <h6 class="mt-2 mb-0">Finance Tracker</h6>
                </div>
            </div>
        </a>
    </div>

    {{-- MAIL BUILDER --}}
    <div class="col-md-4 mb-3">
        <a href="https://freelancertoolkit-livid.vercel.app/mail"
           target="_blank"
           class="text-decoration-none">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body text-center">
                    <i class="bi bi-envelope-paper fs-1 text-primary"></i>
                    <h6 class="mt-2 mb-0">Mail Builder</h6>
                </div>
            </div>
        </a>
    </div>
</div>
    </div>
</div>
@endsection
