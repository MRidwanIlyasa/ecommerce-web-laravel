<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesanan extends Model
{
    public $timestamps = true;

    use HasFactory;
    protected $fillable = [
        'id_user',
        'pemesanan_telepon',
        'pemesanan_alamat',
        'pemesanan_kodepos',
        'id_produk',
        'status',
        'jumlah',
        'created_at',
      
    ];
    
    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class,'id_produk');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'id_user');
    }
}
