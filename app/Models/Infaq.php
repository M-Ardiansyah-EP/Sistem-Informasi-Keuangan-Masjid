<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infaq extends Model
{
    use HasFactory;

    protected $table = 'infaqs';

    protected $fillable = [
        'tanggal',
        'keterangan',
        'jumlah',
    ];
}
