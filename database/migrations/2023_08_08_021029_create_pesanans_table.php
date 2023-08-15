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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('pemesanan_telepon');
            $table->string('pemesanan_alamat');
            $table->string('pemesanan_kodepos');
            $table->string('id_produk');
            $table->integer('jumlah');
            $table->integer('total_harga');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
