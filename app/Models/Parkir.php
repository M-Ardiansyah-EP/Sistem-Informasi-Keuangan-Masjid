<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    use HasFactory;

    protected $table = 'parkirs';

    protected $fillable = [
        'nomor_kendaraan',
        'jenis_kendaraan',
        'nama',
        'waktu_masuk',
        'waktu_keluar',
        'biaya',
    ];
}
