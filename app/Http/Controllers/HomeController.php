<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index (Request $request){
        if($request){
            $semuaproduk = Produk::where('nama_produk','like','%'.$request->cari.'%' ) ->get();
            
        } else {
          
            $semuaproduk = Produk::latest()->get();
        }



        

        return view('user_template.layouts.home',compact('semuaproduk'));
    }
}
