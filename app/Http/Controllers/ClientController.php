<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\InfoPengemasan;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
public function KategoriPage ($id){
    $kategori = Kategori::findOrfail($id);
    $produk = Produk::where('id_kategori',$id )->latest()->get();

    return view ('user_template.layouts.kategori', compact('kategori','produk'));
}
public function SingleProduk ($id){
    $produk = Produk::findOrfail($id);
    $id_subkategori = Produk::where('id' , $id)->value('id_subkategori');
    $related_produk = Produk::where('id_subkategori' , $id_subkategori)->latest()->get();
    return view ('user_template.layouts.produk', compact('produk','related_produk'));
}
public function AddToCart (){
    $iduser = Auth::id();
    $cart_items = Cart::where('id_user', $iduser)->get();
    return view ('user_template.layouts.addtocart', compact('cart_items'));
}
public function AddProdukToCart (Request $request){
$harga_produk = $request->harga;
$jumlah = $request->jumlah;
$harga = $harga_produk * $jumlah;
Cart::insert([
    'id_produk' => $request->id_produk,
    'id_user' => Auth::id(),
    'jumlah' => $request->jumlah,
    'harga' => $harga,
]);
return redirect()->route('addtocart')->with('message', 'Ditambahkan ke Keranjang');
}
public function Checkout (){
    $iduser = Auth::id();
    $cart_items = Cart::where('id_user', $iduser)->get();
    $alamat_pengemasan = InfoPengemasan::where('id_user', $iduser)->get()->first();
    return view ('user_template.layouts.checkout', compact('iduser','alamat_pengemasan','cart_items'));
}
public function UserProfile (){
    return view ('user_template.layouts.userprofile');
}
public function PendingOrder (){
    $iduser = Auth::id();
    $pending_orders = Pesanan::where([
        'id_user' => $iduser,
        'status' => 'pending',
    ])->latest()->get();
    $sent_orders = Pesanan::where([
        'id_user' => $iduser,
        'status' => 'sent',
    ])->latest()->get();
     
    return view ('user_template.layouts.pendingorder', compact('pending_orders','sent_orders'));
}
public function HistoryOrder (){
    $iduser = Auth::id();
    $history_orders = Pesanan::where([
        'id_user' => $iduser,
        'status' => 'selesai',
    ])->latest()->get();
   
    return view ('user_template.layouts.history', compact('history_orders'));
}
public function NewRelease (){
    return view ('user_template.layouts.newrelease');
}
public function TodaysDeal (){
    return view ('user_template.layouts.todaysdeal');
}
public function CustomerService (){
    return view ('user_template.layouts.customerservice');
}
public function Pengemasan (){
    return view ('user_template.layouts.pengemasan');
}
public function TambahAlamat (Request $request){
    InfoPengemasan::insert([
        'id_user' => Auth::id(),
        'telepon' => $request->telepon,
        'alamat' => $request->alamat,
        'kodepos' => $request->kodepos,
        
    ]);
    return redirect()->route('checkout');
}
public function RemoveCart ($id){
    Cart::findOrFail($id)->delete();
    return redirect()->route('addtocart');
}
public function PlaceOrder (){
    $iduser = Auth::id();
    $alamat_pengemasan = InfoPengemasan::where('id_user', $iduser)->first();
    $cart_items = Cart::where('id_user', $iduser)->get();
    
    foreach($cart_items as $item){
        Pesanan::insert([
            'id_user'=> $iduser,
        'pemesanan_telepon' => $alamat_pengemasan->telepon,
        'pemesanan_alamat' => $alamat_pengemasan->alamat,
        'pemesanan_kodepos' => $alamat_pengemasan->kodepos,
        'id_produk' => $item->id_produk,
        'jumlah'=> $item->jumlah,
        'total_harga'=> $item->harga,

        ]);
        $id= $item->id;
        Cart::findOrFail($id)->delete();

    }
    InfoPengemasan::where('id_user', $iduser)->first()->delete();
    
    return redirect()->route('pendingorder')->with('message', ' Sukses dibuat');

}





}
