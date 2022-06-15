<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PembayaranModel extends Model
{
    public function allData()
    {
        return DB::table('kpr')->get();
    }

    public function detailData($id_kpr)
    {
        return DB::table('kpr')->where('id_kpr', $id_kpr)->first();
    }

    public function addData($data)
    {
        DB::table('kpr')->insert($data);
    }
}
