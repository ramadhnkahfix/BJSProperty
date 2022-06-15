<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use DB;
use Illuminate\Support\Facades\Storages;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = DB::table('customer')->get();
        $data = array(
            'menu' => 'customer',
            'customer' => $customer,
            'submenu' => '',
        );

        return view('pages/viewCustomer',$data); 
    }

    // public function simpan(Request $request)
    // {
       
    //     DB::table('customer')->insert([
    //         'nama' => $request->nama_pembeli,      
    //         'alamat' => $request->alamat_pembeli,
    //         'no_hp' => $request->no_hp_pembeli,
    //         'nik' => $request->nik_pembeli, 
    //         'id_status' => $request->id_status,       
    //     ]);

    //     return redirect('/dropdown');
    // }

    // public function simpan2(Request $request)
    // {
       
    //     DB::table('customer')->insert([
    //         'nama' => $request->nama,      
    //         'alamat' => $request->alamat,  
    //         'no_hp' => $request->no_hp_pembeli,
    //         'nik' => $request->nik_pembeli, 
    //         'id_status' => $request->id_status,        
    //     ]);

    //     return redirect('/dropdown2');
    // }

    public function editCustomer($id_pembeli) 
    {
        $customer = DB::table('customer')->where('id_pembeli', $id_pembeli)->get();
        $data = array(
            'menu' => 'customer',
            'customer' => $customer,
            'submenu' => ''
        );
        
        return view('pages/editCustomer',$data); 
    } 


}
