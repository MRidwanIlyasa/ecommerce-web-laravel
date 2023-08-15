@extends('user_template.layouts.template')
@section('konten-utama')
<link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">
    


<div class="fashion_secation">
    <div id="main_slider">   
          <div class="container">
            <h1 class="fashion_taital">Selamat Datang
              <i class="em em-hugging_face" aria-role="presentation" aria-label="HUGGING FACE"></i>
            <div class="fashion_section_2">
              <div class="row">
                
                @foreach ($semuaproduk as $produk)

            
                <div class="col-sm-4 col-sm-1">
                  <a href="{{ route('singleproduk',[$produk->id,$produk->slug]) }}">
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
  </a>
                </div>
                
                @endforeach

              </div>
            </div>
          </div>
       
      
       
      </a>
    </div>
  </div>

  
  <!-- fashion section end -->
  <!-- electronic section start -->

  <!-- electronic section end -->
  <!-- jewellery  section start -->
  

  @endsection