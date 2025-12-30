<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rundown extends Model
{
    protected $fillable = [
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
        'kegiatan',
        'penanggung_jawab',
        'keterangan'
    ];
}

