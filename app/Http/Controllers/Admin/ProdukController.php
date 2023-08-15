<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\SubKategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(){
        $produks = Produk::latest()->get();
        return view('admin.semuaproduk',compact('produks'));
    }
    public function tambahproduk(){
        $kategoris = Kategori::latest()->get();
        $subkategoris = SubKategori::latest()->get();
        return view('admin.tambahproduk', compact('kategoris','subkategoris'));
    }

    public function StoreProduk(Request $request){
       
            $request->validate([
                'nama_produk'=> 'required',
                'deskripsi_singkat' => 'required' ,
                'deskripsi' => 'required' ,
                'harga' => 'required' ,
                'jumlah' => 'required' ,
                'id_kategori' => 'required' ,
                'id_subkategori' => 'required' ,
                'gambar' => 'required|image|mimes:jpeg,jpg,png,svg' ,
               ]);
    
               $gambar = $request->file('gambar');
               $nama_gambar = hexdec(uniqid()).'.'.$gambar->getClientOriginalExtension();
             $request-> gambar->move(public_path('uploads'),$nama_gambar);
               $id_kategori = $request->id_kategori; 
               $id_subkategori = $request->id_subkategori; 
               $url_gambar = 'uploads/'.$nama_gambar;
               $nama_kategori = Kategori::where('id' , $id_kategori)->value('nama_kategori');
               $nama_subkategori = SubKategori::where('id' , $id_subkategori)->value('nama_subkategori');
            
               Produk::insert([
                   'nama_produk'=>$request->nama_produk,
                   'deskripsi_singkat'=>$request->deskripsi_singkat,
                   'deskripsi'=>$request->deskripsi,
                   'harga'=>$request->harga,
                   'nama_kategori'=>$nama_kategori,
                   'nama_subkategori'=>$nama_subkategori,
                   'jumlah'=>$request->jumlah,
                   'id_kategori'=>$request->id_kategori,
                   'id_subkategori'=>$request->id_subkategori,
                   'gambar'=>$url_gambar,
                   'slug' => strtolower(str_replace(' ','-',$request->nama_produk)),            
           ]);
           Kategori::where('id' , $id_kategori)->increment('produk_count',1);
           SubKategori::where('id' , $id_subkategori)->increment('produk_count',1);

           return redirect()->route('semuaproduk')->with('message','sukses ditambahkan !');
           }

           public function EditGambar ( $id){
            $produkinfo =  Produk::findOrFail($id);
            return view('admin.editgambar', compact('produkinfo'));

           }
           public function UpdateGambar (Request $request){
             $request->validate([
               'gambar' => 'required|image|mimes:jpeg,jpg,png,svg' 
              ]);
              
              $id = $request->id;
              $gambar = $request->file('gambar');
              $nama_gambar = hexdec(uniqid()).'.'.$gambar->getClientOriginalExtension();
              $request-> gambar->move(public_path('uploads'),$nama_gambar);
            $url_gambar = 'uploads/'.$nama_gambar;
            
            Produk::findOrFail($id)->update([
              'gambar'=>$url_gambar,
              
            ]);
            return redirect()->route('semuaproduk')->with('message','sukses diubah !');
          }
        
        
        public function EditProduk ( $id){
         $produkinfo =  Produk::findOrFail($id);
         return view('admin.editproduk', compact('produkinfo'));

        }
        public function UpdateProduk ( Request $request){
        $idproduk = $request->id;
        
        
        $request->validate([
          'nama_produk'=> 'required',
          'jumlah' => 'required' ,
          'deskripsi_singkat' => 'required' ,
          'deskripsi' => 'required' ,
          'harga' => 'required' ,
          
         ]);
         Produk::findOrFail($idproduk)->update([
         
          'nama_produk'=>$request->nama_produk,
          'deskripsi_singkat'=>$request->deskripsi_singkat,
          'deskripsi'=>$request->deskripsi,
          'harga'=>$request->harga,   
          'jumlah'=>$request->jumlah,       
          'slug' => strtolower(str_replace(' ','-',$request->nama_produk)),   
        ]);
        return redirect()->route('semuaproduk')->with('message','sukses ditambahkan !');

        }
        public function HapusProduk($id){
          $id_kategori = Produk::where('id' , $id)->value('id_kategori');
          $id_subkategori = Produk::where('id' , $id)->value('id_subkategori');
          Produk::findOrFail($id)->delete();
         Kategori::where('id' , $id_kategori)->decrement('produk_count',1);
         SubKategori::where('id' , $id_subkategori)->decrement('produk_count',1);
          return redirect()->route('semuaproduk')->with('message','sukses Dihapus !');
      }
  
      }