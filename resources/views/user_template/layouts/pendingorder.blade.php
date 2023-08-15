@extends('user_template.layouts.template')
@section('konten-utama')
<h2></h2>
@if (session()-> has('message'))
    <div class="alert alert-success">
      {{ session()->get('message'); }}
    </div>
        
    @endif

    <table class="table" style="text-align: center">
        <h2> Pesanan Dalam Proses</h2>
         <tr>
             <th>Nama Produk</th>
             <th>Jumlah</th>
             <th>Total Harga</th>
         </tr>
         @php
             $total = 0;
         @endphp
         @foreach ($pending_orders as $order)
             <tr>
                 <td>
                     {{ $order->produk->nama_produk }}
                 </td>
                 <td>
                     {{ $order->jumlah }}
                 </td>
                 <td>
                     {{ $order->total_harga }}
                 </td>
             </tr>
        
        @php
            $total = $total  + $order->total_harga
        @endphp 
         @endforeach
         @if ($total != 0)
             
         @else
         <p style="color: red">Tidak ada Pesanan</p>
             
         @endif
     </table>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>


    <table class="table" style="text-align: center">
       <h2> Pesanan Dalam Pengiriman</h2>
        <tr>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
        </tr>
        @foreach ($sent_orders as $order)
            <tr>
                <td>
                    {{ $order->produk->nama_produk }}
                </td>
                <td>
                    {{ $order->jumlah }}
                </td>
                <td>
                    {{ $order->total_harga }}
                </td>
            </tr>
        @endforeach
        
    </table>






@endsection
    
