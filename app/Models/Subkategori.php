<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subkategori extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_subkategori',
        'kategori_id',
                'nama_kategori',
        'slug',

    ];
}
