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
use Illuminate\Support\Facades\Session;

class PemesananController extends Controller
{
    //
    public function index()
    {
        $pemesanan = DB::table('pemesanan')->where('status', 1)->orderBy('id', 'desc')->get();
        $data = array(
            'menu' => 'pemesanan',
            'submenu' => 'pemesanan',
            'pemesanan' => $pemesanan,
        );

        return view('pemesanan/pemesanan', $data);
    }

    public function getBarang($id)
    {
        $barang = DB::table('barang')->where('supplier_id', $id)->get();
        return json_encode($barang);
    }

    public function getBarangDetail($id)
    {
        $barang = DB::table('barang')->where('id_barang', $id)->get();
        return json_encode($barang);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'quantity' => 'required'
        ]);
        $order = Pemesanan::orderBy('id', 'desc')->first();
        if ($order == null) {
            Pemesanan::insert([
                'kode_pemesanan' => $request->kode_pemesanan,
                'tgl_pemesanan' => $request->tgl_pemesanan,
                'status' => '0',
            ]);
        }
        $pemesanan = Pemesanan::orderBy('id', 'desc')->first();
        if ($pemesanan->kode_pemesanan != $request->kode_pemesanan) {
            Pemesanan::insert([
                'kode_pemesanan' => $request->kode_pemesanan,
                'tgl_pemesanan' => $request->tgl_pemesanan,
                'status' => '0',
            ]);
            $getPemesananID = Pemesanan::orderBy('id', 'desc')->first();
            DetailPemesanan::insert([
                'pemesanan_id' => $getPemesananID->id,
                'barang_id' => $request->nama_barang,
                'quantity' => $request->quantity,
                'harga' => $request->harga_barang * $request->quantity
            ]);
            $detail_pemesanan = DetailPemesanan::select('detail_pemesanans.*', 'barang.nama_barang', 'barang.jml_barang')->join('barang', 'barang.id_barang', '=', 'detail_pemesanans.barang_id')
                ->where('pemesanan_id', $getPemesananID->id)->where('deleted_at', null)->get();
        } else {
            $getDetailID = DetailPemesanan::where('pemesanan_id', $pemesanan->id)
                ->where('barang_id', $request->nama_barang)->first();
            if ($getDetailID) {
                DetailPemesanan::findOrFail($getDetailID->id)->update([
                    'quantity' => $getDetailID->quantity + $request->quantity,
                    'harga' => $request->harga_barang * ($getDetailID->quantity + $request->quantity)
                ]);
            } else {
                DetailPemesanan::insert([
                    'pemesanan_id' => $pemesanan->id,
                    'barang_id' => $request->nama_barang,
                    'quantity' => $request->quantity,
                    'harga' => $request->harga_barang * $request->quantity
                ]);
            }
            $detail_pemesanan = DetailPemesanan::select('detail_pemesanans.*', 'barang.nama_barang', 'barang.jml_barang')->join('barang', 'barang.id_barang', '=', 'detail_pemesanans.barang_id')
                ->where('pemesanan_id', $pemesanan->id)->where('deleted_at', null)->get();
        }

        return json_encode($detail_pemesanan);
    }

    public function delete($id)
    {
        $data = DetailPemesanan::findOrFail($id);
        $pemesanan = Pemesanan::findOrFail($data->pemesanan_id);
        DetailPemesanan::destroy($id);

        $detail_pemesanan = DetailPemesanan::select('detail_pemesanans.*', 'barang.nama_barang', 'barang.jml_barang')->join('barang', 'barang.id_barang', '=', 'detail_pemesanans.barang_id')
            ->where('pemesanan_id', $pemesanan->id)->where('deleted_at', null)->get();

        return json_encode($detail_pemesanan);
    }

    public function insertPemesanan()
    {
        $supliers = DB::table('suplier')->where('status_suplier', 0)->get();
        $pemesanan = DB::table('pemesanan')->get();
        $kode_pemesanan = "PE" . date('dmY') . rand(0, 999);
        $data = array(
            'menu' => 'pemesanan',
            'submenu' => 'pemesanan',
            'pemesanan' => $pemesanan,
            'supliers' => $supliers,
            'kode_pemesanan' => $kode_pemesanan,
        );

        return view('pemesanan/addpemesanan', $data);
    }

    public function add(Request $request)
    {
        $pemesanan = Pemesanan::findOrFail($request->id_pemesanan);
        $pemesanan->update([
            'total_harga' => $request->total_harga,
            'status' => 1
        ]);
        $detail_pemesanan = DetailPemesanan::select('detail_pemesanans.*', 'barang.nama_barang', 'barang.jml_barang')->join('barang', 'barang.id_barang', '=', 'detail_pemesanans.barang_id')
            ->where('pemesanan_id', $pemesanan->id)->get();
        // foreach ($detail_pemesanan as $data) {
        //     if ($data->quantity > $data->jml_barang) {
        //         $message = "Quantity $data->nama_barang melebihi stok";
        //         return json_encode($message);
        //     }
        // }
        return redirect('/pemesanan')->with('success', 'Data Pemesanan Berhasil di Tambahkan');
    }

    public function show($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $detail_pemesanan = DetailPemesanan::select('detail_pemesanans.*', 'barang.nama_barang')->join('barang', 'barang.id_barang', '=', 'detail_pemesanans.barang_id')
            ->where('pemesanan_id', $id)->where('deleted_at', null)->get();
        $data = array(
            'menu' => 'pemesanan',
            'submenu' => 'pemesanan',
            'pemesanan' => $pemesanan,
            'detail_pemesanan' => $detail_pemesanan,
        );

        return view('pemesanan/show', $data);
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

    public function hapus($id)
    {
        DB::table('pemesanan')->where('id', $id)->delete();
        return redirect('/pemesanan');
    }

    public function cetakForm()
    {
        $pemesanan = DB::table('pemesanan')->get();
        $data = array(
            'menu' => 'pemesanan',
            'submenu' => 'pemesanan',
            'pemesanan' => $pemesanan,
        );
        return view('pemesanan/cetak-pemesanan-form', $data);
    }
}
