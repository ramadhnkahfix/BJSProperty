<?php

namespace App\Http\Controllers;

use App\Models\DetailPemesanan;
use App\Models\Pemesanan;
use Carbon\Carbon;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class PemesananController extends Controller
{
    //
    public function index()
    {
        $supliers = DB::table('suplier')->where('status_suplier',0)->get();
        $pemesanan = DB::table('pemesanan')->get();
        $kode_pemesanan = "PE".date('dmY').rand(0,999);
        $data = array(
            'menu' => 'pemesanan',
            'submenu' => 'pemesanan',
            'pemesanan' => $pemesanan,
            'supliers' => $supliers,
            'kode_pemesanan' => $kode_pemesanan,
        );

        return view('pemesanan/pemesanan',$data); 
    }

    public function getBarang($id){
        $barang = DB::table('barang')->where('supplier_id', $id)->get();
        return json_encode($barang);
    }

    public function getBarangDetail($id){
        $barang = DB::table('barang')->where('id_barang',$id)->get();
        return json_encode($barang);
    }

    public function insert(Request $request){
        $request->validate([
            'nama_barang' => 'required',
            'quantity'=>'required'
        ]);
        $pemesanan = Pemesanan::orderBy('id','desc')->first();
        if($pemesanan->kode_pemesanan != $request->kode_pemesanan){
            Pemesanan::insert([
                'kode_pemesanan'=>$request->kode_pemesanan,
                'tgl_pemesanan' => $request->tgl_pemesanan,
                'status' => '0',
            ]);
            $getPemesananID= Pemesanan::orderBy('id','desc')->first();
            DetailPemesanan::insert([
                'pemesanan_id' => $getPemesananID->id,
                'barang_id' => $request->nama_barang,
                'quantity' => $request->quantity,
                'harga' => $request->harga_barang * $request->quantity
            ]);
            $detail_pemesanan = DetailPemesanan::select('detail_pemesanans.*', 'barang.nama_barang','barang.jml_barang')->join('barang', 'barang.id_barang','=','detail_pemesanans.barang_id')
            ->where('pemesanan_id',$getPemesananID->id)->where('deleted_at',null)->get();
        }else{
            $getDetailID= DetailPemesanan::where('pemesanan_id',$pemesanan->id)
            ->where('barang_id',$request->nama_barang)->first();
            if($getDetailID){
                DetailPemesanan::findOrFail($getDetailID->id)->update([
                    'quantity' => $getDetailID->quantity + $request->quantity,
                    'harga' => $request->harga_barang*($getDetailID->quantity + $request->quantity)
                ]);
            }else{
                DetailPemesanan::insert([
                    'pemesanan_id' => $pemesanan->id,
                    'barang_id' => $request->nama_barang,
                    'quantity' => $request->quantity,
                    'harga' => $request->harga_barang * $request->quantity
                ]);
            }
            $detail_pemesanan = DetailPemesanan::select('detail_pemesanans.*', 'barang.nama_barang','barang.jml_barang')->join('barang', 'barang.id_barang','=','detail_pemesanans.barang_id')
            ->where('pemesanan_id',$pemesanan->id)->where('deleted_at',null)->get();;
        }
        
        return json_encode($detail_pemesanan);
    }

    public function delete($id){
        $data = DetailPemesanan::findOrFail($id);
        $pemesanan = Pemesanan::findOrFail($data->pemesanan_id);
        DetailPemesanan::destroy($id);  

        $detail_pemesanan = DetailPemesanan::select('detail_pemesanans.*', 'barang.nama_barang','barang.jml_barang')->join('barang', 'barang.id_barang','=','detail_pemesanans.barang_id')
        ->where('pemesanan_id',$pemesanan->id)->where('deleted_at',null)->get();;

        return json_encode($detail_pemesanan);
    }
    
    public function insertPemesanan()
    {
        $barang = DB::table('barang')->get();
        $suplier = DB::table('suplier')->get();
        $pemesanan = DB::table('pemesanan')
        ->join('suplier', 'pemesanan.id_suplier', '=', 'suplier.id_suplier')
        ->get();
        $pemesanan = DB::table('pemesanan')
        ->join('barang', 'pemesanan.nama_barang', '=', 'barang.nama_barang')
        ->get();
        $pemesanan = DB::table('pemesanan')->get();
        
        $data = array(
            'menu' => 'pemesanan',
            'submenu' => 'pemesanan',
            'suplier' => $suplier,
            'barang' => $barang,
            'pemesanan' => $pemesanan,
        );

        return view('pemesanan/addpemesanan',$data); 
    }


    public function tambahPemesanan(Request $post)
    {  
        DB::table('pemesanan')->insert([
            'tgl_pemesanan' => $post->tgl_pemesanan,
            'id_suplier' => $post->id_suplier,
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
        $pemesanan = DB::table('pemesanan')->get();
        $data = array(
            'menu' => 'pemesanan',
            'submenu' => 'pemesanan',
            'pemesanan' => $pemesanan,
        );
        return view('pemesanan/cetak-pemesanan-form', $data);
    }
}
