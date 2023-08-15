@extends('admin.layouts.template')
@section('content')
    
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Semua Sub Kategori</h4>
    <div class="card">
                <h5 class="card-header">Light Table head</h5>

                @if (session()-> has('message'))
                <div class="alert alert-success">
                  {{ session()->get('message'); }}
                </div>
                    
                @endif

                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>Id</th>
                        <th>Sub Kategori</th>
                        <th>Kategori</th>
                        <th>Produk</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                      @foreach ($semuasubkategoris as $subkategori)
                      <tr>
                           <td>{{ $subkategori->id }}</td>
                           <td>{{ $subkategori->nama_subkategori }}</td>
                           <td>{{ $subkategori->nama_kategori }}</td>
                           <td>{{ $subkategori->produk_count }}</td>
                       
                        <td>
                            <a href="{{ route('editsubkategori',$subkategori->id) }}" class="btn btn-primary">edit</a>
                            <a href="{{ route('deletesubkategori',$subkategori->id) }}" class="btn btn-warning">delete</a>
                        </td>
                      </tr>
                      @endforeach
                       
                      
                     
                    </tbody>
                  </table>
                </div>
              </div>
              </div>

@endsection