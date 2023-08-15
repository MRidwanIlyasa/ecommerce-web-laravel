<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->text('deskripsi_singkat');
            $table->text('deskripsi');
            $table->integer('harga');
            $table->string('nama_kategori');
            $table->string('nama_subkategori');
            $table->integer('id_kategori');
            $table->integer('id_subkategori');
            $table->string('gambar');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
