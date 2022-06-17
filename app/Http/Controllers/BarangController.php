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

        return view('barang/barang',$data); 
    }

    public function insertBarang()
    {
        $barang = DB::table('barang')->get();
        $data = array(
            'menu' => 'barang',
            'submenu' => 'barang',
            'barang' => $barang,
        );

        return view('barang/addbarang',$data); 
    }

    public function tambahBarang(Request $post)
    {  
        DB::table('barang')->insert([
            'nama_barang' => $post->nama_barang,
            'jml_barang' => $post->jml_barang,
            'harga_barang' => $post->harga_barang,
        ]);

        return redirect('/barang');
    }

    public function editBarang($id_barang)
    {
        $barang = DB::table('barang')->where('id_barang','=',$id_barang)->first();
        // dd($barang);
        $data = array(
            'menu' => 'barang',
            'submenu' => 'barang',
            'barang' => $barang,
        );
        return view('barang/editbarang', $data);
    }

    public function updateBarang(Request $request,$id)
    {  
        // dd($request);
        $update = DB::table('barang')->where('id_barang','=',$id)->limit(1);
        // $update->nama_barang = $post->nama_barang ;
        // $update->jml_barang = $request->jml_barang;
        // $update->harga_barang = $request->harga_barang;
        // $update->save();
        $update->update([
            'nama_barang' => $request->nama_barang,
            'jml_barang' => $request->jml_barang,
            'harga_barang' => $request->harga_barang
        ]);

        return redirect('/barang')->with('status', 'Data Berhasil di Ubah');
    }

    public function hapus($id_barang)
    {
    	DB::table('barang')->where('id_barang',$id_barang)->delete();
	    return redirect('/barang');
    }
}
