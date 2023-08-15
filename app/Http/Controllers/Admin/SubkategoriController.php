<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Subkategori;
use Illuminate\Http\Request;

class SubkategoriController extends Controller
{
    public function index(){
        $semuasubkategoris = Subkategori::latest()->get();
        return view('admin.semuasubkategori',compact('semuasubkategoris'));
    }
    public function tambahsubkategori(){
        $kategoris = Kategori::latest()->get();
        return view('admin.tambahsubkategori',compact('kategoris'));
    }
    public function StoreSubkategori(Request $request){
        $request->validate([
            'nama_subkategori'=> 'required|unique:subkategoris',
            'id_kategori' => 'required' 
           ]);

           $id_kategori = $request->id_kategori; 
           $nama_kategori = Kategori::where('id' , $id_kategori)->value('nama_kategori');
        
        
       Subkategori::insert([
        'nama_subkategori' => $request-> nama_subkategori,
        'slug' => strtolower(str_replace(' ','-',$request->nama_subkategori)),
        'id_kategori' => $id_kategori,
        'nama_kategori' => $nama_kategori
   ]);
   Kategori::where('id' , $id_kategori)->increment('subkategori_count',1);
   return redirect()->route('semuasubkategori')->with('message','sukses ditambahkan !');
        
        }

        

        public function EditSubkategori($id){
            $subkategori_info = Subkategori::findOrFail($id);
            return view('admin.editsubkategori',compact('subkategori_info'));

        }


        
        public function UpdateSubKategori(Request $request ){
             $id_subkategori = $request->id_subkategori;
            
            $request->validate([
                'nama_subkategori'=> 'required|unique:subkategoris'
               ]);
               Subkategori::findOrFail($id_subkategori)->update([
                'nama_subkategori' => $request-> nama_subkategori,
                'slug' => strtolower(str_replace('','-',$request->nama_subkategori)),
               ]);
               return redirect()->route('semuasubkategori')->with('message','sukses di Ubah !');
    
        }

        public function HapusSubkategori($id){
            Subkategori::findOrFail($id)->delete();
            return redirect()->route('semuasubkategori')->with('message','sukses Dihapus !');
        }
    
}
