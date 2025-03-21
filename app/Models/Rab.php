<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rab extends Model
{
    use HasFactory;

    protected $table = 'rabs';
    
    protected $fillable = [
        'nama',
        'periode',
        'kategori',
        'jenis',
        'keterangan',
        'jumlah',
        'disetujui'
    ];
}
