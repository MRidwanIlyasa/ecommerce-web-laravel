@extends('admin.layouts.template')
@section('content')
    
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Edit Kategori</h4>
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Edit Data Kategori</h5>
              <small class="text-muted float-end"></small>
            </div>

            <div class="card-body">

              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

              <form action="{{ route('updatekategori') }}" method="POST">
                @csrf

                <input type="hidden" value="{{ $kategori_info -> id }}" name="id_kategori">

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Kategori</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                    value="{{ $kategori_info -> nama_kategori }}" />
                  </div>
                </div>
                </div>

                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary mb-3">Ubah Kategori</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
</div>

@endsection