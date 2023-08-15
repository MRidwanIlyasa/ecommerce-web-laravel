@extends('admin.layouts.template')
@section('content')
    
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Semua Kategori</h4>
    <div class="card">
                <h5 class="card-header">Tabel Semua Kategori</h5>
                
                @if (session()-> has('message'))
                <div class="alert alert-success">
                  {{ session()->get('message'); }}
                </div>
                    
                @endif
                      <div class="container m-1 mb-3" >         
                 <a href="{{ route('tambahkategori') }}" class="">
                   <i class=""></i>
                   <div data-i18n="Analytics">Tambah Kategori</div>
                  </a>                                              
                      </div>
                                
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>Id</th>
                        <th>Kategori</th>
                        <th>Sub Kategori</th>
                        <th>Slug</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach ($kategoris as $kategori)
                          <tr>
                        <td>{{ $kategori->id }}</td>
                        <td>{{ $kategori->nama_kategori }}</td>
                        <td>{{ $kategori->subkategori_count	 }}</td>
                        <td>{{ $kategori->slug }}</td>
                        <td>
                            <a href="{{ route('editkategori' , $kategori->id) }}" class="btn btn-primary">Ubah</a>
                            <a href="{{ route('deletekategori' , $kategori->id) }}" class="btn btn-warning">Hapus</a>
                        </td>
                      </tr>
                      @endforeach
                      
                      
                     
                    </tbody>
                  </table>
                </div>
              </div>
              </div>

@endsection