<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pemesanan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'pemesanan';
    protected $fillable = [
        'kode_pemesanan', 'tgl-pemesanan', 'total_harga', 'status'
    ];
}
