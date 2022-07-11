<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPemesanan extends Model
{
    use HasFactory;

    protected $table = 'detail_pemesanans';
    protected $fillable = [
        'pemesanan_id', 'barang_id', 'quantity', 'harga'
    ];
}
