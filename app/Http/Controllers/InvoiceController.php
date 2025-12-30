<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::orderBy('created_at', 'desc')->get();
        return view('invoice.index', compact('invoices'));
    }

    public function create()
    {
        return view('invoice.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'payment_method' => 'required',
            'items.*.product_name' => 'required',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:1',
        ]);

        $invoice = Invoice::create([
            'invoice_number' => 'INV-' . now()->format('Ymd') . '-' . Str::upper(Str::random(4)),
            'invoice_date' => now(),
            'customer_name' => $request->customer_name,
            'payment_method' => $request->payment_method,
            'total' => 0
        ]);

        $total = 0;

        foreach ($request->items as $item) {
            $subtotal = $item['quantity'] * $item['price'];
            $total += $subtotal;

            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'product_name' => $item['product_name'],
                'description' => $item['description'] ?? null,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'subtotal' => $subtotal
            ]);
        }

        $invoice->update(['total' => $total]);

        return redirect()->route('invoice.print', $invoice->id);
    }

    public function print($id)
    {
        $invoice = Invoice::with('items')->findOrFail($id);

        $pdf = Pdf::loadView('invoice.print', compact('invoice'))
            ->setPaper('a4');

        return $pdf->stream("invoice-{$invoice->invoice_number}.pdf");
    }
}
