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
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('bukti'), $fileName);
        
        DB::table('penerimaan')->insert([
            'tgl_penerimaan' => $post->tgl_penerimaan,
            'bukti' => $fileName ,
            'catatan' => $post->catatan,
        ]);
            

        return redirect('/penerimaan');
    }

    public function editPenerimaan($id_penerimaan)
    {
        $penerimaan = DB::table('penerimaan')->where('id_penerimaan','=',$id_penerimaan)->first();
        $data = array(
            'menu' => 'penerimaan',
            'submenu' => 'penerimaan',
            'penerimaan' => $penerimaan,
        );
        return view('penerimaan/editpenerimaan', $data);
    }

    public function updatePenerimaan(Request $request,$id)
    {  
        $update = DB::table('penerimaan')->where('id_penerimaan','=',$id)->limit(1);
        $update->update([
            'tgl_penerimaan' => $request->tgl_penerimaan,
            'catatan' => $request->catatan,
        ]);

        // upload gambar/foto bukti_penerimaan
        $file = $request->bukti;
        if(!($file == null)) {
            $fileName = $file;
            $file->move(public_path('bukti'), $fileName);
            $data["bukti"] = $fileName;
        }
        
        return redirect('/penerimaan')->with('status','Data Berhasil di Ubah');
    }

    public function hapus($id_penerimaan)
    {
    	DB::table('penerimaan')->where('id_penerimaan',$id_penerimaan)->delete();
	    return redirect('/penerimaan');
    }

    public function download($file){
        $data = DB::table('penerimaan')->where('id_penerimaan','=',$file)->first();
        $bukti = public_path('bukti/'.$data->bukti);
        // dd($data);

        return response()->download($bukti, $data->bukti);
    }

}
