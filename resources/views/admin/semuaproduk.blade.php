@extends('admin.layouts.template')
@section('content')
    
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Semua Produk</h4>
 
    @if (session()-> has('message'))
    <div class="alert alert-success">
      {{ session()->get('message'); }}
    </div>
        
    @endif
    
    <div class="card">
                <h5 class="card-header">EDIT PRODUK</h5>


                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>Id</th>
                        <th>Nama Produk</th>
                        <th>Gambar</th>
                        <th>deskripsi singkat</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>jumlah</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($produks as $produk)
                            

                      <tr>
                        <td>{{ $produk ->id }}</td>
                        <td>{{ $produk ->nama_produk }}</td>
                        <td>

                          <img style="height: 90px" class="mb-1" src="{{ asset($produk->gambar) }}" alt="">
                         <br>
                          <a href="{{ route('editgambar',$produk->id) }}" class="btn btn-primary">Ubah Gambar</a>

                        </td>
                        <td>{{ $produk ->deskripsi_singkat}}</td>
                        <td>{{ $produk ->deskripsi }}</td>
                        <td>{{ $produk ->harga }}</td>
                        <td>{{ $produk ->jumlah }}</td>
                        <td>
                            <a href="{{ route('editproduk',$produk->id) }}" class="btn btn-primary">edit</a>
                            <a href="{{ route('deleteproduk',$produk->id) }}" class="btn btn-warning">delete</a>
                        </td>
                      </tr>
                                             @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              </div>

@endsection