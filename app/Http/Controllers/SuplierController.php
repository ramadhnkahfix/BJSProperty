<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class SuplierController extends Controller
{
    //
    public function index()
    {
        $suplier = DB::table('suplier')->get();
        $data = array(
            'menu' => 'suplier',
            'submenu' => 'suplier',
            'suplier' => $suplier,
        );

        return view('suplier/suplier',$data); 
    }

    public function insertSuplier()
    {
        $suplier = DB::table('suplier')->get();
        $data = array(
            'menu' => 'suplier',
            'submenu' => 'suplier',
            'suplier' => $suplier,
        );

        return view('suplier/addsuplier',$data); 
    }

    public function tambahSuplier(Request $post)
    {  
        DB::table('suplier')->insert([
            'nama_suplier' => $post->nama_suplier,
            'jk_suplier' => $post->jk_suplier,
            'no_telp' => $post->no_telp,
            'alamat_suplier' => $post->alamat_suplier,
            'status_suplier' => $post->status_suplier,
        ]);

        return redirect('/suplier');
    }

    public function editSuplier($id_suplier)
    {
        $suplier = DB::table('suplier')->get();
        $data = array(
            'menu' => 'suplier',
            'submenu' => 'suplier',
            'suplier' => $suplier,
        );
        return view('suplier/editsuplier', $data);
    }

    public function updateSuplier($id_suplier)
    {  
        DB::table('suplier')->insert([
            'nama_suplier' => $post->nama_suplier,
            'jk_suplier' => $post->jk_suplier,
            'no_telp' => $post->no_telp,
            'alamat_suplier' => $post->alamat_suplier,
            'status_suplier' => $post->status_suplier,
        ]);

        return redirect('/suplier');
    }

    public function hapus($id_suplier)
    {
    	DB::table('suplier')->where('id_suplier',$id_suplier)->delete();
	    return redirect('/suplier');
    }
}
