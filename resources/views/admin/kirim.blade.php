@extends('admin.layouts.template')
@section('content')
    dashboard


<form action="{{ route('kirimpesanan') }}" method="POST">
    @csrf
    <input type="hidden" value="{{ $infokirim->id }}" name="id">
    <input type="hidden" class="form-control" value="{{ $infokirim->user->name }}" id="status" name="status">
   
              <button type="submit" class="btn btn-primary mb-3">Konfirmasi </button>
                 
</form>

<div class="card_body">
    <div class="table-responsive" style="text-align:start;">
    <table class="table">

            <tr>
                <th>ID user</th>
          <th>Informasi Pengemasan</th>
          <th>Jumlah</th>
          <th>Total Pembayaran</th>
          <th>Action</th>
            </tr>
            <tr>
                <td>
                    {{ $infokirim->user->name }} 
                </td>
                <td>
                    {{ $infokirim->produk->nama_produk }} 
                </td>
                <td>
                    {{ $infokirim->jumlah}} 
                </td>
                <td>
                    {{ $infokirim->total_harga}} 
                </td>
                <td>
                   
                </td>
            </tr>
            


    </div>
      </div>
@endsection