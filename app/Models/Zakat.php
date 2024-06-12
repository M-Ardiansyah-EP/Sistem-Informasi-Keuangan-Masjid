<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zakat extends Model
{
    use HasFactory;

    protected $table = 'zakats';

    protected $fillable = [
        'tanggal',
        'jenis',
        'nama',
        'alamat',
        'keterangan',
        'jumlah',
    ];
}
