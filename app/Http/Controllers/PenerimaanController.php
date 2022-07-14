<?php

namespace App\Http\Controllers;

use App\Models\DetailPemesanan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class PenerimaanController extends Controller
{
    //
    public function index()
    {
        $penerimaan = DB::table('penerimaan')->select('penerimaan.*','pemesanan.kode_pemesanan')
        ->join('pemesanan','pemesanan.id','=','penerimaan.pemesanan_id')->get();
        $data = array(
            'menu' => 'penerimaan',
            'submenu' => 'penerimaan',
            'penerimaan' => $penerimaan,
        );

        return view('penerimaan/penerimaan', $data);
    }

    public function insertPenerimaan()
    {
        $penerimaan = DB::table('penerimaan')->get();
        $pemesanan = Pemesanan::where('status', 1)->get();
        $data = array(
            'menu' => 'penerimaan',
            'submenu' => 'penerimaan',
            'penerimaan' => $penerimaan,
            'pemesanan' => $pemesanan
        );

        return view('penerimaan/addpenerimaan', $data);
    }

    public function getDetailPemesanan($id)
    {
        $detail_pemesanan = DetailPemesanan::select('detail_pemesanans.*', 'barang.nama_barang', 'barang.jml_barang')->join('barang', 'barang.id_barang', '=', 'detail_pemesanans.barang_id')
            ->where('pemesanan_id', $id)->where('deleted_at', null)->get();
        return json_encode($detail_pemesanan);
    }

    public function tambahPenerimaan(Request $post)
    {
        $pemesanan = Pemesanan::findOrFail($post->kode_pemesanan);
        //upload gambar/bukti
        $file = Request()->bukti;
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('bukti'), $fileName);

        DB::table('penerimaan')->insert([
            'tgl_penerimaan' => date('Y-m-d'),
            'pemesanan_id' => $post->kode_pemesanan,
            'bukti' => $fileName,
            'catatan' => $post->catatan,
            'total_harga'=>$pemesanan->total_harga
        ]);


        return redirect('/penerimaan');
    }

    public function editPenerimaan($id_penerimaan)
    {
        $penerimaan = DB::table('penerimaan')->where('id_penerimaan', '=', $id_penerimaan)->first();
        $data = array(
            'menu' => 'penerimaan',
            'submenu' => 'penerimaan',
            'penerimaan' => $penerimaan,
        );
        return view('penerimaan/editpenerimaan', $data);
    }

    public function updatePenerimaan(Request $request, $id)
    {
        $update = DB::table('penerimaan')->where('id_penerimaan', '=', $id)->limit(1);
        $update->update([
            'tgl_penerimaan' => $request->tgl_penerimaan,
            'catatan' => $request->catatan,
        ]);

        // upload gambar/foto bukti_penerimaan
        $file = $request->bukti;
        if (!($file == null)) {
            $fileName = $file;
            $file->move(public_path('bukti'), $fileName);
            $data["bukti"] = $fileName;
        }

        return redirect('/penerimaan')->with('status', 'Data Berhasil di Ubah');
    }

    public function hapus($id_penerimaan)
    {
        DB::table('penerimaan')->where('id_penerimaan', $id_penerimaan)->delete();
        return redirect('/penerimaan');
    }

    public function download($file)
    {
        $data = DB::table('penerimaan')->where('id_penerimaan', '=', $file)->first();
        $bukti = public_path('bukti/' . $data->bukti);
        // dd($data);

        return response()->download($bukti, $data->bukti);
    }

    public function cetakForm()
    {
        $penerimaan = DB::table('penerimaan')->get();
        $data = array(
            'menu' => 'penerimaan',
            'submenu' => 'penerimaan',
            'penerimaan' => $penerimaan,
        );
        return view('penerimaan/cetak-penerimaan-form', $data);
    }

    public function cetakPenerimaanPertanggal($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $cetakpertanggal = DB::table('penerimaan')->whereBetween('tgl_penerimaan', [$tglawal, $tglakhir])->get();
        return view('penerimaan/cetak-penerimaan-pertanggal', compact('cetakpertanggal'));
    }
}
