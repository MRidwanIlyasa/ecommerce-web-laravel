@extends('admin.layouts.template')
@section('content')
    
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Tambah Sub Kategori</h4>
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Tambah Data Sub Kategori</h5>
              <small class="text-muted float-end"></small>
            </div>

            <div class="card-body">
              <form action="{{ route('storesubkategori') }}" method="POST">
                @csrf 

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Sub Kategori</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_subkategori" name="nama_subkategori"
                    placeholder="Masukan nama subkategori" />
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
                </div>
                

                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary mb-3">Tambah Sub Kategori</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
</div>

@endsection