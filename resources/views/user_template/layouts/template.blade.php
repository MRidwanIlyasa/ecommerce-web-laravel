
@php
$kategoris = App\Models\Kategori::latest()->get();



@endphp
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1" />
    <!-- site metas -->
    <title>Eflyer</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="/home/css/bootstrap.min.css" />
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="/home/css/style.css" />
    <!-- Responsive-->
    <link rel="stylesheet" href="/home/css/responsive.css" />
    <!-- fevicon -->
    <link rel="icon" href="/home/images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="/home/css/jquery.mCustomScrollbar.min.css" />
    <!-- Tweaks for older IEs-->
    <link
      rel="stylesheet"
      href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"
    />
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/menu.css' rel='stylesheet'>
    <!-- fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap"
      rel="stylesheet"
    />
    <!-- font awesome -->
    <link
      rel="stylesheet"
      type="text/css"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <!--  -->
    <!-- owl stylesheets -->
    <link
      href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesoeet" href="css/owl.theme.default.min.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
      media="screen"
    />
  </head>
  <body>
    <!-- banner bg main start -->
    <div class="banner_bg_main">
      <!-- header top section start -->
      <div class="container">
        <div class="header_section_top">
          <div class="row">
            <div class="col-sm-12">
              <div class="custom_menu">
                {{-- <ul>


                  <li><a href="#">Best Sellers</a></li>
                  <li><a href="{{ route('newrelease') }}">Gift Ideas</a></li>
                  <li><a href="{{ route('newrelease') }}">New Releases</a></li>
                  <li><a href="{{ route('todaysdeal') }}">Today's Deals</a></li>
                  <li><a href="{{ route('customerservice') }}">Akun</a></li>
                  
                </ul> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- header top section start -->
      <!-- logo section start -->
      <div class="logo_section">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="logo">
                <a href="/">
                <img id="logo" style="height: 17%; width:17%" src="home/images/logoLMY.png" alt="">
               </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- logo section end -->
      <!-- header section start -->
      <div class="header_section">
        <div class="container">
          <div class="containt_main">
            <div id="mySidenav" class="sidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"
                >&times;</a
              > 
              <p>Menu Utama</p>
              <a href="/">Menu Utama</a>
              <p>Kategori</p>
              

              @foreach ($kategoris as $kategori)        
              <a href="{{ route('kategori',[$kategori->id, $kategori->slug]) }}">{{ $kategori->nama_kategori }}</a>
              @endforeach
              
              <p>Pesanan Saya</p>
              <a href="{{ route('addtocart') }}">Keranjang Saya</a>
              <a href="{{ route('pendingorder') }}">Pesanan</a>
              <a href="{{ route('historyorder') }}">Riwayat Pesanan</a>
              <p>Pengaturan Akun</p>
              <a href="{{ route('customerservice') }}">akun</a>

            
             
            </div>
            <span class="toggle_icon" onclick="openNav()"
              >
              
              <img id="Hmenu"  src="https://cdn-icons-png.flaticon.com/512/660/660376.png"/>
          </span>
            <div class="dropdown mt-3">
              <button
                class="btn btn-secondary dropdown-toggle"
                type="button"
                id="dropdownMenuButton"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
               Menu
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/">Home</a>
                @foreach ($kategoris as $kategori)    
                     <a class="dropdown-item" href="{{ route('kategori',[$kategori->id, $kategori->slug]) }}">{{ $kategori->nama_kategori }}</a>
                @endforeach
              </div>
            </div>
            <div class="main mt-3">
              <!-- Another variation with a button -->
              <div class="search">
                <form action="" method="GET">
                   
                <input
                  type="text"  class="form-control" name="cari" placeholder="Cari disini"                  
                  />

                  <button
                    class="btn btn-secondary" type="submit" >
                    <i class="fa fa-search">
                     
                    </i> <b style="color: white"> CARI</b>
                  </button>               
</form>

              </div>
            </div>
            <div class="header_box">
              <div class="lang_box">
               
                
              </div>
              <div class="mt-3">
                <ul>
                  <li>
                    
                    <a href="{{ route('addtocart') }}">
                      <i class="fa fa-shopping-cart " style="color: black" aria-hidden="false"></i>
                      <span class="padding_10">Cart</span></a
                    >
                  </li>
                 
                  <li>
                    <a href="{{ route('pendingorder') }}">
                      <i style="font-size:18px" style="color: black"  class="fa">&#xf046;</i>
                      <span class="">Proses Pesanan</span></a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- header section end -->

           {{-- Common part --}}
           <div class="container py-5">
            @yield('konten-utama')
           </div>
           {{--end Common part --}}
   

    <!-- footer section start -->
    <div class="footer_section layout_padding">
      <div class="container">
        <div class="footer_logo">
          <a href="index.html"><img src="/home/imahges/footer-logo.png" /></a>
        </div>
        <div class="input_bt">
          <input
            type="text"
            class="mail_bt"
            placeholder="Your Email"
            name="Your Email"
          />
          <span class="subscribe_bt" id="basic-addon2"
            ><a href="#">Subscribe</a></span
          >
        </div>
        <div class="footer_menu">
          <ul>
            <li><a href="#">Best Sellers</a></li>
            <li><a href="#">Gift Ideas</a></li>
            <li><a href="#">New Releases</a></li>
            <li><a href="#">Today's Deals</a></li>
            <li><a href="#">Customer Service</a></li>
          </ul>
        </div>
        <div class="location_main">
          Ada pertanyaan ? Hubungi : <a href="https://wa.link/t2di6c">+6281233593707</a>
        </div>
      </div>
    </div>

 

    <!-- footer section end -->
    <!-- copyright section start -->
    <div class="copyright_section">
      <div class="container">
        <p class="copyright_text">
          © 2023 All Rights Reserved. Design by
          <a href="/">LMY Store</a>
        </p>
      </div>
    </div>
    <!-- copyright section end -->
    <!-- Javascript files-->
    <script src="/home/js/jquery.min.js"></script>
    <script src="/home/js/popper.min.js"></script>
    <script src="/home/js/bootstrap.bundle.min.js"></script>
    <script src="/home/js/jquery-3.0.0.min.js"></script>
    <script src="/home/js/plugin.js"></script>
    <!-- sidebar -->
    <script src="/home/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/home/js/custom.js"></script>
    <script>
      function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
      }

      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
      }
    </script>
  </body>
</html>
