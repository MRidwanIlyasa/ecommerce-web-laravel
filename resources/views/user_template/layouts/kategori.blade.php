@extends('user_template.layouts.template')
@section('konten-utama')


<div class="fashion_section">
    <div id="main_slider">   
          <div class="container">
            <h1 class="fashion_taital">{{ $kategori -> nama_kategori }} - ( {{ $kategori-> produk_count }} )</h1>
            <div class="fashion_section_2">
              <div class="row">
                @foreach ($produk as $produk)

                <div class="col-lg-4 col-sm-4">
                  <div class="box_main mt-5">
                    <h4 class="shirt_text">{{ $produk->nama_produk }}</h4>
                    <p class="price_text">
                      Harga <span style="color: #262626">Rp.{{  $produk->harga }}</span>
                    </p>
                    <div class="tshirt_img">
                      <img src="{{ asset($produk->gambar) }}" />
                    </div>
                    <div class="btn_main">

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


@endsection
    
