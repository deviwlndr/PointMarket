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
        Schema::create('riwayat_pembelian_barang', function (Blueprint $table) {
            $table->id();
            $table->integer('npm');
            $table->integer('kode_pembelian')->unique;
            $table->string('nama_barang');
            $table->string('deskripsi');
            $table->dateTime('tanggap_pembelian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pembelian_barang');
    }
};
