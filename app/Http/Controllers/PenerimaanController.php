<?php

namespace App\Http\Controllers;

use App\Models\DetailPemesanan;
use App\Models\DetailPenerimaan;
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
        $penerimaan = DB::table('penerimaan')->select('penerimaan.*', 'pemesanan.kode_pemesanan')
            ->join('pemesanan', 'pemesanan.id', '=', 'penerimaan.pemesanan_id')
            ->where('penerimaan.status', 1)->get();
        $data = array(
            'menu' => 'penerimaan',
            'submenu' => 'penerimaan',
            'penerimaan' => $penerimaan,
        );

        return view('penerimaan/penerimaan', $data);
    }

    public function show($id)
    {
        $penerimaan = DB::table('penerimaan')->where('id_penerimaan', $id)->first();
        $detail_penerimaan = DetailPenerimaan::select('detail_penerimaans.*', 'barang.nama_barang', 'barang.jml_barang')
            ->join('barang', 'barang.id_barang', '=', 'detail_penerimaans.barang_id')
            ->where('penerimaan_id', $id)->get();
        $data = array(
            'menu' => 'penerimaan',
            'submenu' => 'penerimaan',
            'penerimaan' => $penerimaan,
            'detail_penerimaan' => $detail_penerimaan
        );
        return view('penerimaan.show', $data);
    }

    public function insertPenerimaan()
    {
        $penerimaan = DB::table('penerimaan')->get();
        $pemesanan = Pemesanan::where('status', 1)->orderBy('id', 'desc')->get();
        $kode_penerimaan = "PN" . date('dmY') . rand(0, 999);
        $data = array(
            'menu' => 'penerimaan',
            'submenu' => 'penerimaan',
            'penerimaan' => $penerimaan,
            'pemesanan' => $pemesanan,
            'kode_penerimaan' => $kode_penerimaan,
        );

        return view('penerimaan/addpenerimaan', $data);
    }

    public function getDetailPemesanan($id)
    {
        $penerimaan = DB::table('penerimaan')->where('pemesanan_id', $id)->first();
        $detail_penerimaan = DetailPenerimaan::select('detail_penerimaans.*', 'barang.nama_barang', 'barang.jml_barang')
            ->join('barang', 'barang.id_barang', '=', 'detail_penerimaans.barang_id')
            ->where('penerimaan_id', $penerimaan->id_penerimaan)->get();
        return json_encode($detail_penerimaan);
    }

    public function validatePenerimaan(Request $request, $id)
    {
        $detail_penerimaan = DetailPenerimaan::findOrFail($id);
        $detail_penerimaan->update([
            'quantity' => $request->quantity
        ]);
        return json_encode($detail_penerimaan);
    }

    public function tambahPenerimaan(Request $post)
    {
        $pemesanan = Pemesanan::findOrFail($post->kode_pemesanan);
        //upload gambar/bukti
        $file = Request()->bukti;
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('bukti'), $fileName);

        DB::table('penerimaan')->where('pemesanan_id', $post->kode_pemesanan)->update([
            'tgl_penerimaan' => date('Y-m-d'),
            'bukti' => $fileName,
            'catatan' => $post->catatan,
            'total_harga' => $pemesanan->total_harga,
            'status' => 1
        ]);
        $penerimaan = DB::table('penerimaan')->orderBy('id_penerimaan','desc')->first();
        $detail_penerimaan = DetailPenerimaan::where('penerimaan_id',$penerimaan->id_penerimaan)->get();
        foreach($detail_penerimaan as $data){
            $barang = DB::table('barang')->where('id_barang',$data->barang_id)->first();
            DB::table('barang')->where('id_barang',$data->barang_id)->update([
                'jml_barang' => $barang->jml_barang + $data->quantity
            ]);
        }



        return redirect('/penerimaan')->with('success', 'Data Pemesanan Berhasil di Tambahkan');
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

        return redirect('/penerimaan')->with('success', 'Data Berhasil di Ubah');
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
