
@extends('admin.layouts.template')
@section('content')

    @if (session()-> has('message'))
    <div class="alert alert-success">
      {{ session()->get('message'); }}
    </div>
        
    @endif

    <div class="m-3">
      <div class="card">
      


    <div class="card_body">
      <div class="table-responsive" style="text-align:start;">
      <table class="table">
        
        <tr>
          <th>ID user</th>
          <th>Informasi Pengemasan</th>
          <th>ID Produk</th>
          <th>Jumlah</th>
          <th>Total Pembayaran</th>
          <th>Action</th>
          @foreach ($confirm_orders as $order)
          @php
              
      
          @endphp
              <tr>
                
                <td>{{$order->user->name}}</td>
                <td>
                  <ul>
                    <li>Telepon  -  {{ $order->pemesanan_telepon }}</li>
                    <li>Alamat   -  {{  $order->pemesanan_alamat  }}</li>
                    <li>Kode Pos   -  {{  $order->pemesanan_kodepos  }}</li>
                    
                  </ul>
                </td>
                <td>{{ $order->produk->nama_produk }}</td>
                <td>{{ $order->jumlah }}</td>
                <td>{{ $order->total_harga }}</td>
                <td><a href="{{ route('kirim', $order->id) }}" class="btn btn-primary">Konfirmasi</a></td>
              </tr>
          @endforeach
        </tr>
      </table>
    </div>

      </div>
      </div>
</div>

    












@endsection