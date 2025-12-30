@extends('layouts.app')
<style>
    /* PERSONA 3 RELOAD – KARANG TARUNA */

.p3-wrapper {
    min-height: 100vh;
    padding: 3rem;
    background: linear-gradient(160deg, #eaf4ff, #ffffff);
    font-family: 'Inter', sans-serif;
}

/* HEADER */
.p3-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 3rem;
}

.p3-title {
    font-size: 3rem;
    font-weight: 800;
    color: #0d3b66;
}

.p3-subtitle {
    color: #5f8fb3;
}

.p3-clock {
    background: rgba(255,255,255,.7);
    backdrop-filter: blur(12px);
    padding: 1rem 1.5rem;
    border-radius: 16px;
    text-align: right;
    font-weight: 700;
    color: #0d3b66;
}

.p3-clock small {
    display: block;
    font-weight: 400;
    color: #7aa7c7;
}

/* MAIN GRID */
.p3-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px,1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.p3-card {
    background: rgba(255,255,255,.75);
    backdrop-filter: blur(14px);
    border-radius: 28px;
    padding: 2.5rem 2rem;
    text-decoration: none;
    color: #0d3b66;
    display: flex;
    flex-direction: column;
    gap: 1rem;
    transition: all .4s ease;
    box-shadow: 0 20px 40px rgba(13,59,102,.12);
}

.p3-card i {
    font-size: 2.5rem;
}

.p3-card span {
    font-size: 1.2rem;
    font-weight: 700;
}

.p3-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 30px 60px rgba(13,59,102,.2);
}

/* SECTION */
.p3-section h5 {
    font-weight: 700;
    color: #0d3b66;
    margin-bottom: 1.5rem;
}

.p3-subgrid {
    display: grid;
    grid-template-columns: repeat(auto-fit,minmax(260px,1fr));
    gap: 1.5rem;
}

.p3-subcard {
    background: #0d3b66;
    color: #fff;
    padding: 1.8rem;
    border-radius: 20px;
    text-decoration: none;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: .4s;
}

.p3-subcard i {
    font-size: 2rem;
    opacity: .9;
}

.p3-subcard small {
    color: #b9d6ee;
}

.p3-subcard:hover {
    background: #125a9c;
    transform: translateX(10px);
}

</style>
@section('content')
<div class="p3-wrapper">

    {{-- HEADER --}}
    <div class="p3-header">
        <div>
            <h1 class="p3-title">Dashboard</h1>
            <p class="p3-subtitle">Sistem Internal Karang Taruna</p>
        </div>

        <div class="p3-clock">
            {{ now()->format('H:i') }}
            <small>{{ now()->format('l, d M Y') }}</small>
        </div>
    </div>

    {{-- MAIN MENU --}}
    <div class="p3-grid">

        <a href="{{ route('items.index') }}" class="p3-card">
            <i class="bi bi-box-seam"></i>
            <span>Barang</span>
        </a>

        <a href="{{ route('members.index') }}" class="p3-card">
            <i class="bi bi-people"></i>
            <span>Anggota</span>
        </a>

        <a href="{{ route('teams.index') }}" class="p3-card">
            <i class="bi bi-diagram-3"></i>
            <span>Tim</span>
        </a>

        <a href="{{ route('events.index') }}" class="p3-card">
            <i class="bi bi-calendar-event"></i>
            <span>Event</span>
        </a>

    </div>

    {{-- SECONDARY --}}
    <div class="p3-section">
        <h5>Administrasi</h5>

        <div class="p3-subgrid">
            <a href="{{ route('rundown.index') }}" class="p3-subcard">
                <div>
                    <strong>Rundown</strong>
                    <small>Agenda acara</small>
                </div>
                <i class="bi bi-list-check"></i>
            </a>

            <a href="{{ route('kas.index') }}" class="p3-subcard">
                <div>
                    <strong>Keuangan</strong>
                    <small>Kas & transaksi</small>
                </div>
                <i class="bi bi-cash-stack"></i>
            </a>

            <a href="{{ route('invoice.index') }}" class="p3-subcard">
                <div>
                    <strong>Invoice</strong>
                    <small>Dokumen resmi</small>
                </div>
                <i class="bi bi-receipt"></i>
            </a>
        </div>
    </div>

</div>
@endsection
