@extends('user_template.layouts.template')
@section('konten-utama')
<h2> Pengemasan </h2>

<div class="row">
    <div class="col-12">
        <div class="box_main">
            <form action="{{ route('tambahalamat') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="telepon">No. telepon / WhatsApp</label>
                    <input type="number" class="form-control" required name="telepon">
                </div>
                
                <div class="form-group">
                    <label for="alamat">Alamat Lengkap</label>
                    <input type="text" class="form-control" name="alamat" required placeholder="Masukan alamat lengkap (Beserta nomor Rumah dan RT/RW)">
                </div>
                <div class="form-group">
                    <label for="kodepos">Kode Pos</label>
                    <input type="text" class="form-control" required name="kodepos">
                </div>
                <input type="submit" value="next" class="btn btn-primary"  name="" id="">
                
             



            </form>
        </div>
    </div>
</div>

@endsection
    
