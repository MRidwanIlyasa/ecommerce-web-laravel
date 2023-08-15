@extends('user_template.layouts.template')
@section('konten-utama')
<h2>Bayar Sekarang</h2>

<div class="row">
    <div class="col-12">
        <div class="box_main">
            Barang akan dikirim menuju :
            <br>
          <p style="font-weight: bold; text-transform: capitalize;">   {{ $alamat_pengemasan->alamat }}
 </p> 
           <p style="font-weight: bold"> Nomor telepon   :  {{ $alamat_pengemasan->telepon }} </p> 

           <p style="font-weight: bold"> Kode pos        :{{ $alamat_pengemasan->kodepos }} </p> 
            
        </div>
    </div>

    <div class="col-12">
    <div class="box_main">
       <p> Barang yang akan anda beli   </p> 

        <div class="table-responsive">
            <table class="table">
                <tr style="text-align: center">
                    <th>Nama Produk</th>
          
                    <th>Jumlah</th>
                    <th>Harga (Rp)</th>

                </tr>
                @php
                    $total = 0;
                @endphp
                @foreach ($cart_items as $item)
                <tr style="text-align: center">
                @php
                    $nama_produk = App\Models\Produk::where('id',$item->id_produk)->value('nama_produk');
                      @endphp

                    <td>{{  $nama_produk}}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->harga }}</td>
                   
                
                </tr>

                @php
                $total = $total + $item->harga;
            @endphp
            @endforeach
            <tr style="text-align: center">
<td></td>
              <td style="font-weight: bold">Total :  </td>
              <td style="font-weight: bold">Rp. {{ $total }}</td>
              
             
                    
            </tr>   
                 
                

            </table>

            
        
            {{-- <td style="margin-left: 20%" href="{{ route('removecart' , $item->id) }}" class="btn btn-warning">Bayar Sekarang</td> --}}
             
            </tr>


        </div>
            
    </div>
    </div>
<form action="{{ route('placeorder') }}" method="POST">
    @csrf
    <input type="submit" value="Konfirmasi Pesanan" class="btn btn-primary mr-4 ml-3 mt-2" >
    <input type="submit" value="Batalkan Pesanan" class="btn btn-danger mr-4 ml-3 mt-2" >
</form>

</div>
@endsection
    
