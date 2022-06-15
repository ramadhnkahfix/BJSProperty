<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class PenerimaanController extends Controller
{
    //
    public function index()
    {
        $penerimaan = DB::table('penerimaan')->get();
        $data = array(
            'menu' => 'penerimaan',
            'submenu' => 'penerimaan',
            'penerimaan' => $penerimaan,
        );

        return view('penerimaan/penerimaan',$data); 
    }

    public function insertPenerimaan()
    {
        $penerimaan = DB::table('penerimaan')->get();
        $data = array(
            'menu' => 'penerimaan',
            'submenu' => 'penerimaan',
            'penerimaan' => $penerimaan,
        );

        return view('penerimaan/addpenerimaan',$data); 
    }

    public function tambahPenerimaan(Request $post)
    {  
        //upload gambar/bukti
        $file = Request()->bukti;
        $fileName = Request()->id_penerimaan.'.' . $file->extension();
        $file->move(public_path('bukti'), $fileName);

        DB::table('penerimaan')->insert([
            'tgl_penerimaan' => $post->tgl_penerimaan,
            'bukti' => $fileName ,
            'catatan' => $post->catatan,
        ]);
            

        return redirect('/penerimaan');
    }

    public function hapus($id_penerimaan)
    {
    	DB::table('penerimaan')->where('id_penerimaan',$id_penerimaan)->delete();
	    return redirect('/penerimaan');
    }
}
