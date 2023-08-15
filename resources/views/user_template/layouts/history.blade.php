@extends('user_template.layouts.template')
@section('konten-utama')
<h2></h2>


    <table class="table" style="text-align: center">
        <h2> Riwayat Pesanan</h2>
         <tr>
             <th>Nama Produk</th>
             <th>Jumlah</th>
             <th>Total Harga</th>
             <th>Diterima Pada</th>
         </tr>
         @foreach ($history_orders as $order)
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
                 <td>
                     {{ $order->updated_at }}
                 </td>
             </tr>
         @endforeach
     </table>


     @endsection