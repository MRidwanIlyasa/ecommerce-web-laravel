<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = [

        'nama_produk',
'deskripsi_singkat',
'deskripsi',
'harga',
'nama_kategori',
'nama_subkategori',
'id_kategori',
'id_subkategori',

'gambar',
'slug',
    ]
    
    ;
}
