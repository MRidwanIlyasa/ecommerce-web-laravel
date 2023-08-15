@extends('admin.layouts.template')
@section('content')
    
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Edit Sub Kategori</h4>
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Edit Data Sub Kategori</h5>
              <small class="text-muted float-end"></small>
            </div>

            <div class="card-body">
              <form action="{{ route('updatesubkategori') }}" method="POST">
                @csrf 
                <input type="hidden" value="{{ $subkategori_info->id }}" name="id_subkategori">

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Sub Kategori</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_subkategori" name="nama_subkategori"
                    value="{{ $subkategori_info -> nama_subkategori }}" />
                  </div>      
                </div>
                

                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary mb-3">Ubah  Sub Kategori</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
</div>

@endsection