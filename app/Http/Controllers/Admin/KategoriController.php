<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        $kategoris = Kategori::latest()->get();
        return view('admin.semuakategori',compact('kategoris'));
    }
    public function tambahkategori(){
        return view('admin.tambahkategori');
    }
    public function StoreCategory(Request $request){
       $request->validate([
        'nama_kategori'=> 'required|unique:kategoris'
       ]);

       Kategori::insert([
            'nama_kategori' => $request-> nama_kategori,
            'slug' => strtolower(str_replace('','-',$request->nama_kategori)),
        
       ]);
       return redirect()->route('semuakategori')->with('message','sukses ditambahkan !');
    }

    public function EditKategori($id){
        $kategori_info = Kategori::findOrFail($id);
        return view('admin.editkategori',compact('kategori_info'));
       


    }
    public function UpdateKategori(Request $request ){
        $id_kategori = $request->id_kategori;
        
        $request->validate([
            'nama_kategori'=> 'required|unique:kategoris'
           ]);
           Kategori::findOrFail($id_kategori)->update([
            'nama_kategori' => $request-> nama_kategori,
            'slug' => strtolower(str_replace('','-',$request->nama_kategori)),
           ]);
           return redirect()->route('semuakategori')->with('message','sukses di Ubah !');

    }

    public function HapusKategori($id){
        Kategori::findOrFail($id)->delete();
        return redirect()->route('semuakategori')->with('message','sukses Dihapus !');
    }
    public function UserProfile (){
        return view ('user_template.layouts.userprofile');}

}
