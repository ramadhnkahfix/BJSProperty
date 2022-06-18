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
Route::get('/pemesanan/addpemesanan', [PemesananController::class, 'insertPemesanan']);
Route::post('/pemesanan/addpemesanan', [PemesananController::class, 'tambahPemesanan']);
Route::get('/pemesanan/hapus/{id_pemesanan}', [PemesananController::class, 'hapus']);

Route::get('/penerimaan', [PenerimaanController::class, 'index']);
Route::get('/penerimaan/addpenerimaan', [PenerimaanController::class, 'insertPenerimaan']);
Route::post('/penerimaan/addpenerimaan', [PenerimaanController::class, 'tambahPenerimaan']);
Route::get('/penerimaan/editpenerimaan/{id_penerimaan}', [PenerimaanController::class, 'editPenerimaan']);
Route::post('/penerimaan/updatepenerimaan/{id}', [PenerimaanController::class, 'updatePenerimaan'])->name('edit.penerimaan');
Route::get('/penerimaan/hapus/{id_penerimaan}', [PenerimaanController::class, 'hapus']);

Route::get('/pembayaran', [PembayaranController::class, 'index']);
Route::get('/pembayaran/addpembayaran', [PembayaranController::class, 'insertPembayaran']);
Route::post('/pembayaran/addpembayaran', [PembayaranController::class, 'tambahPembayaran']);
Route::get('/pembayaran/editpembayaran/{id_pembayaran}', [PembayaranController::class, 'editPembayaran']);
Route::post('/pembayaran/updatepembayaran/{id}', [PembayaranController::class, 'updatePembayaran'])->name('edit.pembayaran');
Route::get('/pembayaran/hapus/{id_pembayaran}', [PembayaranController::class, 'hapus']);

Route::get('/barang', [BarangController::class, 'index']);
Route::get('/barang/addbarang', [BarangController::class, 'insertBarang']);
Route::post('/barang/addbarang', [BarangController::class, 'tambahBarang']);
Route::get('/barang/editbarang/{id_barang}', [BarangController::class, 'editBarang']);
Route::patch('/barang/updatebarang/{id}', [BarangController::class, 'updateBarang'])->name('edit.barang');
Route::get('/barang/hapus/{id_barang}', [BarangController::class, 'hapus']);

Route::get('/pegawai', [PegawaiController::class, 'index']);
Route::get('/pegawai/addpegawai', [PegawaiController::class, 'insertPegawai']);
Route::post('/pegawai/addpegawai', [PegawaiController::class, 'tambahPegawai']);
Route::get('/pegawai/editpegawai/{id_pegawai}', [PegawaiController::class, 'editPegawai']);
Route::post('/pegawai/updatepegawai/{id}', [PegawaiController::class, 'updatePegawai'])->name('edit.pegawai');
Route::get('/pegawai/hapus/{id_pegawai}', [PegawaiController::class, 'hapus']);

Route::get('/suplier', [SuplierController::class, 'index']);
Route::get('/suplier/addsuplier', [SuplierController::class, 'insertSuplier']);
Route::post('/suplier/addsuplier', [SuplierController::class, 'tambahSuplier']);
Route::get('/suplier/editsuplier/{id_suplier}', [SuplierController::class, 'editSuplier']);
Route::post('/suplier/updatesuplier/{id}', [SuplierController::class, 'updateSuplier'])->name('edit.suplier');
Route::get('/suplier/hapus/{id_suplier}', [SuplierController::class, 'hapus']);


Route::get('/pemesanan/cetak-pemesanan-form', [PemesananController::class, 'cetakForm']);