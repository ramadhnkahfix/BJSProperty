<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenerimaan extends Model
{
    use HasFactory;
    protected $table = 'detail_penerimaans';
    protected $fillable = [
        'penerimaan_id', 'barang_id', 'quantity', 'harga'
    ];
}
