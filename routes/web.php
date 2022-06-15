<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\DropdownController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $data = array(
        'menu' => 'MasterTambahData',
        'submenu' => 'tambahdata',
    );

    return view('dashboard',$data);
});

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/pemesanan', [PemesananController::class, 'index']);

// Route::post('/pengadaan/dropdownPengadaan', [PengadaanController::class, 'dropdownPengadaan']);
// Route::get('/pengadaan/form_pengadaan', [PengadaanController::class, 'insertPengadaan']);
// Route::post('/pengadaan/tambahPengadaan', [PengadaanController::class, 'tambahPengadaan']);

Route::post('/pemesanan/dropdownPemesanan', [PemesananController::class, 'dropdownPemesanan']);
Route::get('/pemesanan/addpemesanan', [PemesananController::class, 'insertPemesanan']);
Route::post('/pemesanan/addpemesanan', [PemesananController::class, 'tambahPemesanan']);
Route::get('/pemesanan/hapus/{id_pemesanan}', [PemesananController::class, 'hapus']);

Route::get('/penerimaan', [PenerimaanController::class, 'index']);
Route::get('/penerimaan/addpenerimaan', [PenerimaanController::class, 'insertPenerimaan']);
Route::post('/penerimaan/addpenerimaan', [PenerimaanController::class, 'tambahPenerimaan']);
Route::get('/penerimaan/hapus/{id_penerimaan}', [PenerimaanController::class, 'hapus']);

Route::get('/pembayaran', [PembayaranController::class, 'index']);
Route::get('/pembayaran/addpembayaran', [PembayaranController::class, 'insertPembayaran']);
Route::post('/pembayaran/addpembayaran', [PembayaranController::class, 'tambahPembayaran']);
Route::get('/pembayaran/hapus/{id_pembayaran}', [PembayaranController::class, 'hapus']);

Route::get('/barang', [BarangController::class, 'index']);
Route::get('/barang/addbarang', [BarangController::class, 'insertBarang']);
Route::post('/barang/addbarang', [BarangController::class, 'tambahBarang']);
Route::get('/barang/editbarang/{id_barang}', [BarangController::class, 'editBarang']);
Route::post('/barang/updatebarang/{id_barang}', [BarangController::class, 'updateBarang']);
Route::get('/barang/hapus/{id_barang}', [BarangController::class, 'hapus']);

Route::get('/pegawai', [PegawaiController::class, 'index']);
Route::get('/pegawai/addpegawai', [PegawaiController::class, 'insertPegawai']);
Route::post('/pegawai/addpegawai', [PegawaiController::class, 'tambahPegawai']);
Route::get('/pegawai/editpegawai/{id_pegawai}', [PegawaiController::class, 'editPegawai']);
Route::post('/pegawai/updatepegawai/{id_pegawai}', [PegawaiController::class, 'updatePegawai']);
Route::get('/pegawai/hapus/{id_pegawai}', [PegawaiController::class, 'hapus']);

Route::get('/suplier', [SuplierController::class, 'index']);
Route::get('/suplier/addsuplier', [SuplierController::class, 'insertSuplier']);
Route::post('/suplier/addsuplier', [SuplierController::class, 'tambahSuplier']);
Route::get('/suplier/editsuplier/{id_suplier}', [SuplierController::class, 'editSuplier']);
Route::post('/suplier/updatesuplier/{id_suplier}', [SuplierController::class, 'updateSuplier']);
Route::get('/suplier/hapus/{id_suplier}', [SuplierController::class, 'hapus']);


Route::get('/pemesanan/cetak-pemesanan-form', [PemesananController::class, 'cetakForm']);