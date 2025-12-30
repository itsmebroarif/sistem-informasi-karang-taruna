<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_number',
        'invoice_date',
        'customer_name',
        'payment_method',
        'total'
    ];

    protected $casts = [
        'invoice_date' => 'datetime',
    ];
        

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}

