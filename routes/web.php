<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\KategoriController;
use App\Http\Controllers\admin\PesananController;
use App\Http\Controllers\admin\ProdukController;
use App\Http\Controllers\admin\SubkategoriController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('user_template.layouts.template');
});

Route::controller(HomeController::class)->group(function(){
    Route::get('/','index')->name('home');
    });
Route::controller(ClientController::class)->group(function(){
    Route::get('/kategori/{id}/{slug}','KategoriPage')->name('kategori');
    Route::get('/produk-details/{id}/{slug}','SingleProduk')->name('singleproduk');
    Route::get('/new-release','NewRelease')->name('newrelease');


    });

    Route::middleware(['auth','role:user'])->group(function(){
        Route::controller(ClientController::class)->group(function(){
            Route::get('/add-to-cart','AddToCart')->name('addtocart');
            Route::post('/add-produk-to-cart','AddProdukToCart')->name('addproduktocart');
            Route::get('/kemas','Pengemasan')->name('pengemasan');
            Route::post('/tambah-alamat','TambahAlamat')->name('tambahalamat');
            Route::post('/place-order','PlaceOrder')->name('placeorder');
            Route::get('/checkout','Checkout')->name('checkout');
            Route::get('/user-profile','UserProfile')->name('userprofile');
            Route::get('/pending-order','PendingOrder')->name('pendingorder');
            Route::get('/history-order','HistoryOrder')->name('historyorder');
            Route::get('/todays-deal','TodaysDeal')->name('todaysdeal');
            Route::get('/customer-service','CustomerService')->name('customerservice');
            Route::get('/remove-cart/{id}','RemoveCart')->name('removecart');
        
            });
    });



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','role:user'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','verified','role:admin'])->group(function(){
Route::controller(DashboardController::class)->group(function(){
Route::get('/admin/dashboard','index')->name('admindashboard');
});
    Route::controller(KategoriController::class)->group(function(){
        Route::get('/admin/semua-kategori','index')->name('semuakategori');
        Route::get('/admin/tambah-kategori','tambahkategori')->name('tambahkategori');
       Route::post('/admin/store-kategori', 'StoreCategory')->name('storekategori') ;
       Route::get('/admin/edit-kategori/{id}', 'EditKategori')->name('editkategori') ;
       Route::post('/admin/update-kategori', 'UpdateKategori')->name('updatekategori') ;
       Route::get('/admin/hapus-kategori/{id}', 'HapusKategori')->name('deletekategori') ;
       
       
    
    });

    Route::controller(SubkategoriController::class)->group(function(){
        Route::get('/admin/semua-subkategori','index')->name('semuasubkategori');
        Route::get('/admin/tambah-subkategori','tambahsubkategori')->name('tambahsubkategori');
        Route::post('/admin/store-subkategori','StoreSubkategori')->name('storesubkategori');
        Route::get('/admin/edit-subkategori/{id}', 'EditSubkategori')->name('editsubkategori') ;
        Route::post('/admin/update-subkategori','UpdateSubkategori')->name('updatesubkategori');     
        Route::get('/admin/delete-subkategori/{id}', 'HapusSubkategori')->name('deletesubkategori') ;
        });

    Route::controller(ProdukController::class)->group(function(){
        Route::get('/admin/semua-produk','index')->name('semuaproduk');
        Route::get('/admin/tambah-produk','tambahproduk')->name('tambahproduk');
        Route::post('/admin/store-produk','StoreProduk')->name('storeproduk');     
        Route::get('/admin/edit-gambar/{id}','EditGambar')->name('editgambar');
        Route::post('/admin/update-gambar','UpdateGambar')->name('updategambar');     
        Route::get('/admin/edit-produk/{id}','EditProduk')->name('editproduk');
        Route::post('/admin/update-produk','UpdateProduk')->name('updateproduk');     
        Route::get('/admin/delete-produk/{id}','HapusProduk')->name('deleteproduk');
            });

    Route::controller(PesananController::class)->group(function(){
        Route::get('/admin/proses-pesanan','prosespesanan')->name('prosespesanan');
        Route::get('/admin/pengiriman-pesanan','PengirimanPesanan')->name('pengrimanpesanan');
        Route::post('/admin/konfirmasi-pesanan','KonfirmasiPesanan')->name('konfirmasipesanan');
        Route::post('/admin/kirim-pesanan','KirimPesanan')->name('kirimpesanan');
        Route::get('/admin/konfirmasi/{id}','Konfirmasi')->name('konfirmasi');
        Route::get('/admin/kirim/{id}','Kirim')->name('kirim');
       
                });

});



require __DIR__.'/auth.php';
