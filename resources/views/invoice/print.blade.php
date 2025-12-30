<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: DejaVu Sans; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px; }
        th { background: #f4f4f4; }
        .text-right { text-align: right; }
    </style>
</head>
<body>

<div class="header">
    <h2>INVOICE</h2>
    <p>No: {{ $invoice->invoice_number }}</p>
</div>

<p>
    <strong>Nama:</strong> {{ $invoice->customer_name }} <br>
    <strong>Tanggal:</strong> {{ $invoice->invoice_date->format('d-m-Y') }} <br>
    <strong>Metode Pembayaran:</strong> {{ $invoice->payment_method }}
</p>

<table>
    <thead>
        <tr>
            <th>Produk</th>
            <th>Deskripsi</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($invoice->items as $item)
        <tr>
            <td>{{ $item->product_name }}</td>
            <td>{{ $item->description }}</td>
            <td class="text-right">{{ $item->quantity }}</td>
            <td class="text-right">Rp {{ number_format($item->price,0,',','.') }}</td>
            <td class="text-right">Rp {{ number_format($item->subtotal,0,',','.') }}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="4" class="text-right"><strong>Total</strong></td>
            <td class="text-right">
                <strong>Rp {{ number_format($invoice->total,0,',','.') }}</strong>
            </td>
        </tr>
    </tbody>
</table>

</body>
</html>
