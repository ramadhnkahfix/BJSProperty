<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    //
    public function index()
    {
        $pembayaran = DB::table('pembayaran')->get();
        $data = array(
            'menu' => 'pembayaran',
            'submenu' => 'pembayaran',
            'pembayaran' => $pembayaran,
        );

        return view('pembayaran/pembayaran',$data); 
    }

    public function insertPembayaran()
    {
        $pembayaran = DB::table('pembayaran')->get();
        $data = array(
            'menu' => 'pembayaran',
            'submenu' => 'pembayaran',
            'pembayaran' => $pembayaran,
        );

        return view('pembayaran/addpembayaran',$data); 
    }

    public function tambahPembayaran(Request $post)
    {  
        Request()->validate([
            'tgl_pembayaran' => 'required',
            'total_pembayaran' => 'required',
            'bukti_pembayaran' => 'required|mimes:pdf,doc,docx,jpg,jpeg,bmp,png',         
            'status_pembayaran' => 'required',
            
        ], [
            'tgl_pembayaran.required' =>'wajib diisi',
            'total_pembayaran.required' =>'wajib diisi',
            'bukti_pembayaran.required' =>'wajib diisi',
            'status_pembayaran.required' =>'wajib diisi',
            
        ]);
        
        //upload gambar/bukti_pembayaran
        $file = Request()->bukti_pembayaran;
        $fileName = Request()->id_pembayaran.'.' . $file->extension();
        $file->move(public_path('bukti_pembayaran'), $fileName);

        DB::table('pembayaran')->insert([
            'tgl_pembayaran' => $post->tgl_pembayaran,
            'total_pembayaran' => $post->total_pembayaran,
            'bukti_pembayaran' => $fileName,
            'status_pembayaran' => $post->status_pembayaran,
        ]);

        return redirect('/pembayaran');
    }

    public function hapus($id_pembayaran)
    {
    	DB::table('pembayaran')->where('id_pembayaran',$id_pembayaran)->delete();
	    return redirect('/pembayaran');
    }
}
