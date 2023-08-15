@extends('user_template.layouts.template')
@section('konten-utama')

<style>
    .produk .box_main img{
margin: auto;
        height: 100%;
        width: 300px
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="produk">
            <div class="box_main">
                <h4 class="shirt_text"></h4>
                    
                     <img src="{{ asset($produk->gambar) }}" />
            </div>
        </div>
        </div>
        <div class="col-lg-8">         
            <div class="box_main">
                <div class="product_info">
                    <h4 class="shirt_text text-left">{{ $produk->nama_produk }}</h4>
                    <p class="price_text text-left mb-4">
                        Harga <span style="color: #262626">Rp.{{ $produk->harga }}</span>
                      </p>
                </div>
                <div class="my-3 product_details">
                    <p class="lead">
                        {{ $produk->deskripsi }} 
                    
                    </p>
                    <div class="btn_main">
                      <form action="{{ route('addproduktocart') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $produk->id }}" name="id_produk">
                        <div class="mt-5">
                          <input type="hidden" value="{{ $produk->harga }}" name="harga">
                          <input type="hidden" value="1" name="jumlah">
                            <label for="jumlah"></label>
                        <input class="form-control" type="number" min="1" required placeholder="Masukan Jumlah" name="jumlah">
                        <br>
                        </div>
                      
                        <input type="submit" value="Tambahkan Ke Keranjang" class="btn btn-warning mt-2">

                      </form>
                      
                </div>
            </div>
        </div>
    </div>
    <div class="fashion_secation">
        <div id="main_slider">   
              <div class="container">
                <h1 class="fashion_taital mt-5">Produk Lainya</h1>
                <div class="fashion_section_2">
                  <div class="row">
                    @foreach ($related_produk as $produk)

                    <div class="col-sm-4 col-sm-1">
                      <div class="box_main mt-5">
                        <h4 class="shirt_text">{{ $produk->nama_produk }}</h4>
                        <p class="price_text">
                          Harga <span style="color: #262626">Rp.{{  $produk->harga }}</span>
                        </p>
                        <div class="tshirt_img">
                          <img src="{{ asset($produk->gambar) }}" />
                        </div>
                        <div class="btn_main">
                          <form action="{{ route('addproduktocart', $produk->id) }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $produk->id }}" name="id_produk">
                            <input type="hidden" value="{{ $produk->harga }}" name="harga">
                            <input type="hidden" value="1" name="jumlah">
                      <br>  
                          </form>
    
                          <div class="seemore_bt"><a href="{{ route('singleproduk',[$produk->id,$produk->slug]) }}">See More</a></div>
                        </div>
                      </div>
                    </div>
                    @endforeach
    
                  </div>
                </div>
              </div>
           
          
            <i class="fa fa-angle-right"></i>
          </a>
        </div>
      </div>


</div>
@endsection
    
