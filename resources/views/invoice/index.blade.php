@extends('layouts.app')

@section('title', 'Invoice')

@section('content')
<div class="container-fluid mt-3">
    <div class="mb-3">
        <h1>Invoice System</h1>
        <p class="lead">Tolong Gunakan sistem ini untuk report pengeluaran dengan jujur</p>
        <a href="{{ route('invoice.create') }}" class="btn btn-primary">
            + Buat Invoice
        </a>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No Invoice</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoices as $inv)
                    <tr>
                        <td>{{ $inv->invoice_number }}</td>
                        <td>{{ $inv->customer_name }}</td>
                        <td>{{ $inv->invoice_date->format('d-m-Y') }}</td>
                        <td>Rp {{ number_format($inv->total,0,',','.') }}</td>
                        <td>
                            <a href="{{ route('invoice.print', $inv->id) }}" target="_blank"
                               class="btn btn-sm btn-success">
                                Cetak
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
