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
        Schema::create('info_pengemasans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('telepon');
            $table->string('alamat');
            $table->string('kode pos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_pengemasans');
    }
};
