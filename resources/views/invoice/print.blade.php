<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        @page {
            size: A4 landscape;
            margin: 25px;
        }

        body {
            font-family: "DejaVu Sans", Arial, Helvetica, sans-serif;
            font-size: 12px;
            color: #000;
        }

        /* HEADER */
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 3px solid #000;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            letter-spacing: 3px;
            font-weight: bold;
        }

        .header small {
            display: block;
            margin-top: 6px;
            font-size: 12px;
        }

        /* META INFO */
        .invoice-meta {
            margin-bottom: 20px;
            line-height: 1.7;
        }

        .invoice-meta strong {
            display: inline-block;
            width: 160px;
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px 10px;
        }

        th {
            background: #f2f2f2;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        td {
            vertical-align: top;
        }

        .text-right {
            text-align: right;
        }

        /* TOTAL */
        .total-row td {
            font-size: 14px;
            font-weight: bold;
        }

        /* FOOTER */
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 11px;
            color: #555;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>INVOICE PAYMENT</h1>
        <small>Invoice dibuat oleh {{ auth()->user()->name }}</small>
    </div>

    <div class="invoice-meta">
        <strong>Invoice No</strong>: {{ $invoice->invoice_number }} <br>
        <strong>Nama Customer</strong>: {{ $invoice->customer_name }} <br>
        <strong>Tanggal Invoice</strong>: {{ $invoice->invoice_date->format('d-m-Y') }} <br>
        <strong>Metode Pembayaran</strong>: {{ $invoice->payment_method }}
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 20%;">Produk</th>
                <th style="width: 30%;">Deskripsi</th>
                <th style="width: 10%;">Qty</th>
                <th style="width: 20%;">Harga</th>
                <th style="width: 20%;">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoice->items as $item)
            <tr>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->description }}</td>
                <td class="text-right">{{ $item->quantity }}</td>
                <td class="text-right">
                    Rp {{ number_format($item->price,0,',','.') }}
                </td>
                <td class="text-right">
                    Rp {{ number_format($item->subtotal,0,',','.') }}
                </td>
            </tr>
            @endforeach

            <tr class="total-row">
                <td colspan="4" class="text-right">TOTAL</td>
                <td class="text-right">
                    Rp {{ number_format($invoice->total,0,',','.') }}
                </td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        Terima kasih atas kepercayaan Anda.<br>
        Invoice ini dibuat secara otomatis oleh sistem.
    </div>

    <script>
        window.print();
    </script>

</body>
</html>
