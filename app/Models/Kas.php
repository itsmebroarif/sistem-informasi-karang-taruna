<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
    use HasFactory;

    protected $table = 'kas';

    protected $fillable = [
        'tanggal',
        'jenis',
        'sumber',
        'keterangan',
        'jumlah',
        'created_by'
    ];

    protected $casts = [
        'tanggal' => 'date'
    ];
}

