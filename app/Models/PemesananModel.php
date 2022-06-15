<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PemesananModel extends Model
{
    public function allData()
    {
        return DB::table('pemesanan')->get();
    }

    public function addData($data)
    {
        DB::table('pemesanan')->insert($data);
    }

    // public function editData($id_pemesanan,$data)
    // {
    //     DB::table('pemesanan')
    //     ->where('id_pemesanan', $id_pemesanan)
    //     ->update($data);
    // }

    // public function detailData($id_pemesanan)
    // {
    //     return DB::table('pemesanan')->where('id_pemesanan', $id_pemesanan)->first();
    // }

    // public function deleteData($id_pemesanan)
    // {
    //     DB::table('pemesanan')
    //     ->where('id_pemesanan', $id_pemesanan)
    //     ->delete();
    // }
}

