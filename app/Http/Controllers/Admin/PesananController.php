<?php

namespace App\Http\Controllers\admin;

use App\Models\Pesanan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produk;

class PesananController extends Controller
{

    public function prosespesanan(){
        $produk = Produk::latest()->get();
        $pending_orders = Pesanan::where(
           
            'status' , 'pending'
        )->orderby('id_user')->get();
        return view('admin.prosespesanan', compact('pending_orders','produk'));
    }
   
    public function PengirimanPesanan(){
        $produk = Produk::latest()->get();
        
        $confirm_orders = Pesanan::where(
           
            'status' , "sent"
        )->orderby('id_user')->get();

        return view('admin.pengirimanpesanan', compact('confirm_orders','produk'));
    }


    public function Konfirmasi($id){
        $info =  Pesanan::findOrFail($id);
        return view('admin.konfirmasi', compact('info'));
   
    }
    public function Kirim($id){
        $infokirim =  Pesanan::findOrFail($id);
        return view('admin.kirim', compact('infokirim'));
   
    }
    public function KonfirmasiPesanan(Request $request){
        $id = $request->id;      
        $request->validate([       
          'status' => 'required'                 
         ]);
         Pesanan::findOrFail($id)->update([      
            'status'=>'sent'     
        ]);
        return redirect()->route('prosespesanan')->with('message','sukses ditambahkan !');
    }

    public function KirimPesanan(Request $request){
        $id = $request->id;      
        $request->validate([       
          'status' => 'required'                 
         ]);
         Pesanan::findOrFail($id)->update([      
            'status'=>'selesai'     
        ]);
        return redirect()->route('pengrimanpesanan')->with('message','sukses ditambahkan !');
    }
}
