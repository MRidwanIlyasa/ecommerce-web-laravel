@extends('admin.layouts.template')
@section('content')
    
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Tambah Produk</h4>
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Tambah Data Produk</h5>
              <small class="text-muted float-end"></small>
            </div>

            <div class="card-body">
              <form action="{{ route('storeproduk') }}" method="POST" enctype="multipart/form-data" >
              @csrf
              
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Produk</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                    placeholder="Masukan nama Produk" />
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Deskripsi Singkat</label>
                  <div class="col-sm-10">
                    <textarea type="text" class="form-control" id="deskripsi_singkat" name="deskripsi_singkat"
                    placeholder="Masukan Deskripsi singkat" /> </textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Deskripsi</label>
                  <div class="col-sm-10">
                    <textarea type="text" class="form-control" id="deskripsi" name="deskripsi"
                    placeholder="Masukan Deskripsi " /></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Harga Produk</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="harga" name="harga"
                    placeholder="Masukan harga produk (hanya angka)" />
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Jumlah Produk</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="jumlah" name="jumlah"
                    placeholder="Masukan jumlah produk (hanya angka)" />
                  </div>
                </div>
                 
                <div class="row mt-4">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Pilih Kategori</label>
                    <div class="col-sm-10">
                        <select id="id_kategori" name="id_kategori" class="form-select">
                            <option></option>
                            @foreach ($kategoris as $kategori)
                                
                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                          
                          </select>
                    </div>
                  </div>
                <div class="row mt-4">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Pilih Sub Kategori</label>
                    <div class="col-sm-10">
                        <select id="id_subkategori" name="id_subkategori" class="form-select">
                            <option></option>
                            @foreach ($subkategoris as $subkategori)
                                
                            <option value="{{ $subkategori->id }}">{{ $subkategori->nama_subkategori }}</option>
                            @endforeach
                            
                          </select>
                    </div>

            

                                <div class="row ml-3">
                                  <div class="mb-5 mt-5 ml-5">
                                    <label for="formFileMultiple" class="form-label">Gambar</label>
                                    <input class="form-control" type="file" id="gambar" name="gambar" multiple />
                                  </div>
                                </div>


                  </div>

                </div>
               
                

                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary mb-3">Tambah Produk</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
</div>

@endsection