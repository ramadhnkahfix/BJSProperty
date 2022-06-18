<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class PemesananController extends Controller
{
    //
    public function index()
    {
        $pemesanan = DB::table('pemesanan','suplier')->get();
        $data = array(
            'menu' => 'pemesanan',
            'submenu' => 'pemesanan',
            'pemesanan' => $pemesanan,
        );

        return view('pemesanan/pemesanan',$data); 
    }

    public function insertPemesanan()
    {
        $pemesanan = DB::table('pemesanan')->get();
        $data = array(
            'menu' => 'pemesanan',
            'submenu' => 'pemesanan',
            'pemesanan' => $pemesanan,
        );

        return view('pemesanan/addpemesanan',$data); 
    }


    public function tambahPemesanan(Request $post)
    {  
        DB::table('pemesanan')->insert([
            'tgl_pemesanan' => $post->tgl_pemesanan,
            'nama_barang' => $post->nama_barang,
            'jml_barang' => $post->jml_barang,
            'harga_barang' => $post->harga_barang,
        ]);

        return redirect('/pemesanan');
    }

    public function hapus($id_pemesanan)
    {
    	DB::table('pemesanan')->where('id_pemesanan',$id_pemesanan)->delete();
	    return redirect('/pemesanan');
    }

    public function cetakForm(){
        return view('pemesanan/cetak-pemesanan-form');
    }
}
