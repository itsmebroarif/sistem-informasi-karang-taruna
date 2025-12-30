@extends('layouts.app')

@section('title', 'Buat Invoice')

@section('content')
<div class="container-fluid mt-4">
    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="mb-0">Form Invoice</h5>
        </div>

        <form action="{{ route('invoice.store') }}" method="POST">
            @csrf

            <div class="card-body">

                {{-- INFO UTAMA --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Nama Penerima</label>
                        <input type="text" name="customer_name" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label>Metode Pembayaran</label>
                        <input type="text" name="payment_method" class="form-control" required>
                    </div>
                </div>

                <hr>

                {{-- ITEM --}}
                <h6>Detail Item</h6>

                <table class="table table-bordered" id="itemsTable">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Deskripsi</th>
                            <th width="80">Qty</th>
                            <th width="150">Harga</th>
                            <th width="50"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" name="items[0][product_name]" class="form-control" required>
                            </td>
                            <td>
                                <input type="text" name="items[0][description]" class="form-control">
                            </td>
                            <td>
                                <input type="number" name="items[0][quantity]" class="form-control" required>
                            </td>
                            <td>
                                <input type="number" name="items[0][price]" class="form-control" required>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm remove-row">✕</button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <button type="button" class="btn btn-outline-primary btn-sm" id="addRow">
                    + Tambah Item
                </button>

            </div>

            <div class="card-footer text-end">
                <button class="btn btn-success">
                    Simpan & Cetak Invoice
                </button>
            </div>
        </form>
    </div>
</div>

{{-- JS sederhana --}}
<script>
let index = 1;

document.getElementById('addRow').addEventListener('click', function () {
    const table = document.querySelector('#itemsTable tbody');
    table.insertAdjacentHTML('beforeend', `
        <tr>
            <td><input type="text" name="items[${index}][product_name]" class="form-control" required></td>
            <td><input type="text" name="items[${index}][description]" class="form-control"></td>
            <td><input type="number" name="items[${index}][quantity]" class="form-control" required></td>
            <td><input type="number" name="items[${index}][price]" class="form-control" required></td>
            <td><button type="button" class="btn btn-danger btn-sm remove-row">✕</button></td>
        </tr>
    `);
    index++;
});

document.addEventListener('click', function(e){
    if(e.target.classList.contains('remove-row')){
        e.target.closest('tr').remove();
    }
});
</script>
@endsection
