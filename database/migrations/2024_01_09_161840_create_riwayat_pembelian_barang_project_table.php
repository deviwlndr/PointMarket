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
        Schema::create('riwayat_pembelian_barang_project', function (Blueprint $table) {
            $table->id('id_transaksi_barang');
            $table->integer('npm');
            $table->integer('kode_barang')->unique;
            $table->string('nama_barang');
            $table->string('deskripsi');
            $table->dateTime('tanggal_pembelian');
            $table->unsignedBigInteger('id_barang');
            $table->timestamps();

            $table->foreign('id_barang')->references('id_barang')->on('barang_project');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pembelian_barang_project');
    }
};
