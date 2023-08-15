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
        Schema::create('subkategoris', function (Blueprint $table) {
            $table->id();
            $table->String('nama_subkategori');
            $table->bigInteger('kategori_id');
            $table->String('nama_kategori');
            $table->integer('jumlah_subkategori')->default(0);
            $table->String('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subkategoris');
    }
};
