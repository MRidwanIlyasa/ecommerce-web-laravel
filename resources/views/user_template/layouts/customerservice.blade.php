@extends('user_template.layouts.template')
@section('konten-utama')
<div class="col-sm-3">
<div class="container">
    <div class="card">

        <ul class=" ">
            <li class="ml-3"><a href="{{ route('pendingorder') }}">Pesanan</a></li>
            <li class="ml-3"><a href="{{ route('historyorder') }}">Riwayat</a></li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
            
                <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Keluar') }}
                </x-responsive-nav-link>
            </form>
           
            
        </ul>
        
    </div>
</div>
</div>

@endsection
    
