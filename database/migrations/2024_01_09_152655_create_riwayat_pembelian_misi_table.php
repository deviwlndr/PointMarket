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
        Schema::create('riwayat_pembelian_misi', function (Blueprint $table) {
            $table->id('id_transaksi_misi');
            $table->integer('npm');
            $table->integer('kode_misi')->unique;
            $table->string('nama_barang');
            $table->string('deskripsi');
            $table->dateTime('tanggal_pembelian');
            $table->unsignedBigInteger('id_misi');
            $table->timestamps();

            $table->foreign('id_misi')->references('id_misi')->on('misi_tambahan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pembelian_misi');
    }
};
