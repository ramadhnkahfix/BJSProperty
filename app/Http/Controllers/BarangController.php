<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class BarangController extends Controller
{
    //
    public function index()
    {
        $barang = DB::table('barang')->get();
        $data = array(
            'menu' => 'barang',
            'submenu' => 'barang',
            'barang' => $barang,
        );

        return view('barang/barang', $data);
    }

    public function insertBarang()
    {
        $barang = DB::table('barang')->get();
        $suplier = DB::table('suplier')->where('status_suplier', 0)->get();
        $data = array(
            'menu' => 'barang',
            'submenu' => 'barang',
            'barang' => $barang,
            'supliers' => $suplier
        );

        return view('barang/addbarang', $data);
    }

    public function tambahBarang(Request $post)
    {
        DB::table('barang')->insert([
            'nama_barang' => $post->nama_barang,
            'jml_barang' => $post->jml_barang,
            'harga_barang' => $post->harga_barang,
            'supplier_id' => $post->supplier
        ]);

        return redirect('/barang');
    }

    public function editBarang($id_barang)
    {
        $barang = DB::table('barang')->where('id_barang', '=', $id_barang)->first();
        $supplier = DB::table('suplier')->where('id_suplier', $barang->supplier_id)->first();
        $data = array(
            'menu' => 'barang',
            'submenu' => 'barang',
            'barang' => $barang,
            'supplier' => $supplier->nama_suplier
        );
        return view('barang/editbarang', $data);
    }

    public function updateBarang(Request $request, $id)
    {
        $update = DB::table('barang')->where('id_barang', '=', $id)->limit(1);
        //$update->nama_barang => $post->nama_barang;
        //$update->jml_barang => $request->jml_barang;
        //$update->harga_barang => $request->harga_barang;
        //$update->save();
        $update->update([
            'nama_barang' => $request->nama_barang,
            'jml_barang' => $request->jml_barang,
            'harga_barang' => $request->harga_barang
        ]);
        return redirect('/barang')->with('status', 'Data Berhasil di Ubah');
    }

    public function hapus($id_barang)
    {
        DB::table('barang')->where('id_barang', $id_barang)->delete();
        return redirect('/barang');
    }
}
