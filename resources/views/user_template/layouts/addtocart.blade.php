@extends('user_template.layouts.template')
@section('konten-utama')

@if (session()-> has('message'))
                <div class="alert alert-success">
                  {{ session()->get('message'); }}
                </div>
                    
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="box_main">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr style="text-align: center">
                                        <th>Nama Produk</th>
                                        <th>Gambar Produk</th>
                                        <th>Jumlah</th>
                                        <th>Harga (Rp)</th>
                                        <th>Action</th>
                                    </tr>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($cart_items as $item)
                                    <tr style="text-align: center">
                                    @php
                                        $nama_produk = App\Models\Produk::where('id',$item->id_produk)->value('nama_produk');
                                        $gambar_produk = App\Models\Produk::where('id',$item->id_produk)->value('gambar');
                                    @endphp

                                        <td>{{  $nama_produk}}</td>
                                        <td> <img src="{{ asset($gambar_produk) }}" alt="" style=" width:100px"></td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->harga }}</td>
                                        <td><a href="{{ route('removecart' , $item->id) }}" class="btn btn-warning">Hapus</a></td>
                                        
                                    
                                    </tr>

                                    @php
                                    $total = $total + $item->harga;
                                @endphp
                                @endforeach
                                <tr style="text-align: center">
                               
                                  
                                  @if ($total != 0)
                                          <td style="font-weight: bold">Total :  </td>
                                          <td></td>
                                          <td></td>
                                  <td style="font-weight: bold">Rp. {{ $total }}</td>
                                  <td><a href="{{ route('pengemasan' , $item->id) }}" class="btn btn-primary">Bayar Sekarang</a></td>
                           
                                  @else 
                                  <td></td>
                                  <td></td>
                             <b style="color: red; margin-bottom:3px;"> <span style="color: black">Catatan : </span>Keranjang Anda Kosong </b>
                        
                                  <td><a href="" class="btn btn-primary disabled">Bayar Sekarang</a></td>
                                  
                                  @endif
                                        
                                </tr>    
                                               
                                    

                                </table>

                                
                            
                                {{-- <td style="margin-left: 20%" href="{{ route('removecart' , $item->id) }}" class="btn btn-warning">Bayar Sekarang</td> --}}
                                 
                                </tr>
       

                            </div>
                        </div>
                    </div>
                </div>















@endsection
    
