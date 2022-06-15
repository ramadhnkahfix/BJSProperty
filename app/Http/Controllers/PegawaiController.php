<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class PegawaiController extends Controller
{
    //
    public function index()
    {
        $pegawai = DB::table('pegawai')->get();
        $data = array(
            'menu' => 'pegawai',
            'submenu' => 'pegawai',
            'pegawai' => $pegawai,
        );

        return view('pegawai/pegawai',$data); 
    }

    public function insertPegawai()
    {
        $pegawai = DB::table('pegawai')->get();
        $data = array(
            'menu' => 'pegawai',
            'submenu' => 'pegawai',
            'pegawai' => $pegawai,
        );

        return view('pegawai/addpegawai',$data); 
    }

    public function tambahPegawai(Request $post)
    {  
        DB::table('pegawai')->insert([
            'nama_pegawai' => $post->nama_pegawai,
            'jk_pegawai' => $post->jk_pegawai,
            'no_telp' => $post->no_telp,
            'alamat_pegawai' => $post->alamat_pegawai,
            'status_pegawai' => $post->status_pegawai,
        ]);

        return redirect('/pegawai');
    }

    public function editPegawai($id_pegawai)
    {
        $pegawai = DB::table('pegawai')->get();
        $data = array(
            'menu' => 'pegawai',
            'submenu' => 'pegawai',
            'pegawai' => $pegawai,
        );
        return view('pegawai/editpegawai', $data);
    }

    public function updatePegawai($id_pegawai)
    {  
        DB::table('pegawai')->insert([
            'id_pegawai' => $post->id_pegawai,
            'nama_pegawai' => $post->nama_pegawai,
            'jk_pegawai' => $post->jk_pegawai,
            'no_telp' => $post->no_telp,
            'alamat_pegawai' => $post->alamat_pegawai,
            'status_pegawai' => $post->status_pegawai,
        ]);

        return redirect('/pegawai');
    }

    public function hapus($id_pegawai)
    {
    	DB::table('pegawai')->where('id_pegawai',$id_pegawai)->delete();
	    return redirect('/pegawai');
    }
}
